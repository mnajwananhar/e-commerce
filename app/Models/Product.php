<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
    'seller_id',
    'name',
    'description',
    'price',
    'stock',
    'weight',
  ];

  public function images()
  {
    return $this->hasMany(ProductImage::class);
  }
}
