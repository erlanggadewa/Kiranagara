<?php

namespace App\View\Components;

use App\Models\Region;
use Illuminate\View\Component;

class ManagementDaerah extends Component
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
    $regions = Region::paginate($perPage = 5, $columns = ['*'], $pageName = 'region');
    return view('admin.management-daerah', compact('regions'));
  }
}
