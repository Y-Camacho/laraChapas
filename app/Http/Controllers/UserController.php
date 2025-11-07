<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class UserController extends Controller
{
    
    function newUser(Request $request) {

        $validated = $request->validate([
            'add_name' => ['required', 'string', 'max:255'],
            'add_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'psswd' => ['required', Password::min(8)->mixedCase()->numbers()->uncompromised()],
        ]);

        $user = User::create([
            'name' => $validated['add_name'],
            'email' => $validated['add_email'],
            'password' => Hash::make($validated['psswd']),
        ]);

        $user->collector()->create([]);

        return redirect()->back()->with('success', 'Usuario registrado correctamente.');
    }

    function updateUser(Request $request) {
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100'],
            'id' => ['required', 'integer']
        ]);

        $user = User::findOrFail($validated['id']);

        // Verificar si el email ya está en uso por otro usuario
        $existingUser = User::where('email', $validated['email'])
                        ->where('id', '!=', $validated['id'])
                        ->first();

        if ($existingUser) {
            return redirect()->back()
                            ->withErrors(['email' => 'El correo electrónico ya está en uso por otro usuario.'])
                            ->withInput();
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        $user->save();

        return redirect()->back()->with('success', 'Registro actualizado correctamente.');
    }

    function deleteUser(Request $request) {

        $validated = $request->validate([
            'id' => ["required", 'integer'],
        ]);

        User::where('id', $validated['id'])->delete();

        return redirect()->back()->with('success', 'Registro eliminado correctamente.');
    }
    
}
