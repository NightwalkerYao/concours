<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Sexe;
// use App\Models\Module;
use App\Http\Requests\CandidateCreateRequest;

class RegisteredUserController extends Controller
{
  /**
  * Display the registration view.
  *
  * @return \Illuminate\View\View
  */
  public function create()
  {
    return view('auth.register', [
      // 'modules' => Module::all(),
      'sexes' => Sexe::all(),
    ]);
  }

  /**
  * Handle an incoming registration request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\RedirectResponse
  *
  * @throws \Illuminate\Validation\ValidationException
  */
  public function store(CandidateCreateRequest $request)
  {
    $input = $request->validated();
    if($request->hasFile('photo_file') && $request->file('photo_file')->isValid())
      $input['photo'] = str_replace('public/', '', $request->file('photo_file')->store('public/uploads'));

    unset($input['photo_file']);
    $input['password'] = Hash::make($input['password']);

    $candidat = User::create($input);

    event(new Registered($candidat));

    Auth::login($candidat);

    return response()->json([
      'success' => true,
      'message' => "Inscription réussie !",
      // 'input' => $input,
      'redirect' => RouteServiceProvider::HOME,
    ]);


    // return redirect(RouteServiceProvider::HOME);
  }
}
