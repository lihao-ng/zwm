<?php

use App\Guide;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
		Guide::truncate();

		// Guide::create(['name' => 'Admin']);
		// Guide::create(['name' => 'Merchant']);
		// Guide::create(['name' => 'Customer']);
  }
}
