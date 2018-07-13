<?php
declare(strict_types=1);

namespace App\Action\Account\TransferMoney;

use Acme\Account\UseCase\TransferMoney\TransferMoneyQuery;
use App\Eloquent\EloquentAccount;

final class AppTransferMoneyQuery implements TransferMoneyQuery
{
    public function findAccountBalance(string $accountNumber): int
    {
        /** @var EloquentAccount $account */
        $account = EloquentAccount::query()
            ->where('account_number', $accountNumber)
            ->firstOrFail();

        return $account->balance;
    }
}
