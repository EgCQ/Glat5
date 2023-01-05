require('./bootstrap');

require('alpinejs');

require('./bootstrap.bundle');

require('./componentes');

Vue = require('vue');

var app = new Vue({
    el: '#app',
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
        agregar: function (productos) {
            let total = 0;
            this.productos.producto = productos.autor;
            this.productos.precio = productos.precio;
            this.carrito.push(this.productos);
            this.carrito.forEach(productos => {
                total = total + productos.precio
            });
            total = parseFloat(total).toFixed(2);
            this.total = total;
            console.log(this.total);
            this.postListProductos();
        },
        getListProductos: function () {
            var url = "http://reto.test/getProductos";
            //this.carrito = {};
            fetch(url)
                .then(function (response) {
                    return response.json();
                })
                .then((response) => {
                    this.listProductos = response;
                });
        },
        postListProductos: function () {
            var url = "http://reto.test/addproductosCarrito";
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
        getsCarrito: function () {
            var url = "http://reto.test/productosCarrito";
            //this.carrito = {};
            fetch(url)
                .then(function (response) {
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
    },
    created: function () {
        // `this` hace referencia a la instancia vm
        this.getsCarrito();
        this.getListProductos();
    }
})