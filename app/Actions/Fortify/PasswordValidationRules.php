<?php

namespace App\Actions\Fortify;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return ['required',
            'string',
            'min:8', //must have at least 8 chars
            'regex:/[a-z]/',  //must contain at least one lowercase char
            'regex:/[A-Z]/',  //must contain at least one uppercase char
            'regex:/[0-9]/',  //must contain at least one number
            'regex:/[@$!%*#?&]/', //must contain at least one special char,
        ];
    }
}
