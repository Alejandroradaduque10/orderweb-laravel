@extends('templates.base')
@section('title', 'Crear tecnico ')
@section('header', 'Crear tecnico')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="#" method="POST">
                @csrf
                
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="fecha">FECHA</label>
                        <input type="date" class="form-control"
                        id="document " name="document" required>
                        
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="dirección">DIRECCION</label>
                        <input type="text" class="form-control"
                        id="dirección" name="dirección" required>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="city">Ciudad</label>
                        <select name="text" id="vity" class=
                          "form-control " id="city" required>
                          <option value="">Seleccione</option>
                        </select>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="especiality">observación</label>
                        <select name="text" id="espeliality" class="
                        form-control" required>
                        <option value="">Seleccione</option>
                        </select>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="cuusal">Causal</label>
                        <select name="text" id="Causal" class="
                        form-control" required>
                        <option value="">Seleccione</option>
                        </select>
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
                        <a href="{{  route('order.index') }}" class="btn btn-secondary btn-block">
                        Cancelar
                        </a>
                    </div>
                </div>    
                    
                    
            </form>
        
        </div>
   
    </div>

    @endsection