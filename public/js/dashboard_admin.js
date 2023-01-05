window.onload = function(){
    var txt = document.getElementById("txtarea");
    var cancelar = document.getElementById("can");
    var modal_button = document.getElementById('modal_button');
    var modal_window = document.getElementById('modal_window');
    var section = document.querySelector('section');
    var modal_button1 = document.getElementById('modal_button1');
    var modal_window1 = document.getElementById('modal_window1');
    var span = document.getElementById("divh4");
    var hola = document.getElementById("hola");
    span.addEventListener('click', showMessage);

    function showMessage(){
        txt.style.marginTop = "5rem";
        hola.hidden = false;
        span.hidden = true;
    }

    cancelar.addEventListener('click', hideMessage);
    function hideMessage() {
        hola.hidden = true;
        span.hidden = false;
    }

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

}
function closeSuccess() {
    modal_window1.classList.add("close_modal_window");
}
function closeWindow() {
    modal_window.classList.add("close_modal_window");
}




function previewImage(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('uploadPreview'+nb).src = e.target.result;         
    };     
}