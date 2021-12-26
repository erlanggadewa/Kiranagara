<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreRegionRequest;
use App\Http\Requests\UpdateRegionRequest;

class RegionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.daerah');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreRegionRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreRegionRequest $request)
  {
    $region = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'latitude' => ['required', 'string'],
      'longitude' => ['required', 'string'],
      'size_area' => ['required', 'integer', 'min:0'],
      'population' => ['required', 'integer', 'min:0'],
      'description' => ['required'],
      'img' =>  ['required', 'string', 'max:255'],
    ]);

    Region::create($region);
    return redirect()->back()->withToastSuccess('Data Berhasil Ditambah!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Region  $region
   * @return \Illuminate\Http\Response
   */
  public function show(Region $region)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Region  $region
   * @return \Illuminate\Http\Response
   */
  public function edit(Region $region)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateRegionRequest  $request
   * @param  \App\Models\Region  $region
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateRegionRequest $request, Region $region)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Region  $region
   * @return \Illuminate\Http\Response
   */
  public function destroy(Region $region)
  {
    //
  }

  function crop(Request $request)
  {

    $path = 'img/daerah/';
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
