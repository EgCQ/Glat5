@extends('layouts.app')

@section('title', 'Forms')
<style>
    .scal{
        animation: scaled 0.15s;
        transition all 0.3s;
    }
    .scalnt{
        animation: scalednt 0.6s;
        transition all 0.3s;
    }
    @keyframes scaled {
        0%{
            scale: 0;
        }

        100%{
            scale: 1;
        }
    }
    @keyframes scalednt {
        0%{
            scale: 1;
        }

        100%{
            scale: 0;
        }
    }
</style>
@section('nav')
    @extends('layouts.navigation_usuario')
@endsection

@section('content')
    <main class="w-100 d-flex justify-content-around " id="app">
        <section class="d-flex flex-column m-2 align-items-center" style="height:75vh !important">
            <div class="bg-success p-2 d-none scal align-items-center justify-content-around my-2" style="border-radius:7px;" ref="modal_success" id="modal_success">
                <strong id="label" class="text-white">Registro exitoso</strong>
                <button class="btn btn-danger" role="button" type="button" ref="btn_close" id="btn_close">x</button>
            </div>

            <form id="form" ref="form" enctype="multipart/form-data" class="d-flex flex-column border border-dark p-2 bg-light ">
                <div>
                    <h5 class="text-danger m-0">Formatos permitidos: CSV UTF-8 *</h5>
                    <div>
                        <p class="m-0">Foto de referencia:</p>
                        <img src="img/example_register.jpg" alt="img_example">
                    </div>
                </div>
                <h3>Formulario importar Excel 1</h3>
                @csrf
                <input type="file" name="archivos" ref="archivos" class="my-1 form-control @error('archivos') is-invalid @enderror" id="archivos">
                @error('archivos')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
                <button type="button" v-on:click="agregar" class="btn btn-success my-1">Enviar</button>
            </form>
            <form action="{{route('file_submit2')}}" method="post" enctype="multipart/form-data" class="d-flex flex-column border border-dark p-2 bg-light ">
                <div>
                    <h5 class="text-danger m-0">Formatos permitidos: CSV UTF-8 *</h5>
                    <div>
                        <p class="m-0">Foto de referencia:</p>
                        <img src="img/example_register.jpg" alt="img_example">
                    </div>
                </div>
                <h3>Formulario importar Excel 2</h3>
                @csrf
                <input type="file" name="archivos2" class="my-1 form-control @error('archivos2') is-invalid @enderror" id="archivos2">
                @error('archivos2')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                @enderror
                <button type="submit" class="btn btn-success my-1">Enviar</button>
            </form>
        </section>
        <aside class="d-flex align-items-center" style="height:75vh !important">
            <table class="table" id="tableview" >
                <thead class="table-dark">
                    <tr>
                        <th>
                            Nombres:
                        </th>
                        <th>
                            Descripcion:
                        </th>
                    </tr>

                </thead>
                <tbody class="table-light" >
                    {{-- <tr v-if="empty" class="w-100 d-grid">
                        <td class="col w-100">
                            Sin resultados
                        </td>
                    </tr> --}}
                    <tr v-for="user in listUsers" >
                        <td>
                            @{{ user.nombre }}
                        </td>
                        <td>
                            @{{ user.descripcion }}
                        </td>
                    </tr>
                    {{-- @empty($form)
                        <td>Sin resultados</td>
                    @else
                        @foreach($form as $forms)
                            <tr>
                                <td>
                                    {{$forms->nombre}}
                                </td>

                                <td>
                                    {{$forms->descripcion}}

                                </td>
                            </tr>

                        @endforeach
                    @endempty --}}

                </tbody>
            </table>
        </aside>
    </main>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                listUsers: [

                ],
                formData: {
                },
                // empty: true,
            },
            methods: {
                showDiv: function(){
                    modal_success.classList.remove("scalnt"); modal_success.classList.add("scal");
                    modal_success.classList.remove("d-none"); modal_success.classList.add("d-flex");
                    archivos.value="";
                    setTimeout(() => {
                        modal_success.classList.remove("scal"); modal_success.classList.add("scalnt");
                    }, 5000);
                    setTimeout(() => {
                        modal_success.classList.remove("d-flex"); modal_success.classList.add("d-none");
                    }, 5500);
                },
                agregar: function() {
                    this.postRecords();
                    // this.empty = false;
                    this.getListUsers();
                },
                postRecords: function() {
                    var url = "http://127.0.0.1:8000/submit_forms";
                    const form = this.$refs.form;
                    const archivos = this.$refs.archivos;
                    const modal_success = this.$refs.modal_success;
                    const btn_close = this.$refs.btn_close;

                    const formData = new FormData(form);
                    formData.append('archivos', archivos);
                    console.log([...formData][1][1].name);
                    let other_form_data = [...formData][1][1].name;
                    if (!(other_form_data)) {
                        archivos.classList.add("is-invalid");
                    } else {
                        archivos.classList.remove("is-invalid");
                        axios.post(url, formData)
                            .then((response) => {
                                console.log("Response: " + response);})
                            .catch((error) => {
                                console.log("error: " + error);
                            });
                        this.showDiv();
                        btn_close.addEventListener("click", function(){
                            modal_success.classList.remove("scal"); modal_success.classList.add("scalnt");
                            setTimeout(() => {
                                modal_success.classList.remove("d-flex"); modal_success.classList.add("d-none");
                            }, 500);
                        });

                    }

                    // this.getListUsers();

                },
                getListUsers: function() {
                    var url = "http://127.0.0.1:8000/get_records";
                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then((response) => {
                            this.listUsers = response;

                        })
                        .catch((error) => {
                            console.log("error: " + error);

                        });

                },
            },
            created: function() {
                // `this` hace referencia a la instancia vm
                this.getListUsers();
            },
        });
        const form = document.getElementById("form"), archivos2 = document.getElementById("archivos");
        form.addEventListener("submit", async function(e){
            e.preventDefault();
            console.log("ola mundo enviado");
            // const formData = new FormData(form);
            // formData.append('archivos', document.getElementById("archivos"));
            // console.log([...formData]);
            // var url = "http://127.0.0.1:8000/submit_forms";
            // await axios.post(url, formData)
            //     .then((response) => {
            //         console.log("Response: " + response);})
            //     .catch((error) => {
            //         console.log("error: " + error);
            //     });
        archivos2.reset();
        });
        archivos2.addEventListener("input", function(){
            if (archivos2.className.includes("is-invalid")) {
                archivos2.classList.remove("is-invalid");
            }
        });
    </script>
@endsection
