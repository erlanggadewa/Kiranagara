<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{


  public function getAnswer($id, $userAnswers)
  {

    $answer = Quiz::where('id', '=', $id)->select('correct_option')->get();
    if (Str::lower($answer[0]->correct_option) == Str::lower($userAnswers)) {
      return response()->json(true);
    }
    return response()->json(false);;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($level)
  {
    $quizzes = Quiz::where('level', '=', $level)->inRandomOrder()->take(10)->get();

    return view(
      'user.quiz',
      [
        'level' => $level,
        "quizzes" => $quizzes
      ]
    );
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.kuis');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreQuizRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreQuizRequest $request)
  {
    $quiz = $request->validate([
      'level' => ['required', 'string', Rule::in(['easy', 'medium', 'hard', 'expert'])],
      'question' => ['required'],
      'option_1' => ['required', 'string', 'max:255'],
      'option_2' => ['required', 'string', 'max:255'],
      'option_3' => ['required', 'string', 'max:255'],
      'option_4' => ['required', 'string', 'max:255'],
      'correct_option' => ['required', 'string', Rule::in(['a', 'b', 'c', 'd'])],
      'img' =>  ['required', 'string', 'max:255'],
    ]);
    Quiz::create($quiz);
    return redirect()->back()->withToastSuccess('Data Berhasil Ditambah!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Quiz  $quiz
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request, Quiz $quiz)
  {
    $detailData = Quiz::find($request->id);
    return view('admin.detail-kuis', compact('detailData'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Quiz  $quiz
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request, Quiz $quiz)
  {
    $selectedData = Quiz::find($request->id);
    return view('admin.edit-kuis', compact('selectedData'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateQuizRequest  $request
   * @param  \App\Models\Quiz  $quiz
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateQuizRequest $request, Quiz $quiz)
  {
    $quiz = $request->validate([
      'level' => ['required', 'string', Rule::in(['easy', 'medium', 'hard', 'expert'])],
      'question' => ['required'],
      'option_1' => ['required', 'string', 'max:255'],
      'option_2' => ['required', 'string', 'max:255'],
      'option_3' => ['required', 'string', 'max:255'],
      'option_4' => ['required', 'string', 'max:255'],
      'correct_option' => ['required', 'string', Rule::in(['a', 'b', 'c', 'd'])],
      'img' =>  ['required', 'string', 'max:255'],
    ]);

    $status = Quiz::find($request->id)->update($quiz);
    if ($status) {
      return redirect()->back()->withToastSuccess('Data Berhasil Diedit');
    }
    return redirect()->back()->withToast('toast_error', 'Data Gagal Diedit');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Quiz  $quiz
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, Quiz $quiz)
  {
    $status = Quiz::find($request->id)->delete();
    if ($status) {
      return redirect()->back()->withToastSuccess('Data Berhasil Dihapus');
    }
    return redirect()->back()->withToast('toast_error', 'Data Gagal Dihapus');
  }

  function crop(Request $request)
  {

    $path = 'img/kuis/' . $request->level . '/';
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
