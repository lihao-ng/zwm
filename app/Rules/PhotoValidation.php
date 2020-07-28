<?php

namespace App\Rules;

use App\Guide;
use Illuminate\Contracts\Validation\Rule;

class PhotoValidation implements Rule{
  protected $oriPhoto;
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($oriPhoto){
    $this->oriPhoto = $oriPhoto;
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value){
    dd('bob');
    if(!$oriPhoto && !$value) {
      return false;
    }

    return true;
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message(){
    return 'The photo field is required.';
  }
}
