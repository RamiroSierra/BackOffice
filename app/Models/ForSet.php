<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForSet extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['ganadas_visita','ganadas_local'];
}
