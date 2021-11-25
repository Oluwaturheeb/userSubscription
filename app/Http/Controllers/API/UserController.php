<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;

class UserController extends Controller
{
    public function create (Request $r) {
        $r->validate([
            'name' => 'required',
            'email' => 'required|email:rfc|unique:users'
        ]);

        $user = User::create($r->all());
        if (!$user) return response()->json([
            'code' => 0,
            'message' => 'Unknown error'
        ]);

        return response()->json([
            'code' => 1,
            'message' => 'User created!'
        ]);

    }

    protected function failedValidation(Validator $validator) {
        $errors = $validator->errors();

        return response()->json([
            'code' => 0,
            'message' => $errors->messages(),
        ], 422);
    }
}
