@extends('templates.base')
@section('title', 'Editar ordenes ')
@section('header', 'Editar ordenes')
@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('order.update', $order['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="fecha">FECHA</label>
                        <input type="date" class="form-control"
                        id="legalization_date " name="legalization_date" required value="{{ $order['legalization_date'] }}">
                        
                    </div>
                    <div class="col-lg-4 mb-4">
                        <label for="dirección">DIRECCION</label>
                        <input type="text" class="form-control"
                        id="addres" name="addres" required value="{{ $order['addre'] }}">
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-lg-4 mb-4">
                        <label for="city">Ciudad</label>
                        <select name="text" id="vity" class=
                          "form-control " id="city" required >
                          <option value="">Seleccione</option
                            @foreach ($cities as $city)>
                            <option value="{{ $city['value'] }}" @if($city['value'] == $order['city']) selected @endif>
                             {{ $city['name'] }}  
                             </option>
                             @endforeach
                          </select>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <label for="especiality">observación</label>
                        <select name="text" id="espeliality" class="
                        form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($observations as $observation)
                        <option value="{{ $observation['id'] }}" 
                        @if($observation['id'] == $order['observation:id']) selected @endif>
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
                        <option value="{{ $observation['id'] }}"
                        @if($causal['id'] == $order['causa_id']) selected @endif>
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
            <hr>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" >
                            <h6 class="m-0 font-weight-bold text-primary">
                                    Añadir/Retirar actividades
                            </h6>
                            <div>
                                <div class="card-body">
                                    <div class="row form-group">
                                        <div class="col-lg-6 mb-4">
                                            <label for="table_data">Actividades disponibles</label>
                                            <table id="table_data" class="table table-striped table-hover">
                                                <thead>
                                                    <th>id</th>
                                                    <th>Description</th>
                                                    <th>Horas</th>
                                                    <th>Agregar</th>
                                                </thead>
                                                <tbody>
                                                    @if(count($activitiesNotInOrder) == 0)
                                                    <tr>
                                                        <td colspan="4">
                                                            No existen actividades disponibles
                                                        </td>
                                                    </tr>
                                                    @else
                                                        @foreach ($activitiesNotInOrder as $activity)  
                                                        <tr>
                                                            <td>{{ $activity->id }}</td>
                                                            <td>{{ $activity->description }}</td>
                                                            <td>{{ $activity->hours }}</td>
                                                            <td>
                                                                <a href="{{ route('order.add_activity', [$order['id'], $activity->id]) }}" title="agregar" class="btn btn-primary btn-circle btn-sm">
                                                                    <i class="fas fa-fw  fa-plus"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div class="col-lg-6 mb-4">
                                    <label for="table_data">Actividades agregadas</label>
                                    <table id="table_data" class="table table-striped table-hover">
                                        <thead>
                                            <th>id</th>
                                            <th>Description</th>
                                            <th>Horas</th>
                                            <th>Retirar</th>
                                        </thead>
                                        <tbody>
                                            @if(count($activitiesNotInOrder) == 0)
                                            <tr>
                                                <td colspan="4">
                                                    No existen actividades agregadas
                                                </td>
                                            </tr>
                                            @else
                                                @foreach ($activitiesAdded as $activity)  
                                                <tr>
                                                    <td>{{ $activity->id }}</td>
                                                    <td>{{ $activity->description }}</td>
                                                    <td>{{ $activity->hours }}</td>
                                                    <td>
                                                        <a href="{{ route('order.remove_activity', [$order['id'], $activity[id]]) }}" title="Retirar" class="btn btn-danger btn-circle btn-sm">
                                                            <i class="fas fa-fw  fa-minus"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    @endsection