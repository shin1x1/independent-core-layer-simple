<?php
declare(strict_types=1);

namespace App\Adapter\Account\TransferMoney;

use Acme\Account\UseCase\TransferMoney\TransferMoneyQuery;
use Cake\ORM\TableRegistry;

final class AppTransferMoneyQuery implements TransferMoneyQuery
{
    public function findAccountBalance(string $accountNumber): int
    {
        $accountsTable = TableRegistry::getTableLocator()->get('Accounts');

        $account = $accountsTable->query()
            ->where(['account_number' => $accountNumber])
            ->firstOrFail();

        return $account->get('balance');
    }
}
