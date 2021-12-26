<?php

namespace App\Http\Controllers;

use App\Models\CulturalData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCulturalDataRequest;
use App\Http\Requests\UpdateCulturalDataRequest;

class CulturalDataController extends Controller
{


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
   * @param  \App\Http\Requests\StoreCulturalDataRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCulturalDataRequest $request)
  {
    $culturalData = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'cultural_category_id' => ['required', 'integer', 'max:255'],
      'img' =>  ['required', 'string', 'max:255'],
      'description' =>  ['required', 'string']
    ]);

    CulturalData::create($culturalData);
    return redirect()->back()->withToastSuccess('Data Berhasil Ditambah!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\CulturalData  $culturalData
   * @return \Illuminate\Http\Response
   */
  public function show(CulturalData $culturalData)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\CulturalData  $culturalData
   * @return \Illuminate\Http\Response
   */
  public function edit(CulturalData $culturalData)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateCulturalDataRequest  $request
   * @param  \App\Models\CulturalData  $culturalData
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCulturalDataRequest $request, CulturalData $culturalData)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\CulturalData  $culturalData
   * @return \Illuminate\Http\Response
   */
  public function destroy(CulturalData $culturalData)
  {
    //
  }

  function crop(Request $request)
  {

    $path = 'img/budaya/data/';
    $file = $request->file('img');
    $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
    $upload = $file->move(public_path($path), $new_image_name);
    if ($upload) {
      return response()->json(['status' => 1, 'msg' => 'Image has been cropped successfully.', 'name' => $new_image_name]);
    } else {
      return response()->json(['status' => 0, 'msg' => 'Something went wrong, try again later']);
    }
  }
}
