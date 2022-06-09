<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestorDeposit extends Model
{
    use HasFactory;

    public function investor(){
    
        return $this->belongsTo(\App\Investor::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'processed_by');
    }
}
