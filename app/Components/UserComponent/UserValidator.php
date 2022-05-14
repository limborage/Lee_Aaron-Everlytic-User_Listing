<?php

namespace App\Components\UserComponent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserValidator
{
    public function validateUser(array $userData, $update = false)
    {
        $validator = Validator::make($userData, [
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|max:50|email:rfc',
            'position' => 'required|max:50'
        ]);

        $validator->sometimes('email', 'unique:users', function ($input) use ($update) {
            return !$update;
        });

        if ($validator->fails()) {
            return ['type' => 'error', 'validator' => $validator];
        }

        return ['type' => 'success', 'validator' => $validator];
    }
}