<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    
</head>
<body>
<main>
@include('navbar.nav')
    <br><br><br><br>
    <center>

        <section>
            <div class="h2">
                <h2>Registro Gelato</h2>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="foto_perfil">Foto de perfil:
                        <br>
                        <input type="file" name="foto_perfil" id="foto_perfil" accept="image/*">
                    </label>
                </div>
                <div>
                    <label for="nombre">Nombres
                        <br>
                        <input type="text" id="nombre" name="nombre" placeholder="Ej. Juanito Alcachofa">
                    </label>
                </div>
                <div>
                    <label for="color">Color
                    <br>

                        <input type="text" id="color" name="color" placeholder="Piense en un color">
                    </label>
                </div>
                <div>
                    <label for="lema">Frase
                        <br>
                        <input type="text" id="lema" name="lema" placeholder="Lema distintivo">
                    </label>
                </div>
                <div>
                    <button type="submit">Solicitar</button>
                </div>
                
            </form>
        </section>
        </center>
        <br><br><br><br><br>
    </main>
</body>
</html>