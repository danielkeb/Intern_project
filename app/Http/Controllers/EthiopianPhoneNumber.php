<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EthiopianPhoneNumber
{
    public function passes($attribute, $value)
    {
        // Check if the phone number starts with "+251" and has a specific length (e.g., 13 characters)
        return preg_match('/^(09|\+251)\d{9}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must start with "+251" and have 13 digits (including "+").';
    }
}

