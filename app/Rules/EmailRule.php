<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class EmailRule implements Rule {
    /**
     * Run the validation rule.
     *
     */
    public function passes($attribute, $value) {
        return Str::endsWith($value, ['.com','.co.uk']);
    }

    public function message(){
        return 'Email does not ends with .com or .co.uk';
    }
}