<?php
declare(strict_types=1);

namespace App\Action\Account\TransferMoney;

use Acme\Account\UseCase\TransferMoney\TransferMoneyCommand;
use App\Eloquent\EloquentAccount;

final class AppTransferMoneyCommand implements TransferMoneyCommand
{
    public function storeAccountBalance(string $accountNo, int $balance)
    {
        EloquentAccount::query()
            ->where('account_number', $accountNo)
            ->update(['balance' => $balance]);
    }
}
