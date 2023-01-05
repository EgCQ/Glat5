<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar - Noticia</title>
    <style>
        main{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 1400px;
            margin-right: auto;
            margin-left: auto;
        }
        main section{
            margin-top: 5rem;
            width: 90%;
            height: fit-content;
            display: flex;
            flex-wrap: wrap;
            align-content: flex-start;
            max-height: 1400px;

        }

        .div-head{
            display: inline-flex;
            flex-wrap: wrap;
            height: fit-content !important;
        }
        .div-head div{
            margin: 1rem;
        }
        .div-head div .product{
            margin: 1rem;
            width: 100% !important;
        }
        .product input, textarea{
        }
        .modal-window{
            z-index: 1;
            border-radius: 25px;
            padding: 1rem;
            padding-top: 1.5rem;
            background-color: red;
            position: absolute;
            top: 50%;
            left: 50%;
            animation: show 0.3s;
            transform: translate(-50%, -50%);
        }
        @keyframes show {
            0%{
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(0.1);
            }
            100%{
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(1);
            }

        }
        @keyframes hide {
            from{
                visibility: visible;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(1);

            }

            to{
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(0);
            }
        }

        .modal_success{
            top: 50%;
            left: 50%;
            transform: translate(125%, 250%);
            z-index: 1;
            width: 150%;
            display: flex;
            align-items: center;
            animation: transform 0.3s;
        }
        @keyframes transform {
            0%{
                top: 50%;
                left: 50%;
                transform: translate(125%, 250%) scale(0.1);
            }

            0%{
                top: 50%;
                left: 50%;
                transform: translate(125%, 250%) scale(0.5);
            }

            100%{
                top: 50%;
                left: 50%;
                transform: translate(125%, 250%) scale(1);
            }
        }
        .divtextarea{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-top: 1rem;
            margin-left: auto;
            margin-right: auto;
        }

        .max_caracteres{
            width: 95%;            
            height: 5vh;
            display: flex;
            justify-content: space-between;
            margin-right: auto;
            margin-left: auto;
        }
@keyframes shake {
    25%{
        transform: translateX(4px);
    }
    50%{
        transform: translateX(-4px);
    }
    75%{
        transform: translateX(4px);
    }
}
        </style>
</head>
<body>
    @include('layouts.navigation')
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
                    <h2>Editar Noticia</h2>
                </div>
                <div>
                    <a href="{{ route('home') }}" class="btn btn-dark">Volver</a>
                </div>
            </div>
            <div class="div-head w-100" style="height: 80% !important;">
                
                <div class="product w-100">
                    <form action="{{ route('edit_notice', $notice->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="d-flex" style="align-content: center;">
                                <label for="titulo" style="margin-top: auto; margin-bottom:auto; margin-right: 2.4rem;"><b>Titulo</b></label>
                                <input type="text" name='titulo' id="titulo" value="{{ $notice->titulo }}" placeholder='Nombre' class="form-control" readonly/>
                            </div>
                            <div class="d-flex" style="align-content: center;">
                                <label for="titulo" style="margin-top: auto; margin-bottom:auto; margin-right: 1rem;"><b>Mensaje</b></label>

                                <textarea  name="mensaje" class="form-control" id="mensaje" placeholder="Escribenos un mensaje" maxlength="250" readonly>{{ $notice->mensaje ?? old('mensaje')}}</textarea>
                                    
                            </div>
                            <div class="max_caracteres">
                                <span><b>Máximo 250 caracteres *</b></span>
                                <span id="resultado"></span>
                            </div>
                            <div class="d-flex">
                                <input type="file" name="archivos" id="uploadImage1" onchange="previewImage(1);" class="form-control h-25" style="align-self: center;" disabled>
                                <br>

                                <img src="/img/post/{{ $notice->archivos}}" id="uploadPreview1" style="width: 25%; height: 25vh;">
                            </div>
                            <div class="d-flex" style="justify-content: center;">
                                <button type="button" id="editar" class="btn btn-primary" onclick="showButtons()"><i class="fa-light fas fa-pen"></i></button>
                                <button type="submit" id="guardar" class="btn btn-success mx-2" hidden ><i class="fa-regular fas fa-check"></i></button>
                                <button type="reset" id="cancelar" class="btn btn-danger mx-2" hidden onclick="hideButtons()"><i class="fa-regular fas fa-xmark"></i></button>
    
                            </div>
                        </form>
                </div>
            </div>
        </section>
        
    </main>
<script>
        function showButtons() {
        document.getElementById('editar').hidden = true;
        document.getElementById('cancelar').hidden = false;
        document.getElementById('guardar').hidden = false;

        document.getElementById('titulo').readOnly = false;
        document.getElementById('mensaje').readOnly = false;
        document.getElementById('uploadImage1').disabled = false;


    }
    function hideButtons(){
        document.getElementById('editar').hidden = false;
        document.getElementById('cancelar').hidden = true;
        document.getElementById('guardar').hidden = true;

        document.getElementById('titulo').readOnly = true;
        document.getElementById('mensaje').readOnly = true;
        document.getElementById('uploadImage1').disabled = true;
    }
    var mensaje = document.getElementById('mensaje');
    var resultado = document.getElementById("resultado");
            var limit = 250;
            resultado.textContent = 0 + " / " + limit;
            
            mensaje.addEventListener("input", function () {
                var textLength = mensaje.value.length;
                resultado.textContent = textLength + " / " + limit;
                if (textLength >= limit) {
                    mensaje.style.borderTop = "1px solid red";
                    mensaje.style.borderBottom = "1px solid red";
                    mensaje.style.borderRight = "1px solid red";
                    mensaje.style.borderLeft = "1px solid red";
                    mensaje.style.animation = "shake 300ms";

                    mensaje.style.paddingLeft = "0.5rem";

                    mensaje.style.outlineColor = "red";
                    resultado.style.color = "red";
                }
                else{
                    mensaje.style.outlineColor = "black";
                    mensaje.style.borderTop = "none";
                    mensaje.style.borderBottom = "none";
                    mensaje.style.borderRight = "none";
                    mensaje.style.borderLeft = "none";
                    resultado.style.color = "black";
                    mensaje.style.paddingLeft = "0.5rem";
                    mensaje.style.animation = "none";

                }
            });

            
        // Get a reference to our file input
        const fileInput = document.querySelector('input[type="file"]');
        
        // Create a new File objectn
        const myFile = new File(['<?php echo 'img/post/$notice->archivos'?>'], '<?php echo $notice->archivos ?? old('$otice->archivos');  ?> ', {
            type: 'text/plain',
            lastModified: new Date(),
            
        });
    
        // Now let's create a DataTransfer to get a FileList
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(myFile);
        fileInput.files = dataTransfer.files;

        function previewImage(nb) {        
            var reader = new FileReader();         
            reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
            reader.onload = function (e) {             
                document.getElementById('uploadPreview'+nb).src = e.target.result;         
            };     
        }
</script>

</body>
</html>