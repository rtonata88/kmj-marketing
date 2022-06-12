<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardClaim extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];


    public function investor(){
        return $this->belongsTo(\App\Investor::class);
    }

    public function reward(){
        return $this->belongsTo(\App\StageReward::class,'stage_reward_id', 'id');
    }
}
