<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\CulturalCategory;
use App\Http\Controllers\Controller;

class DashboardUserController extends Controller
{
  //
  public function index()
  {
    return view('user.dashboard', ["cultureCategories" => CulturalCategory::all(), "regions" => Region::all()]);
  }
}
