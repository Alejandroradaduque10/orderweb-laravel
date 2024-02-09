<?php

namespace App\Http\Controllers;

use App\Models\Causal;
use Illuminate\Http\Request;

class CausalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $causals = Causal::all();  //select*from causal consulte
        //dd($causals);
        return view('causal.index', compact('causals'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('causal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $causal = Causal::create($request->all());
        session()->flash('message', 'Registro insertado exitosamente');
        return redirect()->route('causal.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $causal = Causal::find($id);
        if($causal) // si la causal existe
        {
            return view('causal.edit' , compact('causal'));
            
        }
        else
        {
            return redirect()->route('causal.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $causal = Causal::find($id);
        if($causal) // si la causal existe
        {
           $causal->update($request->all());
            session()->flash('message','Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
           
        }
        return redirect()->route('causal.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $causal = Causal::find($id);
        if($causal) // si la causal existe
        {
           $causal->delete(); //delete from causal where id = x
            session()->flash('message','Registro eliminado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
           
        }
        return redirect()->route('causal.index');
    }
}
