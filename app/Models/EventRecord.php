<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventRecord extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "event_record";
    protected $fillable = ['record_id','event_id'];
}
