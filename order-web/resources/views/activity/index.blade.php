@extends('templates.base')
@section('title', 'Listado de actividades')
@section('header', 'Listado  de actividades')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('activity.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>

    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_data" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Horas</th>
                        <th>Técnico</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($activityes as $activity)
                    <tr>
                        <td>1</td>
                        <td>{{ $activity['id'] }}</td>
                        <td>{{ $activity['description'] }}</td>
                        <td>{{ $activity['hours'] }}</td>
                        <td>{{ $activity->technician->document}} - {{$activity->technician->name  }}</td>
                        <td>{{ $activity->type_activity->description }}</td>
                        <td></td>
                            <a href="{{ route('activity.edit',$activity['id'] ) }}" title="editar" class="btn btn-info btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{ route('activity.destroy',$activity['id'] ) }}" title="eliminar" class="btn btn-danger btn-circle btn-sm" onclick="return remove()">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

 @endsection

 @section('scripts')
    <script>
        $(document).ready(function(){
            $('#table_data').DataTable();

        });

        function remove(){
            if{ confirm("¿Esta seguro de elimanar el registro?")}
               return true;
            else
              return false;
        }
    </script>

 @endsection

