@extends('layouts.app')

@section('title', 'Pedidos')

@section('css')
@endsection

@section('js')   
@endsection

@section('nav')
    @extends('layouts.navigation_usuario')
@endsection

@section('content')
<div class="w-100 h-100" id="pedidos">
    <div class="d-flex w-100" style="height: 100vh; justify-content: center; align-items: center; flex-wrap: wrap;">
        <aside class="w-75 bg-white" style="height: 75%; min-height: 75vh; overflow-y: auto;">
            <table class="w-100 table" style="height: 75%;">
                <thead class="bg-gray-50 text-center bg-secondary">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Portada
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nombre / Tipo de producto
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Precio
                        </th>
                        <th scope="col" class="">
                            <span class="">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody style="height: 75%" class="text-center">
                    <tr v-for="productos in carrito">
                        <td class="">
                            <div class="flex items-center justify-center">
                                <img class="w-28"  v-bind:src="'/img/post/' + productos.url_img" alt="">
                            </div>
                        </td>
                        <td class="">
                            <div>
                                <h6><b>Nombre</b></h6>
                            </div>
                            <div class="text-sm font-medium text-gray-900">
                                @{{ productos . nombre }}
                            </div>
                            <div>
                                <h6><b>Tipo de producto</b></h6>
                            </div>
                            <div class="text-sm text-gray-500">
                                @{{ productos . tipo_producto }}
                            </div>
                        </td>
                        <td class="">
                            <div class="d-flex h-100" style="align-items: center; justify-content:center;">
                                
                                $@{{ productos . precio }}
                            </div>
                        </td>
                        <td class="py-4 text-sm font-medium text-center whitespace-nowrap">
                            <button class="btn btn-danger" v-on:click="quitar(productos . id)">
                                Quitar
                            </button>
                        </td>
                    </tr>

                    <!-- More items... -->
                </tbody>
            </table>
        </aside>
    </div>
</div>
<script>
        
    var app = new Vue({
        el: '#pedidos',
        data: {
            listProductos: [],
            formData: {
                productos: ''
            },
            carrito: [],
            productos: {
                producto: '',
                precio: ''
            },
            total: 0
        },
        methods: {
            quitar: function(id) {
                let posicion = 0
                this.carrito.forEach(element => {
                    if (element.id == id) {
                        posicion = this.carrito.indexOf(element);
                        console.log(posicion);
                    }
                });
                this.carrito.splice(posicion, 1);
                this.postListProductos();
            },
            getProductosCarrito: function() {
                var url = "http://127.0.0.1:8000/getProductos";
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
                this.formData.productos = this.carrito
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
                        console.log(this.carrito);
                        this.carrito.forEach(productos => {
                            total = total + productos.precio
                        });
                        total = parseFloat(total).toFixed(2);
                        this.total = total;
                    });
            },
            reservar: function() {
                var url = "http://127.0.0.1:8000/newReserva";
                this.formData.productos = this.carrito
                axios
                    .post(url, this.formData)
                    .then((response) => {
                        if (response.data.telefono === null) {
                            alert("Debe completar los datos en su perfil para continuar");
                            window.location.href = "http://127.0.0.1:8000/perfil/" + response.data.id;
                        } else {
                            swal("Su orden ha sido realizada!");
                            window.location.href = "http://127.0.0.1:8000/home";
                            
                        }
                    })
                    .catch((error) => {
                        console.log("error: " + error);
                    });
            },
        },
        created: function() {
            // `this` hace referencia a la instancia vm
            this.getsCarrito();
        }
        
    });
    

</script>
@endsection