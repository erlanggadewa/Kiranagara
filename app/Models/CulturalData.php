<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturalData extends Model
{
  use HasFactory;
  public $guarded = ['id'];

  public function culturalCategory()
  {
    return $this->hasMany(CulturalCategory::class);
  }
}
