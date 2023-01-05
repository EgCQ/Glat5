<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .div-divs{
            height: 100vh;
            width: 100%;
            display: inline-flex;
            align-content: center;
            flex-wrap: wrap;
            justify-content: center;
            min-width: 350px;

        }
        .div-divs div{  
            margin: 1rem;
        }
        .div-buttons a{
            width: 45%;
            font-size: 30px;
        }
        @media screen and (max-width: 500px){
            .div-divs .div-buttons a{
                display: flex;
                flex-wrap: wrap;
                width: 100%;
                margin-bottom: 1rem !important;

            }
            
        }
        @media screen and (max-height: 150px){
            .div-divs .div-h3{
                margin-top: 10rem !important;

            } 
        }
        @media screen and (max-height: 180px){
            .div-divs .div-h3{
                margin-top: 5rem ;

            } 
        }
        @media screen and (max-height: 250px){
            .div-divs .div-h3{
                margin-top: 3rem;

            } 
        }
    </style>
</head>
<body>
    <div class="div-divs">
        <div class="div-h3" style="display: flex; align-items: center;">
            <h1>Ha ocurrido un error...</h1>
        </div>
        <div class="div-buttons">
            <a href="{{ route('home') }}" class="btn btn-success">Volver al dashboard</a>
            <a href="{{ route('/') }}" class="btn btn-danger">Ir a la pagina principal</a>
        </div>
    </div>


</body>
</html>