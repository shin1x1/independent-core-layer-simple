<?php
declare(strict_types=1);

namespace App\Action\Account\TransferMoney;

use Illuminate\Foundation\Http\FormRequest;

class TransferMoneyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'destination_account_number' => 'required|regex:/\A[A-Z0-9]{1,10}\z/',
            'amount' => 'required|int'
        ];
    }
}
