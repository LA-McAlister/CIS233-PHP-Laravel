<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'item_number',
        'image'
    ];

    public function reviews()
  {
    return $this->hasMany(Review::class); 
  }
};
