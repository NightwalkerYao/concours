<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ModuleSelectRequest;
use App\Http\Requests\CandidateUpdateRequest;
use App\Models\Module;
use App\Models\Sexe;
use Hash;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('contents.candidates.show', [
        'user' => auth()->user(),
      ]);
    }


    public function choixModules()
    {
      return view('contents.candidates.modules', [
        'modules' => Module::all(),
        'user' => auth()->user(),
      ]);
    }


    public function majModules(ModuleSelectRequest $request)
    {
      $list = $request->validated();

      $candidat = auth()->user();
      $candidat->modules()->sync($list['modules']);

      return response()->json([
        'success' => true,
        'message' => "Inscription réussie !",
        'input' => $list,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('contents.candidates.edit', [
        'user' => auth()->user(),
        'sexes' => Sexe::all(),
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateUpdateRequest $request)
    {
      $data = $request->validated();
      $user = auth()->user();
      $up = $request->only([
        'nom',
        'prenom',
        'date_naissance',
        'motivation',
        'sexe_id',
      ]);
      if($request->hasFile('photo_file') && $request->file('photo_file')->isValid())
        $up['photo'] = str_replace('public/', '', $request->file('photo_file')->store('public/uploads'));
      if($data['email'] != $user->email) {
        if(!(User::where('email', $data['email'])->exists()))
          $up['email'] = $data['email'];
      }
      if(!empty($data['password'])) {
        $up['password'] = Hash::make($data['password']);
      }

      $user->update($up);

      return response()->json([
        'success' => true,
        'message' => "Modification réussie !",
        // 'input' => $input,
        'redirect' => route('compte'),
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
