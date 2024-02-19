<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnicianController extends Controller
{
    private $rules = [
        'document'=>'required|integer|max:999999999999999999',
        'name' => 'required|string|max:100|min:3', 
        'especiality' => 'required | numeric|max:9999999999|min:1',
        'phone' => 'required|numeric|max:99999999999999999999',

    ];
    private $traductionAttributes = array(
        'document'=> 'documento',
        'name' => 'nombre',
        'especiality' => 'especialidad',
        'city' => 'ciudad',
        'phone' => 'Teléfono' 
    );

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        
        $technicians = Technician::all();
        return view('technician.index', compact('technicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technician.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator= Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('technician.create')->withInput()->withErrors($errors);
        }
        //documentt no es atonic, por tanto se consulta si ta existe un
        //técnico con ese document
        $technician = Technician::where('document', '=' , $request->document)->first();
        if($technician)
        {
            session()->flash('error', 'Ya existe un técnico con ese documento');
            return redirect()->route('technician.create');
        }

        $technician = Technician::create($request-> all());
        session()->flash('message', 'Registro creadoo exitosament');
        return redirect()->route('technician.index');
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
        $technician = Technician::where('document', '=' , $id)->first();
        if($technician)
        {
            return view('technician.edit', compact('technician') );
            
        }
        session()->flash('warning', 'No se encuntra el registro solicitado');
            return redirect()->route('technician.index');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $document)
    {
        $validator= Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();

            return redirect()->route('technician.edit')->withInput()->withErrors($errors);
        }


        $technician = Technician::where('document', '=' , $document)->first();
        if($technician)
        {
           $technician->name = $request->name;
           $technician->especiality = $request->especiality;
           $technician->phone = $request->phone;   
           $technician->save();
           session()->flash('message', ' Registro actualizado exitosamente');
        }

        else{
            session()->flash('warnig', '  No se encuentra el registro solicitado');
        }

        return redirect()->route('technician.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technician = Technician::where('document', '=' , $id)->first();
        if($technician)
        {
           
           $technician->delete();
           session()->flash('message', ' Registro elminado exitosamente');
        }

        else{
            session()->flash('warnig', '  No se encuentra el registro solicitado');
        }

        return redirect()->route('technician.index');
    }
}
