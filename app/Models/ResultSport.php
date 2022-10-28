<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultSport extends Model
{
    use HasFactory;
    protected $table = "result_sport";
    protected $fillable = ['sport_id','type_of_result_id'];
}
