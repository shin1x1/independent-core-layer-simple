<?php
declare(strict_types=1);

/**
 * @var Router $router
 */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Action\Account\TransferMoney\AccountTransferMoneyAction;
use Illuminate\Routing\Router;

$router->put('/accounts/{accountNumber}/transfer_money', AccountTransferMoneyAction::class . '@__invoke')
    ->where('accountNumber', '[A-Z0-9]{1,10}');

