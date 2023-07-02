<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function submit(Request $request)
    {
        // Handle the form submission
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        // Perform any necessary operations with the form data

        // Redirect or return a response
        return redirect('/HomePage');
    }
}