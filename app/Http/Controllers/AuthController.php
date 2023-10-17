<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Rules\EmailRule;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function signup(Request $req) {
        // dump($req);
        try {
            $req->validate([
                "name" => ['required', 'string'],
                "email" => ['required', 'string', 'email', new EmailRule(), 'unique:' . User::class],
                "password" => ['required', 'min:6']
            ]);
            $newUser = $req->all();
            $newUser['password'] = bcrypt($newUser['password']);
            $newUser = User::create($newUser);

            //  Received token for automatic login after signup.
            $token = $newUser->createToken('main')->plainTextToken;

            return response()->json([
                'message' => 'Succesfully signup!',
                'user' => $newUser,
                'token' => $token
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 400);
        }
    }


    public function login(Request $request) {
        try {
            $request->validate([
                "email" => ['required', 'string', 'email', new EmailRule()],
                'password' => ['required', 'min:6'],
            ]);

            if (!auth()->attempt($request->all())) {
                throw new Exception('Email / Password Mismatch');
            }

            return response()->json([
                'token' => auth()->user()->createToken('main')->plainTextToken,
                'user' => auth()->user()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
            ], 400);
        }
    }

}