<?php

namespace App\Rules;

use App\Eis;
use Illuminate\Contracts\Validation\Rule;

class EisRange implements Rule {
  protected $firstValue;
  protected $secondValue;
  protected $type;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
      // $this->secondValue = $secondValue;
      // $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $firstValue) {
      dd('hi');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
      return 'Minimum and maximum value is not correct';
    }
}
