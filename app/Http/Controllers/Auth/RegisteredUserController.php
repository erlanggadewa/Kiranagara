<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
  /**
   * Display the registration view.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view('auth.register');
  }

  /**
   * Handle an incoming registration request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  public function store(Request $request)
  {
    $token = env('TOKEN_ADMIN');
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'role' => ['required', 'string', Rule::in(['admin', 'user'])],
      "token" => [Rule::requiredIf($request->role == 'admin'), Rule::in($token)],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
      'name' => $request->name,
      'role' => $request->role,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);

    if ($request->role == 'admin') {
      return redirect()->route('dashboard-admin');
    }
    return redirect(RouteServiceProvider::HOME);
  }
}
