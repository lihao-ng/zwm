<?php

namespace App\Imports;

use App\User;
use App\Merchant;

use Illuminate\Support\Facades\Log;
use App\Services\ImageLibraryService;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MerchantsImport implements ToCollection, WithHeadingRow {
  protected $imageLibraryService;
  
  function __construct(ImageLibraryService $imageLibraryService) {
    $this->imageLibraryService = $imageLibraryService;
  }

  public function collection(Collection $rows) {
    $index = 0;

    foreach($rows as $row) {
      $index += 1;
      $validator = Validator::make($row->toArray(), [
        'name' => 'required',
        'category' => 'required',
        // 'description' => 'required',
        // 'address' => 'required',
        'lat' => 'required',
        'lng' => 'required',
        // 'hours' => 'required',
        // 'contact' => 'required',
        // 'link' => 'required',
        // 'other_information' => 'required',
        // 'photo' => 'nullable|url',
        // 'approved' => 'required'
      ]);
      
      if(!$validator->fails()) {
        $this->insertRow($row, $index);
      }
    }
  }
 
  public function insertRow($row, $index) {
    Log::info('Creating index: ' . $index);
    $merchantExist = Merchant::where('name', $row['name'])->where('category', $row['category'])->first();

    if($merchantExist) {
      return;
    }

    $user = new User();
    $user->role_id = 2;
    $user->email = $this->generateRandomString(6) . '@zwm.com';
    $user->password = Hash::make('secret');
    $user->save();
    
    $merchant = new Merchant();
    $merchant->user_id = $user->id;
    $merchant->name = $row['name'];
    $merchant->category = $row['category'];
    $merchant->description = $row['description'];
    $merchant->contact = $row['contact'];
    $merchant->address = $row['address'];
    $merchant->lat = $row['lat'];
    $merchant->lng = $row['lng'];
    $merchant->business_hours = $row['hours'];
    $merchant->link = $row['link'];
    $merchant->other_information = $row['other_information'];
    $merchant->approved = 1;

    if($row['photo']) {
      $url = $this->trimUrl($row['photo']);
      
      $photoName = $this->imageLibraryService->createFromUrl($url, 'merchants');
      $merchant->photo = $photoName;
    }

    $merchant->save();
    Log::info('Created index: ' . $index);
    Log::info('----------------------------');
  }

  public function trimUrl($url) {
    $urls = explode('https', $url);
    
    return 'https' . $urls[1];
  }

  public function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
  }
}
