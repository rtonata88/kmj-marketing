<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investor extends Model
{
    // use SoftDeletes;

    protected $guarded = [ 'id' ];

    protected $fillable = ['name', 'mobile_number', 'email', 'town_id', 'region_id', 'country_id'];
    
    public function accounts(){
        return $this->hasMany(Account::class);
    }
}
