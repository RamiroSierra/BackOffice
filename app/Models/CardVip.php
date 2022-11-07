<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardVip extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "card_vip";
    protected $fillable = ['client_id','card_id'];
}
