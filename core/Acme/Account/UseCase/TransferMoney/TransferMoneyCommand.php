<?php
declare(strict_types=1);

namespace Acme\Account\UseCase\TransferMoney;

interface TransferMoneyCommand
{
    public function storeAccountBalance(string $accountNo, int $balance);
}
