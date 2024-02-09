@extends('templates.base')
@section('title', 'editar Observaciones')
@section('header', 'editar observaciones')
@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="#" method="POST">
                @csrf
                @method('PUT')

                
                <div class="row form-group">
                    <div class="col-lg-12 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control"
                        id="observation " name="observation" required
                        value="{{ $observation['description'] }}">
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button class="btn btn-primary btn-block"
                        type="submit">
                        Guardar
                    </button>

                    
                        <div class="col-lg-6 mb-4">
                            <a href="{{  route('observation.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                        </div>

                    
                    
            </form>
        
        </div>
   
    </div>

@endsection
