<?php
declare(strict_types=1);

namespace Acme\Account\UseCase\TransferMoney;

use Acme\Account\Exception\DomainRuleException;

final class TransferMoney
{
    /** @var TransferMoneyQuery */
    private $query;
    /** @var TransferMoneyCommand */
    private $command;

    /**
     * @param TransferMoneyQuery $query
     * @param TransferMoneyCommand $command
     */
    public function __construct(TransferMoneyQuery $query, TransferMoneyCommand $command)
    {
        $this->query = $query;
        $this->command = $command;
    }

    /**
     * @param string $sourceAccountNo
     * @param string $destinationAccountNo
     * @param int $amount
     * @return array
     * @throws DomainRuleException
     */
    public function run(string $sourceAccountNo, string $destinationAccountNo, int $amount): array
    {
        $sourceBalance = $this->query->findAccountBalance($sourceAccountNo);
        $destinationBalance = $this->query->findAccountBalance($destinationAccountNo);

        if ($sourceBalance < $amount) {
            throw new DomainRuleException('残高不足です');
        }

        $sourceBalance -= $amount;
        $destinationBalance += $amount;

        $this->command->storeAccountBalance($sourceAccountNo, $sourceBalance);
        $this->command->storeAccountBalance($destinationAccountNo, $destinationBalance);

        return [
            $sourceAccountNo => $sourceBalance,
            $destinationAccountNo => $destinationBalance,
        ];
    }
}
