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
                        <th>FECHA</th>
                        <th>DIRECCION</th>
                        <th>Ciudad</th>
                        <th>Acciones</th>
                        <th>Observaciones</th>
                        <th>Causal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    |   <tr>
                        <td>{{ $order['id'] }}</td>
                        <td>{{ $order['legalization_date'] }}</td>
                        <td>{{ $order['address'] }}</td>
                        <td>{{ $order['city'] }}</td>
                        <td>{{ optional ($order->observation)->description ?? '' }}</td>
                        <td>{{ optional ($order->causal)->description ?? '' }}</td>
                        <th></th>
                            <a href="{{ route('order.edit', $order['id']) }}" title="editar" class="btn btn-info btn-circle btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="{{ route('order.destroy', $order['id']) }}" title="eliminar" class="btn btn-danger btn-circle btn-sm" onclick="return remove()">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                        </tr>
                    @endforeach
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

