<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    // use SoftDeletes;

    protected $guarded = [ 'id' ];
    

    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function investor(){
        return $this->belongsTo(Investor::class);
    }

    public function children(){
        return $this->hasMany(Account::class, 'referrer_investor_id');
    }

    public function transactions(){
        return $this->hasMany(AccountTransaction::class);
    }
}
