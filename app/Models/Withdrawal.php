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

    public function investor(){
        return $this->belongsTo(\App\Investor::class);
    }

    public function payout_method(){
        return $this->belongsTo(\App\Models\PayoutMethod::class);
    }
}
