@extends('layouts.app')

@section('title', 'Productos - Editar')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit_products.css') }}">

@endsection



@section('nav')
    @extends('layouts.navigation')
@endsection
@section('content')
    <main>
        <section class="bg-white rounded-lg">
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
                    <h2>Editar producto</h2>
                </div>
                <div>
                    <a href="{{ route('productos.create') }}" class="btn btn-dark">Volver</a>
                </div>
            </div>
            <div class="div-head w-100" style="height: 80% !important;">
                
                <div class="product w-100">
                    <table class="table table-bordered table-hover">
                        <thead class="w-100">
                            <tr class="w-100">
                                <th class="text-center">
                                    Nombre
                                </th>
                                <th class="text-center">
                                    Tipo de producto
                                </th>
                                <th class="text-center">
                                    Precio
                                </th>
                                <th class="text-center">
                                    Imagen
                                </th>
                                <th class="text-center" id="actions" colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="w-100">

                            <tr class="w-100">
                                <form action="{{ route('productos.edit', $productos->id) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <td>
                                        <input type="text" name='nombre' id="nombre" value="{{ $productos->nombre }}" placeholder='Nombre' class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" name='tipo_producto' id="tipo_producto" value="{{ $productos->tipo_producto }}" placeholder='Tipo de producto' class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="number" step=".01" name='precio' id="precio" value="{{ $productos->precio }}" placeholder='0.00' class="form-control" readonly/>
                                    </td>
                                    <td>
                                        <input type="file" name='img' id="image" class="form-control" accept="image/*" disabled/>
                                    </td>
                                    <td style="display:flex; justify-content: center;" id="td_editar">
                                        <button type="button" id="editar" class="btn btn-primary" onclick="showButtons()"><i class="fa-light fas fa-pen"></i></button>
                                    </td>
                                    <td id="td_guardar" style="display:flex; justify-content: center;" hidden>
                                        <button type="submit" id="guardar" class="btn btn-success" hidden ><i class="fa-regular fas fa-check"></i></button>
                                    </td>
                                    <td id="td_cancelar" hidden>
                                        <button type="reset" id="cancelar" class="btn btn-danger" hidden onclick="hideButtons()"><i class="fa-regular fas fa-xmark"></i></button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
    </main>
    <script>
        
        // Get a reference to our file input
            const fileInput = document.querySelector('input[type="file"]');
            
            // Create a new File objectn
            const myFile = new File(['<?php echo 'img/post/products$producto->img'?>'], '<?php echo $producto->img ?? old('$producto->img');  ?> ', {
                type: 'text/plain',
                lastModified: new Date(),
                
            });
        
            // Now let's create a DataTransfer to get a FileList
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(myFile);
            fileInput.files = dataTransfer.files;
    
    
    
        </script>
@endsection

@section('js')   
    <script src="/js/edit_productos.js"></script>
@endsection