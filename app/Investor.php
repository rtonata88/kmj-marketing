<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;


class Investor extends Model
{
    // use SoftDeletes;
    use NodeTrait;

    protected $guarded = [ 'id' ];

    protected $fillable = ['name', 'mobile_number', 'email', 'town_id', 'region_id', 'country_id', 'user_id'];
    
    public function transactions(){
        return $this->hasMany(AccountTransaction::class);
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
