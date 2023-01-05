<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\catalogs;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use session;
class UserControllers extends Controller
{
    //
    public function registration(){
        return view('auth.registration');
    }
    public function cfregistration(UserRequest $request)
    {
/*
        $this->validate($request, [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);*/

        /**  @var User $user */
        $user = User::query()
            ->firstOrCreate([
                'email' => $request->get('email'),
            ], [
                'name' => $request->get('name'),
                'password' => Hash::make($request->get('password')),
            ]);

        if (!$user->wasRecentlyCreated) {
            return back()->with('fail', 'someting wrong!');
        }
        return back()->with('success', 'success create acount!');

        // Generate new token
        $token = $user->createToken('email');

        return response()
            ->json([
                'status' => 1,
                'data' => [
                    'token' => $token->plainTextToken,
                ],
            ]);
    }
    public function loginView(){
        
        return view('auth.login');
    }
    
    public function login(LoginRequest $request){
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
        ])) {
            return redirect('/');
        }
        return back()->with('fail', 'someting wrong!');

    }
    public function logout()
    {
        
        Auth::logout();

        return redirect('/');
    }

}
