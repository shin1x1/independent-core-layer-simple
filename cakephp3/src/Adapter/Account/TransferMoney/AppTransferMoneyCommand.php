<?php
declare(strict_types=1);

namespace App\Adapter\Account\TransferMoney;

use Acme\Account\UseCase\TransferMoney\TransferMoneyCommand;
use Cake\ORM\TableRegistry;

final class AppTransferMoneyCommand implements TransferMoneyCommand
{
    public function storeAccountBalance(string $accountNo, int $balance)
    {
        $accountsTable = TableRegistry::getTableLocator()->get('Accounts');

        $accountsTable->query()
            ->update()
            ->set(['balance' => $balance])
            ->where(['account_number' => $accountNo])
            ->execute();
    }
}
