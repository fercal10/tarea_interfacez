<?php

namespace App\Http\Controllers;

use App\Models\perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfil = Perfil::all();
        return Inertia('Perfil/Index', ['perfil' => $perfil]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request->all();

        $request->validate([
            'imagen' => 'image|mimes:jpg,png,svg|max:5120',
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:50',
            'correo' => 'required|max:50',
            'telefono' => 'required|max:15',
            'nacimiento' => 'required',
            'pais' => 'required|max:50',
            'estado' => 'required|max:50',
            'ciudad' => 'required|max:50',
            'direccion' => 'required|max:300',
            'descripcion' => 'required|max:300',
        ]);

        // $imageFullName = $request->file('image')->getClientOriginalName();

        // $request->file('image')->storeAs('images', $imageFullName);

        // if ($imagen = $request->file('imagen')) {
        //     $rutaGuardarImg = 'imagen/';
        //     $imagenPerfil = date('YmdHis') . "." . $imagen->getClientOriginalName();
        //     $imagen->move($rutaGuardarImg, $imagenPerfil);
        // }

        // $request->file('imagen') = "$imagenPerfil";

        $perfil = new Perfil($request->input());
        $perfil->save();

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(perfil $perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(perfil $perfil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, perfil $perfil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(perfil $perfil)
    {
        //
    }
}