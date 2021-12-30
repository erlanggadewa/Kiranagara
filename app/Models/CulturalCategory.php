<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CulturalCategory extends Model
{
  use HasFactory;
  public $guarded = ['id'];

  public function culturalData()
  {
    return $this->hasMany(CulturalData::class);
  }
}
