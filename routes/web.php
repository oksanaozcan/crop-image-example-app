<?php

use App\Http\Controllers\ImageController;
use App\Models\Image;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
  $latestImage = Image::latest()->first();
  $imageUrl = $latestImage ? $latestImage->url : null;

  return view('dashboard', compact('imageUrl'));
})->middleware(['auth'])->name('dashboard');

Route::post('/upload-image', [ImageController::class, 'store'])
    ->name('upload-image');

require __DIR__.'/auth.php';
