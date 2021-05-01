<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Products extends Model
{
    // protected $fillable = [
    //     'image', 'nama_product', 'jenis_product', 'harga_product'
    // ];
    public function getImageAttribute($value)
    {
        return Storage::url("images/" . $value);
    }
    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }
    use HasFactory;
}
