<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegistreController extends Controller
{
    
    function index() {
        return view('auth.registrePage');
    }

    function create(Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()->uncompromised()],
            // 'confirmed' espera un campo password_confirmation
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->collector()->create([]);

        auth()->login($user);

        return redirect()->route('home')->with('register-status', 'Cuenta creada correctamente.');
    }
}
