<?php
declare(strict_types=1);

namespace App\Controller;

use Acme\Account\UseCase\TransferMoney\TransferMoney;
use App\Adapter\Account\TransferMoney\AppTransferMoneyCommand;
use App\Adapter\Account\TransferMoney\AppTransferMoneyQuery;

final class AccountsController extends AppController
{
    /**
     * @return \Cake\Http\Response
     * @throws \Acme\Account\Exception\DomainRuleException
     */
    public function transferMoney()
    {
        $useCase = new TransferMoney(
            new AppTransferMoneyQuery(),
            new AppTransferMoneyCommand()
        );

        $result = $useCase->run(
            $this->request->getParam('account_number'),
            $this->request->getData('destination_account_number', ''),
            (int)$this->request->getData('amount')
        );

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($result));
    }
}
