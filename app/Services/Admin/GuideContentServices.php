<?php

namespace App\Services\Admin;

use App\GuideContent;

use Illuminate\Http\Request;
use App\Services\TransformerService;

class GuideContentServices extends TransformerService {
	public function transform($guideContent) {
		return [
			'id' => $guideContent->id,
			'name' => $guideContent->name,
      'description' => $guideContent->description
		];
  }
}
