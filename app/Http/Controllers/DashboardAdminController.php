<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Region;
use App\Models\CulturalData;
use App\Models\CulturalCategory;
use Illuminate\Routing\Controller;

class DashboardAdminController extends Controller
{
  public function index()
  {
    return view(
      'admin.dashboard',
      [
        "totalCulturalCategory" => CulturalCategory::count(),
        "totalCulturalData" => CulturalData::count(),
        "totalQuiz" => Quiz::count(),
        "totalRegion" => Region::count(),
        "quizzes" => Quiz::all(),
        "regions" => Region::all(),
      ]
    );
  }
}
