<?php
declare(strict_types=1);

namespace Acme\Account\UseCase\TransferMoney;

interface TransferMoneyQuery
{
    public function findAccountBalance(string $accountNumber): int;
}
