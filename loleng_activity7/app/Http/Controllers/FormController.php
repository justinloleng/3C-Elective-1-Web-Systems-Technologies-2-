<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function handleForm(Request $request)
    {
        $validated = $request->validate([
            'firstName'  => 'required|string|max:50',
            'lastName'   => 'required|string|max:50',
            'sex'        => 'required|in:Male,Female',
            'mobile'     => ['required', 'regex:/^(0999|0998|0920)-?\d{3}-?\d{3}$/'],
            'telephone'  => 'required|numeric',
            'birth_date' => 'required|date_format:Y-m-d',
            'address'    => 'required|string|max:100',
            'email'      => 'required|email',
            'website'    => 'url',
        ]);
        return back()->with('success', 'Form submitted successfully!');
    }
}
