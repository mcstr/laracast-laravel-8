<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    //

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate(
            [
                'name' => 'required|max:255',
                'username' => 'required|min:3|max:255|unique:users,username',
                // alternative way:
                // 'username' => ['required', 'min:3', 'max:25', Rule::unique('users', 'username')],
                // to use different validations we can use pipes as separator
                'email' => 'required|email|unique:users,email',
                // or use an array, THIS IS NEWER SINTAX
                'password' => ['required', 'min:7', 'max:255']
            ]
        );
        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        // login user

        auth()->login($user);


        //we could do it separately or like below just in one go
        // session()->flash('success', 'Your account has been created');

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
