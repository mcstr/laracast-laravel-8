<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
                'name' => 'required',
                'username' => 'required',
                // to use different validations we can use pipes as separator
                'email' => 'required|email',
                // or use an array, THIS IS NEWER SINTAX
                'password' => ['required', 'min:7', 'max:255']
            ]
        );

        User::create($attributes);

        return redirect('/');
    }
}
