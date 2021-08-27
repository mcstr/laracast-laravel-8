<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('sucess', 'Goodbye!');
    }

    public function store()
    {
        // validate the request

        $attributes = request()->validate([
            'email'=> 'required|email',
            'password' => 'required',
        ]);

        // attempt to authenticate and log the user
        // with the provided credentials
        if (! auth()->attempt($attributes)) {
            // auth failed

            // an alternative
            // return back()
            // ->withInput()
            // ->withErrors(['email' => 'Your provided credentials could not be verified']);

            throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
            ]);
        }

        session()->regenerate();
        // redirect with success flash message
        return redirect('/')->with('success', 'Welcome Back!');
    }


    public function create()
    {
        return view('sessions.create');
    }
}
