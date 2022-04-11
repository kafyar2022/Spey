<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory, Sluggable;

  // protected $fillable = [
  //   'category_id', 'ru_title', 'en_title', 'slug',
  // ];

  protected $guarded = [];

  public function sluggable()
  {
    return [
      'slug' => [
        'source' => 'ru_title'
      ]
    ];
  }

  public function category()
  {
    return $this->belongsTo(ProductsCategory::class, 'category_id');
  }
}
