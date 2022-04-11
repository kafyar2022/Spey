<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  use HasFactory, Sluggable;

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
    return $this->belongsTo(NewsCategory::class, 'category_id');
  }
}
