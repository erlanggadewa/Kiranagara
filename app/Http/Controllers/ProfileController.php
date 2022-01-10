<?php

namespace App\Http\Controllers;

use App\Models\QuizScore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function index()
  {
    $avgEasy = QuizScore::where("level", "=", "easy")->where("user_id", "=", Auth::user()->id)->avg("score");
    $avgMedium = QuizScore::where("level", "=", "medium")->where("user_id", "=", Auth::user()->id)->avg("score");
    $avgHard = QuizScore::where("level", "=", "hard")->where("user_id", "=", Auth::user()->id)->avg("score");
    $avgExpert = QuizScore::where("level", "=", "expert")->where("user_id", "=", Auth::user()->id)->avg("score");
    $highestEasy = QuizScore::where("level", "=", "easy")->where("user_id", "=", Auth::user()->id)->max("score");
    $highestMedium = QuizScore::where("level", "=", "medium")->where("user_id", "=", Auth::user()->id)->max("score");
    $highestHard = QuizScore::where("level", "=", "hard")->where("user_id", "=", Auth::user()->id)->max("score");
    $highestExpert = QuizScore::where("level", "=", "expert")->where("user_id", "=", Auth::user()->id)->max("score");
    return view(
      'components.tasks.detail-profile',
      [
        "avgEasy" => $avgEasy,
        "avgMedium" => $avgMedium,
        "avgHard" => $avgHard,
        "avgExpert" => $avgExpert,
        "highestEasy" => $highestEasy,
        "highestMedium" => $highestMedium,
        "highestHard" => $highestHard,
        "highestExpert" => $highestExpert,
      ]
    );
  }
  function crop(Request $request)
  {
    $path = 'img/profile/';
    $file = $request->file('img-file');
    $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
    $upload = $file->move(public_path($path), $new_image_name);
    if ($upload) {
      return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'name' => $new_image_name]);
    } else {
      return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
    }
  }
}
