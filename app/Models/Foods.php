<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    protected $fillable = ['image', 'title', 'description'];
}