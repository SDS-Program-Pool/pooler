<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     *
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'username'   => [
                'required',
                'string',
                'max:8',
                Rule::unique(User::class),
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'username'   => $input['username'],
            'first_name' => $input['first_name'],
            'last_name'  => $input['last_name'],
            'is_student' => true,
            'is_staff'   => false,
            'is_admin'   => false,
            'email'      => $input['email'],
            'password'   => Hash::make($input['password']),
        ]);
    }
}
