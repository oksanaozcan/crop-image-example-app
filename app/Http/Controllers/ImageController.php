<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{   
  public function store(StoreImageRequest $request)
  {
    $data = $request->validated();

    $image = $request->file('image');
    
    $filePath = $image->store('images', 'public');
    
    $imageModel = Image::create([
      'filename' => $image->getClientOriginalName(),
      'path' => $filePath,
      'url' => url('/storage/' . $filePath),
      'user_id' => auth()->id(),
    ]);

  return response()->json(['message' => 'Image uploaded successfully', 'data' => $imageModel], 201);
  }    
}
