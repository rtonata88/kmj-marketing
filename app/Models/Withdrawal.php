<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $fillable = ['investor_id',
                            'request_date',
                            'requested_amount',
                            'charges',
                            'payout_amount',
                            'payout_method_id'
                        ];
}
