<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <h2>Upload Image Form:</h2>
                  <form action="{{ route('upload-image') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="input-group mb-3">
                          <input type="file" class="form-control" id="image" name="image">
                          <button type="submit" class="btn btn-primary">Upload</button>
                      </div>
                  </form>
                  <div>
                      <h4>Uploaded Image:</h4>
                      @if ($imageUrl)
                          <img src="{{ $imageUrl }}" alt="Uploaded Image">
                      @else
                          <p>No image uploaded yet.</p>
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

