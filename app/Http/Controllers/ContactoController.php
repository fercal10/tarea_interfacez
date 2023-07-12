<?php

namespace App\Http\Controllers;

use App\Models\contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacto = contacto::all();

        return Inertia('Contacto/Index', ['contacto' => $contacto]);
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
        //
        $request->validate([
            'nombre' => 'required|max:50',
            'telefono' => 'required|max:15',
            'mensage' => 'required|max:300',
        ]);
        $contacto = new contacto($request->input());
        $contacto->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contacto $contacto)
    {
        //
    }
}
