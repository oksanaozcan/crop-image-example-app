<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <img id="upload-demo">
              <div>
                <h6>Select image for crop:</h6>
                <form>
                  @csrf
                  <input type="file" id="images" name="image">
                  <button id="image-upload">Upload Image</button>
                </form>
              
              </div>
              <div>
                <img id="show-crop-image">
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

