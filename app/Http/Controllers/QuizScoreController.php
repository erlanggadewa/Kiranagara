<?php

namespace App\Http\Controllers;

use App\Models\QuizScore;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuizScoreRequest;
use App\Http\Requests\UpdateQuizScoreRequest;

class QuizScoreController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
   * @param  \App\Http\Requests\StoreQuizScoreRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreQuizScoreRequest $request)
  {
    $score = $request->validate([
      'level' => ['required', 'string', Rule::in(['easy', 'medium', 'hard', 'expert'])],
      'score' => ['required', 'string'],
    ]);
    $score['user_id'] = Auth::user()->id;
    QuizScore::create($score);
    return redirect()->back()->withToastSuccess('Statistik nilai berhasil diubah');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\QuizScore  $quizScore
   * @return \Illuminate\Http\Response
   */
  public function show(QuizScore $quizScore)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\QuizScore  $quizScore
   * @return \Illuminate\Http\Response
   */
  public function edit(QuizScore $quizScore)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateQuizScoreRequest  $request
   * @param  \App\Models\QuizScore  $quizScore
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateQuizScoreRequest $request, QuizScore $quizScore)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\QuizScore  $quizScore
   * @return \Illuminate\Http\Response
   */
  public function destroy(QuizScore $quizScore)
  {
    //
  }
}
