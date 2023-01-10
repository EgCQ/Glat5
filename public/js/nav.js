window.onload = function () {
    var headernav = document.getElementById("headernav");
    var navb = document.getElementById("navb");
    var main = document.querySelector(".main");
    var li = document.getElementsByTagName("li");

    var a_div = main.getElementsByClassName("element_a");

    for (var i = 0; i < a_div.length; i++) {
        a_div[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("a_actived");
          current[0].className = current[0].className.replace(" a_actived", "");
          this.className += " a_actived";
        });
      }
      $(document).ready(function() {
        $("[href]").each(function() {
            if (this.href == window.location.href) {
                $(this).addClass("a_actived");
            }
        });
    });

    var img = document.getElementById("img");
    var nav_ul = document.getElementById("nav-ul");
    var nav_ul_li = document.getElementById("nav-ul-li");


    var ul = document.getElementById("ul");
    var ul1 = document.getElementById("ul1");
    var ul2 = document.getElementById("ul2");
    var btnadd = document.getElementById("btn-add");
    var btnremove = document.getElementById("btn-remove");

    btnadd.addEventListener("click", show_menu);
    btnremove.addEventListener("click", remove_menu);

    function show_menu(){
        headernav.style.height = "100vh";
        headernav.style.zIndex = "1";
        headernav.style.backgroundColor = "red";
        navb.style.height = "100vh";
        main.style.height = "100vh";
        main.style.flexDirection = "column";
        img.style.display = "flex";
        img.style.marginBottom = "1rem";
        img.style.justifyContent = "center";
        nav_ul.style.flexDirection = "column";
        nav_ul_li.style.display = "flex";
        nav_ul_li.style.height = "100vh";
        nav_ul_li.style.justifyContent = "center";
        ul.style.display = "flex";

        ul.style.flexDirection = "column";
        ul1.style.flexDirection = "column";
        ul1.style.textAlign = "center";
        ul2.style.flexDirection = "column";
        ul2.style.width = "100%";
        ul2.style.height = "100vh";

        btnadd.style.display ="none";
        btnremove.style.display ="flex";
        btnremove.style.justifyContent ="center";
        btnremove.style.fontSize = "35px";
        for (let i = 0; i < li.length; i++) {
            const li_i = li[i];
            li_i.style.marginTop = "0.5rem";
            li_i.style.marginBottom = "0.5rem";
        }
    }

    function remove_menu(){
        headernav.style.height = "10vh";
        navb.style.height = "10vh";
        main.style.flexDirection = "row";
        main.style.height = "10vh";
        img.style.marginBottom = "0rem";
        img.style.justifyContent = "flex-end";
        nav_ul.style.flexDirection = "column";
        nav_ul_li.style.display = "none";
        nav_ul_li.style.justifyContent = "center";

        ul.style.flexDirection = "column";
        ul1.style.flexDirection = "column";
        ul1.style.textAlign = "center";
        ul2.style.flexDirection = "row";
        ul2.style.width = "100%";
        ul2.style.height = "10vh";

        btnadd.style.display ="flex";
        btnremove.style.display ="none";
        for (let i = 0; i < li.length; i++) {
            const li_i = li[i];
            li_i.style.marginTop = "0rem";
            li_i.style.marginBottom = "0rem";
        }
    }
    function myFunction(x) {
        if (x.matches) { // If media query matches
            btnadd.style.display ="flex";
            nav_ul_li.style.display = "none";
            ul.style.display = "none";


        } else {
            headernav.style.height = "10vh";
            navb.style.height = "10vh";
            main.style.flexDirection = "row";
            main.style.height = "10vh";
            btnadd.style.display ="none";
            btnremove.style.display ="none";
            nav_ul_li.style.display = "block";
            ul.style.display = "flex";

            main.style.flexDirection = "row";
            nav_ul.style.flexDirection = "row";
            ul.style.flexDirection = "row";
            ul1.style.flexDirection = "row";
            ul2.style.flexDirection = "row";


        }
      }
      
      var x = window.matchMedia("(max-width: 795px)")
      myFunction(x) // Call listener function at run time
      x.addEventListener("change",myFunction) // Attach listener function on state changes
}

