<?php
declare(strict_types=1);

namespace App\Providers;

use Acme\Account\UseCase\TransferMoney\TransferMoney;
use App\Action\Account\TransferMoney\AppTransferMoneyCommand;
use App\Action\Account\TransferMoney\AppTransferMoneyQuery;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //
    }

    public function register(): void
    {
        $this->app->bind(TransferMoney::class, function () {
            return new TransferMoney(
                new AppTransferMoneyQuery(),
                new AppTransferMoneyCommand()
            );
        });
    }
}
