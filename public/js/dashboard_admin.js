    var txt = document.getElementById("txtarea");
    var mensaje = document.getElementById("mensaje");
    var mensaje2 = document.getElementById("mensaje2");
    var div_notices = document.querySelectorAll(".div_notices");

    var cancelar = document.getElementById("can");
    var cancelar2 = document.getElementById("can2");

    var modal_button = document.getElementById('modal_button');
    var modal_window = document.getElementById('modal_window');
    var section = document.querySelector('section');
    var modal_button1 = document.getElementById('modal_button1');
    var modal_window1 = document.getElementById('modal_window1');
    var span = document.getElementById("divh4");
    var div_h4 = document.getElementById("div_h4");

    var hola = document.getElementById("hola");
    span.addEventListener('click', showMessage);

    function showMessage(){
        hola.hidden = false;
        span.hidden = true;
    }



    var resultado = document.getElementById("resultado");
    var resultado2 = document.getElementById("resultado2");

    var limit = 250;
    resultado.textContent = 0 + " / " + limit;
    resultado2.textContent = 0 + " / " + limit;

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

    mensaje2.addEventListener("input", function () {
        var textLength = mensaje2.value.length;
        resultado2.textContent = textLength + " / " + limit;
        if (textLength >= limit) {
            mensaje2.style.borderTop = "1px solid red";
            mensaje2.style.borderBottom = "1px solid red";
            mensaje2.style.borderRight = "1px solid red";
            mensaje2.style.borderLeft = "1px solid red";
            mensaje2.style.animation = "shake 300ms";

            mensaje2.style.paddingLeft = "0.5rem";

            mensaje2.style.outlineColor = "red";
            resultado2.style.color = "red";
        }
        else{
            mensaje2.style.outlineColor = "black";
            mensaje2.style.borderTop = "none";
            mensaje2.style.borderBottom = "none";
            mensaje2.style.borderRight = "none";
            mensaje2.style.borderLeft = "none";
            resultado2.style.color = "black";
            mensaje2.style.paddingLeft = "0.5rem";
            mensaje2.style.animation = "none";

        }
    });
function closeSuccess() {
    modal_window1.classList.add("close_modal_window");
}
function closeWindow() {
    modal_window.classList.add("close_modal_window");
}

function previewImage(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('uploadImages'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('uploadPreviews'+nb).src = e.target.result;         
    };     
}

function previewImage2(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('uploadPreview'+nb).src = e.target.result;         
    };     
}
cancelar.addEventListener('click', hideMessage);
function hideMessage() {
    hola.hidden = true;
    span.hidden = false;
    var ah = document.getElementById("uploadPreviews1").removeAttribute("src");
    
}
ah.addEventListener("error")
var images = $("#uploadPreviews1");

$(images).on("error", function(event) {
    $(event.target).css("display", "none");
});