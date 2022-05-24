<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = ['investor_id', 'holder_name', 'account_number', 'account_type', 'bank_name', 'branch_code', 'branch_name'];
}
