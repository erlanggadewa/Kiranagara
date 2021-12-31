<?php

namespace App\View\Components;

use App\Models\Quiz;
use Illuminate\View\Component;

class ManagementKuis extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    $quizData = Quiz::orderBy('level', 'asc')->paginate($perPage = 5, $columns = ['*'], $pageName = 'quiz');
    return view('admin.management-kuis', compact('quizData'));
  }
}
