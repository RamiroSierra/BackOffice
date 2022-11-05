<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventPlayer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['player_id ','event_id'];
}
