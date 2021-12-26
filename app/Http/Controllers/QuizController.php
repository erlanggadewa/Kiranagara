<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.kuis');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
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
      'correct_option' => ['required', 'string', Rule::in(['option_1', 'option_2', 'option_3', 'option_4'])],
      'img' =>  ['required', 'string', 'max:255'],
    ]);
    Quiz::create($quiz);
    return redirect()->route('kuis-admin.index')->withToastSuccess('Data Berhasil Ditambah!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Quiz  $quiz
   * @return \Illuminate\Http\Response
   */
  public function show(Quiz $quiz)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Quiz  $quiz
   * @return \Illuminate\Http\Response
   */
  public function edit(Quiz $quiz)
  {
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Quiz  $quiz
   * @return \Illuminate\Http\Response
   */
  public function destroy(Quiz $quiz)
  {
    //
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
