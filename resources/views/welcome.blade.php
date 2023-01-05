<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <title>Gelato Five</title>        
    </head>
    <body class="antialiased">

        @include('navbar.nav')
        <div class="welcome" id="welcome">

                <input type="button" class="welcome-btn rt" id="rt" value="&larr;">
<!--                <input type="button" class="welcome-btn" id="ad" value="&#8594;">!-->

                <div class="div-btn-circulo">
                    <div class="div-btn-circulo-2" id="div-btn-circulo-2">

                    </div>
                </div>
                <div class="slider" id="slider">

                    <div class="welcome-div activer">
                        <img src="img/img1.jpg" alt="" class="imgs">
                        <div class="div-h1">
                            <h1>Bienvenido a Gelato</h1>
                        </div>
                        
                    </div>
                    <div class="welcome-div">
                        <img src="img/img2.jpg" alt="" class="imgs">

                        <h1>
                            Conoce acerca de las<br>novedades de esta semana
                        </h1>
                    </div>
                    <div class="welcome-div">
                        <img src="img/img3.jpg" alt="" class="imgs">

                        <h1>
                            Deseas formar parte de nuestro<br> equipo, inscribete aquí!
                        </h1>
                    </div>

                </div>
                
        </div>

    </body>
    <script>
    const slider = document.querySelector("#slider"); 
    const dbc2 = document.querySelector("#div-btn-circulo-2"); 

    let sliderSection = document.querySelectorAll(".welcome-div");
    let sliderSectionLast = sliderSection[sliderSection.length - 1];
    const btn_rt = document.querySelector("#rt");


    function create_button_add() {
        var welcome = document.getElementById("welcome");
        var ad = document.createElement("input");
        ad.setAttribute("type", "button");
        ad.setAttribute("id", "ad");
        ad.classList.add("ad");

        ad.classList.add("welcome-btn");
        ad.value = "→";
        
        welcome.appendChild(ad);
    }

    create_button_add();
    const btn_ad = document.querySelector("#ad");

    slider.insertAdjacentElement('afterbegin', sliderSectionLast);
    btn_rt.addEventListener("click", retroceder);
    btn_ad.addEventListener("click", adelantar);


    function retroceder() {
        let sliderSection = document.querySelectorAll(".welcome-div");
        let sliderSectionLast = sliderSection[sliderSection.length - 1];
        let sliderSections = slider.children;

        var slide_right = slider.style.marginLeft = "0%";
        slider.style.transition = "margin-left 0.3s";

        sliderSections[2].classList.remove("activer");
        sliderSections[0].classList.remove("activer");
        setTimeout(function(){
            slider.style.transition = "none";
            slider.insertAdjacentElement('afterbegin', sliderSectionLast);
            slider.style.marginLeft = "-100%";
            sliderSections[1].classList.add("activer");
            sliderSections[2].classList.remove("activer");
            sliderSections[0].classList.remove("activer");

        }, 300);    
    }
    function adelantar() {
        let sliderSectionFirst = document.querySelectorAll(".welcome-div")[0];
        let sliderSections = slider.children;
        var sliderSection2 = document.querySelector("#slider");
        var circles = document.getElementById("btn-circle");
        var slide_left = slider.style.marginLeft = "-200%";
        slider.style.transition = "margin-left 0.3s";
        sliderSections[0].classList.remove("activer");
        sliderSections[2].classList.remove("activer");
        for (let i = 0; i < sliderSection.length; i++) {
            console.log(sliderSection[i]);
        }

            
        setTimeout(function(){
            slider.style.transition = "none";
            slider.insertAdjacentElement('beforeend', sliderSectionFirst);
            slider.style.marginLeft = "-100%";
            sliderSections[1].classList.add("activer");
            sliderSections[0].classList.remove("activer");

        }, 300);
        

    }
    setInterval(() => {
        adelantar()
    }, 5000);
    function create_button_circle() {
        var div_btn_circulo_2 = document.getElementById("div-btn-circulo-2");

        for (let i = 0; i < sliderSection.length; i++) {
            var circle = document.createElement("button");
            circle.setAttribute("id", "btn-circle" + 1);
            circle.setAttribute("type", "button");
            
            circle.classList.add("btn-circulo");
            div_btn_circulo_2.appendChild(circle);

        }
    }
    create_button_circle();
    

    </script>
</html>

