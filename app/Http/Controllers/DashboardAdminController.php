<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Region;
use App\Models\CulturalData;
use Illuminate\Http\Request;
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
        'culturalData' => CulturalData::latest(),
        "quizzes" => Quiz::latest(),
        "regions" => Region::latest(),
        'totalEasy' => Quiz::where('level', '=', 'easy')->count(),
        'totalMedium' => Quiz::where('level', '=', 'medium')->count(),
        'totalHard' => Quiz::where('level', '=', 'hard')->count(),
        'totalExpert' => Quiz::where('level', '=', 'expert')->count(),
      ]
    );
  }

  // public function getMoreCulture(Request $request)
  // {
  //   if ($request->ajax()) {
  //     $culturalData = CulturalData::paginate($perPage = 2, $columns = ['*'], $pageName = 'culture');
  //     return view('components.show-culture', compact('culturalData'))->render();
  //   }
  // }
}
