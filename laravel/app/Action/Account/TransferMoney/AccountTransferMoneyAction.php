<?php
declare(strict_types=1);

namespace App\Action\Account\TransferMoney;

use Acme\Account\UseCase\TransferMoney\TransferMoney;

final class AccountTransferMoneyAction
{
    /** @var TransferMoney */
    private $useCase;

    public function __construct(TransferMoney $useCase)
    {
        $this->useCase = $useCase;
    }

    /**
     * @param TransferMoneyRequest $request
     * @param string $accountNumber
     * @return \Illuminate\Http\JsonResponse
     * @throws \Acme\Account\Exception\DomainRuleException
     */
    public function __invoke(TransferMoneyRequest $request, string $accountNumber)
    {
        $validated = $request->validated();

        $balance = $this->useCase->run(
            $accountNumber,
            $validated['destination_account_number'],
            (int)$validated['amount']
        );

        return response()->json([
            'balance' => $balance,
        ]);
    }
}
