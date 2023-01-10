@extends('layouts.app')

@section('title', 'Home')

@section('css')
<style>
#lista div.select {
    transform: scale(1.05);
    background-color: rgb(43, 41, 41) !important;
    color: white !important;
}
#lista div{
    cursor: pointer;
}

</style>
@endsection


@section('js')   
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script src="js/drag_drop.js"></script>
@endsection

@section('nav')
    @extends('layouts.navigation_usuario')
@endsection

@section('content')
    <div class="w-100 h-100" id="app">
        <div class="d-flex w-100 h-100" style="justify-content: center; align-items: center; flex-wrap: wrap;">
            <aside class="bg-white" style="height: fit-content; min-height: 75vh; width: 70%;">
                <div class="d-flex" style="flex-wrap: wrap; justify-content: space-between;">
                    <div class="">
                        <h2 class="my-2 mx-4">Productos</h2>
                    </div>
                    <form action="{{ route('home') }}" class=" w-75" method="GET">
                        @csrf
                        <div class="d-flex" style="flex-wrap: wrap">
                            
                                <div class="my-2" style="width: 90%;">
                                    <input type="text" name="search" id="search" class="form-control w-100 mx-4" style="" placeholder="Buscar">
                                </div>
                                <div class="my-2 d-flex" style="justify-content: center; width: 10%;">
                                    <button type="submit" class="btn btn-primary text-white h-100" tooltip="Buscar">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>

                        </div>
                    </form>


                </div>
                <div class="d-flex text-black" id="lista" style="flex-wrap: wrap; justify-content: space-evenly;">

                            <div class="d-flex mt-4 mx-2" v-for="productos in listProductos" style="flex-wrap: wrap; background-color: rgb(163, 157, 157); border-radius: 15px;">
                                <div class="w-100">
                                    <div >
                                        <div>
                                            <h6 class="my-2 mx-4">
                                                @{{ productos.nombre }}
                                            </h6>
                                        </div>
                                        <div>
                                            <h6 class="my-2 mx-4">
                                                @{{ productos.tipo_producto }}
                                            </h6>
                                        </div>
                                        <div>
                                            <h6 class="my-2 mx-4" id="precio">
                                                
                                                <b>Precio: </b>$@{{ productos.precio }}
                                            </h6>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="w-100 d-flex my-2 img" style="justify-content: center; ">
                                            <img v-bind:src="'/img/post/' + productos.img" class="bg-white img" style="width: 75%; height: 20vh;border-radius: 25px;" alt="">
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="button" id="agregar"
                                        class="px-4 mb-2 m-auto text-center btn btn-primary text-white"
                                        v-on:click="agregar(productos)" tooltip="Agregar al carrito">
                                            <i class="fa-duotone fas fa-cart-plus"></i>
                                        </button>
                                    </div>

                                </div>
                                
                            </div>
                        
                </div>
                
            </aside>
            
            <article class="bg-secondary h-75" style="" id="carrito">
                <div class="text-white d-flex" style="width:95%; height: fit-content; align-items:center">
                    <h2 class="my-2 mx-4"><b>Tu carrito</b></h2>
                    <a href="{{ route('reserva') }}" class="btn btn-info mx-4 my-2" tooltip="Ver mis productos">
                        <i class="fa-duotone fas fa-cart-shopping" style="color: white"></i>
                    </a>
                </div>
                <div class="bg-white mx-4" style="width:90%; height: 75%; overflow-y: auto; border-radius: 15px;">
                    <div class=" px-4">
                        <div class="d-flex bg-white pt-2 pb-2" style="align-items: center; justify-content:space-between; position: sticky; top: 0px;">
                            <div>
                                <b>
                                    Producto
                                </b>
                                
                            </div>
                            <div>
                                <b>
                                    Precio
                                </b>
                            </div>
                        </div>
                        <div class="d-flex" style="justify-content: space-between;" v-for="producto in carrito">
                            <div style="padding-right: 2rem">
                                @{{ producto . nombre }}
                            </div>
                            <div style="padding-left: 2rem">
                                $ @{{ producto . precio }}
                            </div>
                        </div>
                    </div>
                    <div class="pb-2 pt-2 px-4 bg-white" style="position:sticky; bottom: 0px; padding-left: 0.5rem;">
                        <span><b>Total</b></span>
                        <span class="">$ @{{ total }}</span>
                    </div>                
                </div>
<!--

                    <div class="bg-white d-flex" style="width:95%; height: fit-content; margin-left: auto; margin-right: auto; flex-wrap: wrap; justify-content: space-between;">
                        <p class="my-2 mx-4">Nombre...</p>
                        <p class="my-2 mx-4">$ Precio</p>                    
                    </div>
                    <div class="product w-100" style="background-color:burlywood; height: 100% !important;">
                        <h3>
                            No hay resultados
    
                        </h3>
                    </div>-->
            </article>
        </div>
    </div>

    <script>
        
        var app = new Vue({
            el: '#app',
            data: {
                listProductos: [
                    
                ],
                formData: {
                    productos: ''
                },
                carrito: [],
                productos: {},
                total: 0
            },
            methods: {
                agregar: function(productos) {
                    let total = 0;
                    this.carrito.push(productos);
                    this.carrito.forEach(productos => {
                        total = total + productos.precio;
                    });
                    total = parseFloat(total).toFixed(2);
                    this.total = total;
                    console.log(this.total);
                    //console.log(productos.precio);
                    //console.log(this.carrito);
                    this.postListProductos();
                },
                getListProductos: function(productos) {
                    var url = "http://127.0.0.1:8000/productos_view";
                    //this.carrito = {};
                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then((response) => {
                            this.listProductos = response;
                        });
                },
                postListProductos: function() {
                    var url = "http://127.0.0.1:8000/addproductosCarrito";
                    this.formData.productos = this.carrito;
                    axios
                        .post(url, this.formData)
                        .then((response) => {
                            console.log(response.data);
                        })
                        .catch((error) => {
                            console.log("error: " + error);
                        });
                },
                getsCarrito: function() {
                    var url = "http://127.0.0.1:8000/productosCarrito";
                    //this.carrito = {};
                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then((response) => {
                            let total = 0;
                            response.forEach(element => {
                                this.carrito.push(element);
                            });
                            //console.log(this.carrito);
                            this.carrito.forEach(productos => {
                                total = total + productos.precio
                            });
                            total = parseFloat(total).toFixed(2);
                            this.total = total;
                        });
                },
            },
            created: function() {
                // `this` hace referencia a la instancia vm
                this.getsCarrito();

                this.getListProductos();
            },
        });


    </script>


@endsection