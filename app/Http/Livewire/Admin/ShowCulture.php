<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CulturalData;
use Livewire\WithPagination;

class ShowCulture extends Component
{
  use WithPagination;

  public function render()
  {
    return view('livewire.admin.show-culture', ['culturalData' => CulturalData::paginate(5)]);
  }
}
