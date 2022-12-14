<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForPoint extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['puntos_visita','puntos_local'];
}
