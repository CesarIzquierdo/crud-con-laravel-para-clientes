@extends('home')
{{--@extends('layouts.app') --}}

@section('content')

<div class="container">
    <div class="col-md-2"></div>
    <div class="col-md-8" >
        <br><br>
        <div style="background-color:#234;  padding: 10px; color: white;">
            <h3 >LISTA DE CLIENTES</h3>
        </div>
        
        <br>
        <div
            class="card text-white">
            <div class="card-body">
                <form class="form-inline my-2 my-lg-0 float-right">
                    <input type="text" name="buscarpor" placeholder="Buscar por nombre" value="{{ $buscarpor }}">
                    <input type="text" name="filtroTelefono" placeholder="Filtrar por teléfono" value="{{ $filtroTelefono }}">

                    <button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </div>
            
                 <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                    <strong>Nuevo cliente</strong>
                </button>
           
        
       
        <br>
        <div
        class="card text-white">
        <div class="card-body">
        <div
            class="table-responsive">
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">TELEFONO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr class="">
                            <td scope="row">{{$cliente->id}}</td>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->correo}}</td>
                            <td>
                                @if ($cliente->imagen)
                                    <img src="{{ $cliente->imagen }}"  style="max-width: 100px; max-height: 100px;">
                                @else
                                    Sin imagen
                                @endif
                            </td>
                            <td>
                                 <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$cliente->id}}">
                                    Editar
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$cliente->id}}">
                                    Eliminar
                                </button>
                            </td>
                        </tr>  
                        @include('cliente.info')
                    @endforeach           
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
        @include('cliente.create')
    </div>

    <div class="col-md-2"></div>

</div>


@endsection