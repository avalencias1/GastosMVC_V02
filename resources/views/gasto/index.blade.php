@extends('home')

@section('content') 
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <br><br>
        <h3 class="text-center">Listado de Gastos</h3> 
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Nuevo
        </button>
        <div class="table-responsive">
            <br>
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gastos as $gasto)
                    <tr>
                        <td scope="row">{{$gasto->id_gst}}</td>
                        <td>{{$gasto->codigo_gst}}</td>
                        <td>{{$gasto->fecha_gst}}</td>
                        <td>[{{ $gasto->lugar_gst }}] - [{{ $gasto->descripcion_gst }}]</td>
                        <td>{{ $gasto->valorTotalConIva_gst }}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$gasto->id_gst}}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$gasto->id_gst}}">
                                Eliminar
                            </button>
                        </td>                       
                    </tr>
                    @include('gasto.info')
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
    @include('gasto.create')    
    <br>
    <div class="col-sm-2"></div>
@endsection

