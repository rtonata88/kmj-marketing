<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationCredit extends Model
{
    use HasFactory;

    protected $fillable = ['investor_id', 'transaction_description', 'transaction_date', 'debit_amount', 'credit_amount'];
}
