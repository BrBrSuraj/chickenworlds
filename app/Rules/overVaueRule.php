<?php

namespace App\Rules;

use App\Models\Stock;
use Illuminate\Contracts\Validation\Rule;

class overVaueRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
      if(Stock::where('qty', '>=', $value)->count())
      {
          return true;
      }
      return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Try to Extract more than available quantity. Extract upto available Only.';
    }
}
