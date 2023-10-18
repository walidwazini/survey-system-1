<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Rules\EmailRule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller {
    public function signup(Request $req) {
        try {
            $req->validate([
                "name" => ['required', 'string'],
                "username" => ['required','min:5','max:12','string','unique:'. User::class],
                "email" => ['required', 'string', 'email', new EmailRule(), 'unique:' . User::class],
                "password" => ['required', 'min:6']
            ]);
            $newUser = $req->all();
            
            // dump($newUser);

            $newUser['username'] = Str::start($newUser['username'],'@');
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