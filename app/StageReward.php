<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StageReward extends Model
{
    // use SoftDeletes;

    protected $guarded = [ 'id' ];
    //

    public function stage(){
        return $this->belongsTo(Stage::class);
    }
}
