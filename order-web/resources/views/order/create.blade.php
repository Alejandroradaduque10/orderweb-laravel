@extends('templates.base')
@section('title', 'Crear tecnico ')
@section('header', 'Crear tecnico')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf        
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="fecha">FECHA</label>
                        <input type="date" class="form-control"
                        id="legalization_date " name="legalization_date" required
                        value="{{ old(legalization_date) }}">
                        
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="address">DIRECCION</label>
                        <input type="text" class="form-control"
                        id="address" name="address" required
                        value="{{ old('address') }}">
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="city">Ciudad</label>
                        <select name="text" id="vity" class=
                          "form-control " id="city" required >
                          <option value="">Seleccione</option
                            @foreach ($cities as $city)>
                            <option value="{{ $city['value'] }}"
                            @if(old('order_id') == $technician['id']) selected @endif>
                             {{ $city['name'] }}</option>
                          </select>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="observation_id">observación</label>
                        <select name="text" id="observation_id" class="
                        form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($observations as $observation)
                        <option value="{{ $observation['id'] }}"
                        @if(old('observation') == $technician['id']) selected @endif>
                            {{ $observation['description'] }}
                        </option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="causal_id">Causal</label>
                        <select name="causal_id" id="causal_id" class="
                        form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($observations as $observation)
                        <option value="{{ $observation['id'] }}">
                            {{ $observation['description'] }}
                        </option>
                        @endforeach
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