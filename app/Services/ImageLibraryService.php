<?php

namespace App\Services;

use Storage;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class ImageLibraryService {
  public function create($file, $path) {
    if(!$file) { 
      return;
    }
    
    $fileName = Carbon::now()->timestamp . mt_rand() . '.' . $file->extension(); 
    Storage::disk('public')->putFileAs($path, $file, $fileName);
    
    return $path . '/' .$fileName;
  }

  public function update($file, $imageName, $path) {
    if(!$file){
      return $imageName;
    }

    if($imageName) {
      Storage::delete('public/' . $imageName);
    }

    return $this->create($file, $path);
  }

  public function fullPath($image) {
    $baseUrl = url('/');

    if($image) {
      return $baseUrl . '/storage/' . $image;
    }

    return '';
  }
}