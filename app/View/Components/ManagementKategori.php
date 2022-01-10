<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\CulturalCategory;

class ManagementKategori extends Component
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
    $culturalCategory = CulturalCategory::paginate($perPage = 10, $columns = ['*'], $pageName = 'category');
    return view('admin.management-kategori', ["dataKategori" => $culturalCategory]);
  }
}
