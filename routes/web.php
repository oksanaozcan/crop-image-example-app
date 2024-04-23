<?php

use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
  $latestImage = Image::latest()->first();
  $imageUrl = $latestImage ? $latestImage->url : null;

  return view('dashboard', compact('imageUrl'));
})->middleware(['auth'])->name('dashboard');

Route::post('/upload-image', [ImageController::class, 'store'])
    ->middleware(['auth'])
    ->name('upload-image');

require __DIR__.'/auth.php';
