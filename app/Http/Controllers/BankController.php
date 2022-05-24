<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function getBankBranchesByBankId($id){
        $bank_info = Bank::find($id);

        return response()->json(
            [
                'bank' => $bank_info
            ]
        );
    }
}
