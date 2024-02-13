@extends('templates.base')
@section('title', 'editar tecnico ')
@section('header', 'editar tecnico')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('technician.update ,' $technician['document']) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="document">Documento</label>
                        <input type="numbers" class="form-control"
                        id="document " name="document" required value="{{ $technician['document'] }}">
                        
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control"
                        id="name" name="name" required
                        value="{{ $technician['name'] }}">
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="phone">Telefono</label>
                        <input name="numbers" id="phone" class=
                          "form-control " id="phone" required
                          value="{{ $technician['phone'] }}">
                    </div>

                    <div class="col-lg-6 mb-4">
                        <label for="especiality">Tipo</label>
                        <select name="text" id="espeliality" class="
                        form-control" required
                        value="{{ $technician['especiality'] }}">          
                
                    </div>

    

                </div>

                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <a href="#" class="btn btn-primary btn-block"
                        type="submit">
                            Guardar
                        </a>
                    </div>                       
                    <div class="col-lg-6 mb-4">
                        <a href="{{  route('technician.index') }}" class="btn btn-secondary btn-block">
                        Cancelar
                        </a>
                    </div>
                </div>    
                    
                    
            </form>
        
        </div>
   
    </div>

    @endsection
