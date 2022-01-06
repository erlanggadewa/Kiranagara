<?php

namespace App\Http\Controllers;

use App\Models\CulturalData;
use Illuminate\Http\Request;
use App\Models\CulturalCategory;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreCulturalDataRequest;
use App\Http\Requests\UpdateCulturalDataRequest;

class CulturalDataController extends Controller
{

  function index($id)
  {
    $culturalData = CulturalData::where('cultural_category_id', '=', $id)->latest()->get();
    return view('user.budaya', ['culturalData' => $culturalData]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.budaya', ["culturalCategories" => CulturalCategory::all()]);
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
      'name' => ['required', 'string', 'max:255', 'unique:cultural_data'],
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
  public function show(CulturalData $culturalData, Request $request)
  {
    $detailData = CulturalData::where('id', '=', $request->id)->get()[0];
    return view('admin.detail-budaya', compact('detailData'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\CulturalData  $culturalData
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request, CulturalData $culturalData)
  {
    $selectedData = CulturalData::where('id', '=', $request->id)->get()[0];
    return view(
      'admin.edit-budaya',
      [
        "selectedData" => $selectedData,
        "culturalCategories" => CulturalCategory::all()
      ]
    );
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
    $data = $request->validate([
      'name' => ['required', 'string', 'max:255', 'unique:cultural_data,name,' . $request->id],
      'cultural_category_id' => ['required', 'integer', 'max:255'],
      'img' =>  ['required', 'string', 'max:255'],
      'description' =>  ['required', 'string']
    ]);

    CulturalData::where("id", "=", $request->id)->update($data);
    return redirect()->back()->withToastSuccess('Data Berhasil Diupdate!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\CulturalData  $culturalData
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request)
  {
    $status = CulturalData::where('id', '=', $request->id)->delete();
    if ($status) {
      return redirect()->back()->withToastSuccess('Data Berhasil Dihapus');
    }
    return redirect()->back()->withToast('toast_error', 'Data Gagal Dihapus');
  }

  function crop(Request $request)
  {

    $path = 'img/budaya/data/';
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
