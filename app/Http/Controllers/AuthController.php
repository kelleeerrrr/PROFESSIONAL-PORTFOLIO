<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ==================== CONTACT ==================== //
    public function contact()
    {
        return view('contact');
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}