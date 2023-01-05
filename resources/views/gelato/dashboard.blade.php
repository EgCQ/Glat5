

<x-app-layout>
    @include('layouts.navigation_usuario')
    <div id="app">
        <div class="h-screen pt-20 pb-3">
            <div class="container min-w grid h-auto grid-cols-5 pb-3 bg-white rounded-md">
                <div class="col-span-4 bg-transparent inflex">
                    <div class="grid grid-cols-3">
                        <div class="pt-3" v-for="productos in listProductos">
                            
                            <div class="mx-auto overflow-hidden text-center bg-white border-t-4 border-blue-500 shadow rounded-xl w-72 dark:bg-gray-800">
                                <div style="display: flex; justify-content: center;height:280px;">
                                    <img src="img/post/@{{productos->url_img}}" style="width:180px; padding-top: 1rem;"/>
                                </div>
                                <div class="pt-2">
                                    @{{ productos.titulo }}
                                </div>
                                <div class="flex justify-between px-2">
                                    <span class="text-sm text-muted">Autor: @{{ productos . autor }}</span>
                                </div>
                                <div class="flex justify-between px-2">
                                    <span class="text-sm text-muted">Precio: $ @{{ productos . precio }}</span>
                                </div>
                                <div class="flex justify-between px-2 pt-2 pb-4 ">
                                    <button type="button" id="agregar"
                                        class="px-4 py-2 m-auto text-sm font-semibold text-center text-white transition duration-200 ease-in bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2"
                                        v-on:click="agregar(productos)">
                                        Agregar al carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-3">
                    <div
                        class="fixed flex flex-wrap content-between w-64 overflow-hidden border-t-4 border-b-2 border-l-2 border-r-2 border-blue-500 rounded-lg h-96">
                        <div class="w-full py-2 text-center bg-blue-100 border-b-2 border-gray-400">
                            <span>carrito de compras</span>
                        </div>
                        <div class="w-full px-3 overflow-auto text-sm h-2/3">
                            <div v-for="productos in carrito" class="flex justify-between">
                                <span>@{{ productos . titulo }}</span>
                                <span class="">@{{ productos . precio }}</span>
                            </div>
                        </div>
                        <div class="flex justify-between w-full px-3 py-2 text-sm">
                            <span>Total</span>
                            <span class="">$ @{{ total }}</span>
                        </div>
                        <div class="w-full px-3 pb-2 text-sm">
                            <a href="{{ route('reserva') }}"
                                class="block px-4 py-1 text-sm font-semibold text-center text-white transition duration-200 ease-in bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2">ver carrito</a>
                        </div>
                    </div>
                </div>
            </div>
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
                        total = total + productos.precio
                    });
                    total = parseFloat(total).toFixed(2);
                    this.total = total;
                    //console.log(this.total);
                    //console.log(productos);
                    //console.log(this.carrito);
                    this.postListProductos();
                },
                getListProductos: function(productos) {
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
        })

    </script>
</x-app-layout>
