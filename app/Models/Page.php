<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  use HasFactory;

  public function texts()
  {
    return $this->hasMany(Text::class, 'page_id');
  }
}
