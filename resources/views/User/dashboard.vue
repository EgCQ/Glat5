<template>
    <div class="w-100 h-100" id="app">
        <div class="d-flex w-100 h-100" style="justify-content: center; align-items: center; flex-wrap: wrap;">
            <aside class="w-75 bg-white" style="height: fit-content; min-height: 75vh;">
                <div class="d-flex" style="flex-wrap: wrap; justify-content: space-between;">
                    <div class="">
                        <h2 class="my-2 mx-4">Productos</h2>
                    </div>
                    <form action="{{ route('home') }}" class=" w-75" method="GET">
                        @csrf
                        <div class="d-flex" style="flex-wrap: wrap">
                            
                                <div class="my-2" style="width: 90%;">
                                    <input type="text" name="search" id="search"  class="form-control w-100 mx-4" style="" placeholder="Buscar">
                                </div>
                                <div class="my-2 d-flex" style="justify-content: center; width: 10%;">
                                    <button type="submit" class="btn btn-primary text-white h-100">
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
                                        <div class="w-100 d-flex my-4 img" style="justify-content: center; ">
                                            <img v-bind:src="'/img/post/products/' + productos.img" class="bg-white img" style="width: 75%; height: 20vh;border-radius: 25px;" alt="">
                                        </div>
                                    </div>
                                    <button type="button" id="agregar"
                                    class="px-4 py-2 m-auto text-center btn btn-primary text-white"
                                    v-on:click="agregar(productos)" >
                                        Agregar al carrito
                                    </button>
                                </div>
                                
                            </div>
                        
                </div>
                
            </aside>
            
            <article class=" h-75 bg-secondary" id="carrito">
                <div class="text-white" style="width:95%; height: fit-content; ">
                    <h1 class="my-4 mx-4">Seleccionados</h1>
                </div>
                <div class="bg-white d-flex" style="width:95%; height: fit-content; margin-left: auto; margin-right: auto; flex-wrap: wrap; justify-content: space-between;">
                    <div class="w-full px-3 overflow-auto text-sm h-2/3">
                        <div v-for="producto in carrito" class="flex justify-between">
                            <span>@{{ producto . nombre }}</span>
                            <span class="">@{{ producto . precio }}</span>
                        </div>
                    </div>
                    <div class="flex justify-between w-full px-3 py-2 text-sm">
                        <span>Total</span>
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
</template>

<script>
    import axios from 'axios'
    export default{
        name: "DashboardCrud",
        data() {
            return {
                listProductos: [
        
                ],
                formData: {
                    productos: '',
                },
                carrito: [

                ],
                productos: {

                },
                total: 0,
            }
        },
        methods: {
            agregar(productos) {
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
            getListProductos(productos) {
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
            postListProductos() {
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
            getsCarrito() {
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
        }
    }
</script>
