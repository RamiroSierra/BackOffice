<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardEventPlayer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['color_card_id','event_player_id'];

    

}
