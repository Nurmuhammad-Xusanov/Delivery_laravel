<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    protected $fillable = ['name', 'description', 'cost', 'image'];
}
