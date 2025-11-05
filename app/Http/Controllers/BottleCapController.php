<?php

namespace App\Http\Controllers;

use App\Models\BottleCap;
use Illuminate\Http\Request;

class BottleCapController extends Controller
{
    function newBottleCap(Request $request) {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'state' => ['required', 'string'],
            'imagen' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'collector_id' => ['required', 'integer'],
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = time() . '_' . $file->getClientOriginalName();

            $ruta = $file->storeAs('images/bottle_caps', $nombreArchivo, 'public');

            $newCap = new BottleCap();
            $newCap->title = $validated["title"];
            $newCap->description = $validated["description"];
            $newCap->state = $validated["state"];
            $newCap->collector_id = $validated['collector_id'];
            $newCap->img_nom = $nombreArchivo;

            $newCap->save();

            return back()->with('success', 'Chapa guardada correctamente.');
        }

        return back()->withErrors(['imagen' => 'No se pudo subir la imagen.']);

    }

    function updateBottleCap(Request $request) {
        
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'state' => ['required', 'string'],
            'id' => ['required', 'integer']
        ]);

        $bottleCap = BottleCap::findOrFail($validated['id']);

        $bottleCap->title = $validated['title'];
        $bottleCap->description = $validated['description'];
        $bottleCap->state = $validated['state'];

        $bottleCap->save();

        return redirect()->back()->with('success', 'Registro actualizado correctamente.');
    }

    function deleteBottleCap(Request $request) {
        $validated = $request->validate([
            'id' => ['required', 'integer']
        ]);

        BottleCap::where('id', $validated['id'])->delete();

        return redirect()->back()->with('success', 'Registro eliminado correctamente.');
    }
}
