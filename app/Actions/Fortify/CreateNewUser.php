<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name'    => ['required', 'string', 'max:32'],
            'last_name'     => ['required', 'string', 'max:32'],
            'username'      => ['nullable', 'string', 'max:16', 'unique:users'],
            'phone'         => ['required', 'numeric', 'unique:users'],
            'email'         => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'address'       => ['nullable', 'string', 'max:255'],
            'password'      => $this->passwordRules(),
            'terms'         => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::firstOrCreate([
            'phone'         => $input['phone'],
            'email'         => $input['email'] ?? null,
        ], [
            'first_name'    => $input['first_name'],
            'last_name'     => $input['last_name'],
            'address'       => $input['address'],
            'password'      => Hash::make($input['password']),
        ]);

        if ($user) {
            session()->flash('status', "Your account has been created successfully.");
        } else {
            session()->flash('status', "Sorry, your account cannot be created. Contact support for more details.");
        }

        return $user;
    }
}
