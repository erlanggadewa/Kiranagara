<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Rules\Password;

class AuthenticatedSessionController extends Controller
{
  /**
   * Display the login view.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('auth.login');
  }

  /**
   * Handle an incoming authentication request.
   *
   * @param  \App\Http\Requests\Auth\LoginRequest  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(LoginRequest $request)
  {
    $request->authenticate($request);

    $request->session()->regenerate();

    if (Auth::user()->role == 'user')
      return redirect()->intended(RouteServiceProvider::HOME);

    return redirect()->route('dashboard-admin');
  }

  public function update(Request $request)
  {

    $data = $request->validate([
      'name' => ['required', 'string', 'max:255', 'unique:users,name,' . Auth::user()->id],
      'img' =>  ['required', 'string', 'max:255'],
      'password' => ['required', Password::defaults(), 'confirmed'],
    ]);

    if ($request->password != Auth::user()->password) {
      $data['password'] = Hash::make($request->password);
      User::where("id", "=", Auth::user()->id)->update($data);
    }

    User::where("id", "=", Auth::user()->id)->update($data);

    return redirect()->back()->withToastSuccess('Data Berhasil Diupdate!');
  }

  /**
   * Destroy an authenticated session.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function destroy(Request $request)
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
