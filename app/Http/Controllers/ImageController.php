<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{   
  public function store(Request $request)
  {    
    $request->validate([
      'croppedImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
    ]);
 
    $path = $request->file('croppedImage')->store('images'); // Store in the 'images' directory  

    return response()->json(['path' => $path], 200); // Return a response with the stored image path
  }    
}
