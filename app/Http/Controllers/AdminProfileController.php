<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
  public function index()
  {
    return view('admin.admin-profile');
  }
  function crop(Request $request)
  {
    $path = 'img/profile/';
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
