<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventForPointPlayer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['faltas','for_point_id','event_player_id','puntos_a_favor','puntos_en_contra'];
}
