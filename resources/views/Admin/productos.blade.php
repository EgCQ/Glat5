@extends('layouts.app')

@section('title', 'Aqui estan tus productos')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">

@endsection

@section('js')   
    <script src="js/dynamicTable/jquery.dynamicTable-1.0.0.js"></script>
    <script src="js/productos.js"></script>

@endsection

@section('nav')
    @extends('layouts.navigation')
@endsection

@section('content')
<main>
    <section class="bg-white rounded-lg ">
        @if (session('success'))

            <div class="div_modal" style="height: 0px;">
                <div class="alert alert-success alert-block modal_success">
                    <button type="button" class="btn btn-danger close" data-dismiss="alert">×</button>
                    <strong style="width: 100%; display: flex; justify-content: center;"> {{ session('success') }} </strong>
                </div>
            </div>
        @endif
        <div class="div-head w-100" style="">
            <div>
                <h2>Tus productos</h2>
            </div>
            <div>
                <button type="button" class="btn btn-primary" onclick="showWindow()">Registrar producto</button>
            </div>
        </div>
        <div class="div-head w-100" style="height: 80% !important;">
            
            @if (!$productos->isEmpty())
            <div class="product w-100">
                <table class="table table-bordered table-hover contenedor">
                    <thead class="w-100">
                        <tr class="w-100">
                            <th class="text-center">
                                Codigo
                            </th>
                            <th class="text-center">
                                Nombre
                            </th>
                            <th class="text-center">
                                Tipo de producto
                            </th>
                            <th class="text-center">
                                Precio
                            </th>
                            <th class="text-center" colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="w-100 contenedor-lista">
                            @csrf

                            @foreach ($productos as $producto)

                                <tr class="w-100">
                                    <td>
                                        <input type="text" name='id' id="id" value="{{ $producto->id }}" placeholder='Nombre' class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" name='nombre' id="nombre" value="{{ $producto->nombre }}" placeholder='Nombre' class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" name='tipo_producto' id="tipo_producto" value="{{ $producto->tipo_producto }}" placeholder='Tipo de producto' class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="number" step=".01" name='precio' id="precio" data="$" value="{{ $producto->precio }}" placeholder='$ 0.00' class="form-control" readonly/>
                                    </td>
                                    <td style="display:flex; justify-content: center;">
                                        <a href="{{ route('productos.view', ['id' => $producto->id]) }}" id="editar" class="btn btn-info"><i class="fa-regular fas fa-circle-info"></i></a>
                                    </td>
                                    <td class="menu">
                                        <form method="POST" action="{{ route('productos.deleted', ['id' => $producto->id]) }}">
                                            @csrf

                                            <button type="submit" id="eliminar" class="btn btn-danger">
                                                <span>
                                                    <i class="fa-light fas fa-square-minus" aria-hidden="true"></i>
                                                </span>
                                                <span>
                                                    <i class="fa-regular fas fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        
                                        </form>

                                    </td>
                                </tr>

                            @endforeach

                    </tbody>
                </table>
            </div>

            @else
                <div class="product w-100" style="background-color:burlywood; height: 100% !important;">
                    <h3>
                        No hay resultados

                    </h3>
                </div>
            @endif
        </div>

        
        <table id="myTable" class="table bg-white table-white"></table>

    </section>
    <form method="POST" enctype="multipart/form-data" action="{{ route('productos.saved') }}">
        @csrf
        <div class="container bg-dark modal-window" hidden id="modal_window">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead class="thead">
                            <tr >
                                <th class="text-center text-white">
                                    Nombre
                                </th>
                                <th class="text-center text-white">
                                    Tipo de producto
                                </th>
                                <th class="text-center text-white">
                                    Precio
                                </th>
                                <th class="text-center text-white">
                                    Imagen
                                </th>
                                <th class="text-center text-white">
                                    <a id="add_row" href="javascript:void(0)" class="btn btn-primary addRow"><i class="fa-regular fa-square-plus"></i></a>
                                </th>
                            </tr>
                        </thead>
                            <tbody class="tbody">
                                    <tr>
                                        <td>
                                        <input type="text" name='nombre[]' placeholder='Nombre' class="form-control"/>
                                        </td>
                                        <td>
                                        <input type="text" name='tipo_producto[]' placeholder='Tipo de producto' class="form-control"/>
                                        </td>
                                        <td>
                                        <input type="number" step=".01" name='precio[]' placeholder='0.00' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="file" name='img[]' class="form-control" accept="image/*"/>
                                        </td>
                                        <td class="text-center text-white">
                                            <a id='delete_row' href="javascript:void(0)" class="btn btn-danger deleteRow">
                                                <i class="fa-light fas fa-square-minus" aria-hidden="true"></i>

                                            </a>
                                        </td>
                                    </tr>
                                    <div style="margin-left: 1rem; margin-bottom: 1rem;">
                                        <button type="submit" class="btn btn-success">Enviar</button>
                                        <button type="reset" class="btn btn-danger" onclick="hideWindow()">Cerrar</button>
                                    </div>
                            </tbody>

                    </table>
                </div>
            </div>

        </div>
    </form>
</main>
@endsection