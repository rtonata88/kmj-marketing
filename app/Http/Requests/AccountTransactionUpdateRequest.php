<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountTransactionUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('account_transaction')->id;

        /**
         * Usage of id
         * 'username' => 'required|unique:users,username,' . $id,
         */

        return [
            'id' => 'required|unique:account_transactions,id,' . $id,
        ];
    }
}
