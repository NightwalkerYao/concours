<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/compte.php', function () {
  return redirect()->route('compte');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => '/candidat', 'middleware' => 'auth'], function(){
  Route::get('/compte.php', [CandidateController::class, 'index'])->name('compte');
  Route::get('/modules.php', [CandidateController::class, 'choixModules'])->name('choix-modules');
  Route::post('/modules.php', [CandidateController::class, 'majModules']);
  Route::get('/modifier.php', [CandidateController::class, 'edit'])->name('modifier');
  Route::post('/modifier.php', [CandidateController::class, 'update']);
});


require __DIR__.'/auth.php';
