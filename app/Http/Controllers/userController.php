<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class userController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => ['required','min:3', 'max:10', Rule::unique('users','name')],
            'email' => ['required', 'email', Rule::unique('users','name')],
            'password' => ['required','min:8','max:20']
        ]);

        $fields['passwrod'] = bcrypt($fields['password']);
        $user = User::create($fields);
        auth()->login($user);

        return redirect('/home');
    }

    public function logout(Request $request){
        auth()->logout();
        return redirect('/home');
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']])){
            $request->session()->regenerate();
        }

        return redirect('/home');
    }

}
