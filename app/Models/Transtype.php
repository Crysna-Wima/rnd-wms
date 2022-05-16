<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transtype extends Model
{
    use HasFactory;

    protected $table = 'm_transtype';
    protected $fillable = ['code','name'];
}