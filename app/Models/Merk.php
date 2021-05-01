<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Merk extends Model
{
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    use HasFactory;
}
