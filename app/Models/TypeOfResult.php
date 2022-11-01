<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfResult extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "types_of_results";
}
