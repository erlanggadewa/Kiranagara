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
  public function index(Region $region)
  {
    // $culturalData = Region::where('cultural_category_id', '=', $id)->latest()->get();
    return view('user.daerah', ['region' => $region]);
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
  public function show(Request $request, Region $region)
  {
    $detailData = Region::find($request->id);
    return view('admin.detail-daerah', compact('detailData'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Region  $region
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request, Region $region)
  {
    $selectedData = Region::find($request->id);
    return view('admin.edit-daerah', compact('selectedData'));
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
    $region = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'latitude' => ['required', 'string'],
      'longitude' => ['required', 'string'],
      'size_area' => ['required', 'integer', 'min:0'],
      'population' => ['required', 'integer', 'min:0'],
      'description' => ['required'],
      'img' =>  ['required', 'string', 'max:255'],
    ]);
    Region::find($request->id)->update($region);
    return redirect()->back()->withToastSuccess('Data Berhasil Diubah!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Region  $region
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, Region $region)
  {
    $status = Region::find($request->id)->delete();
    if ($status) {
      return redirect()->back()->withToastSuccess('Data Berhasil Dihapus');
    }
    return redirect()->back()->withToast('toast_error', 'Data Gagal Dihapus');
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
