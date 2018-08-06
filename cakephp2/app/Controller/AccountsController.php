<?php
declare(strict_types=1);

use Acme\Account\UseCase\TransferMoney\TransferMoney;
use App\Adapter\Account\TransferMoney\AppTransferMoneyCommand;
use App\Adapter\Account\TransferMoney\AppTransferMoneyQuery;

App::uses('AppController', 'Controller');

final class AccountsController extends AppController
{
	public $components = array('RequestHandler');

	/**
	 * @return \CakeResponse
	 * @throws \Acme\Account\Exception\DomainRuleException
	 */
	public function transfer_money() : CakeResponse
	{
		$useCase = new TransferMoney(
			new AppTransferMoneyQuery(),
			new AppTransferMoneyCommand()
		);

		$result = $useCase->run(
			$this->request->param('account_number'),
			$this->request->data('destination_account_number') ?? '',
			(int)$this->request->data('amount')
		);

		$this->response->type('json');
		$this->response->body(json_encode($result));

		return $this->response;
	}
}
