<?php
declare(strict_types=1);

namespace Test\Acme\Account\UseCase;

use Acme\Account\UseCase\TransferMoney\TransferMoney;
use Acme\Account\UseCase\TransferMoney\TransferMoneyCommand;
use Acme\Account\UseCase\TransferMoney\TransferMoneyQuery;
use PHPUnit\Framework\TestCase;

final class TransferMoneyTest extends TestCase
{
    /**
     * @test
     * @throws \Acme\Account\Exception\DomainRuleException
     */
    public function run_()
    {
        $query = new class implements TransferMoneyQuery
        {
            public function findAccountBalance(string $accountNumber): int
            {
                return ([
                    'A0001' => 10000,
                    'B0001' => 5000,
                ])[$accountNumber];
            }
        };

        $command = new class implements TransferMoneyCommand
        {
            public $stored = [];

            public function storeAccountBalance(string $accountNo, int $balance)
            {
                $this->stored[$accountNo] = $balance;
            }
        };

        $sut = new TransferMoney($query, $command);
        $result = $sut->run('A0001', 'B0001', 1000);

        $expected = [
            'A0001' => 9000,
            'B0001' => 6000,
        ];
        $this->assertSame($expected, $result);
        $this->assertSame($expected, $command->stored);
    }

    /**
     * @test
     * @expectedException \Acme\Account\Exception\DomainRuleException
     */
    public function run_lack_source_balance()
    {
        $query = new class implements TransferMoneyQuery
        {
            public function findAccountBalance(string $accountNo): int
            {
                return ([
                    'A0001' => 1000,
                    'B0001' => 5000,
                ])[$accountNo];
            }
        };

        $command = new class implements TransferMoneyCommand
        {
            public function storeAccountBalance(string $accountNo, int $balance)
            {
                // nop
            }
        };

        $sut = new TransferMoney($query, $command);
        $sut->run('A0001', 'B0001', 1001);
    }
}
