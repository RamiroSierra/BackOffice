<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicitieSport extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "publicitie_sport";
    protected $fillable = ['sport_id','publicitie_id'];
}
