let btn_start = document.querySelector('#btn_start');
var btn_yes = document.getElementById('yes');
var btn_no = document.getElementById('no');
var modal_window = document.querySelector('.modal_window');;
var table_extern = document.getElementById('table_extern');
var table = document.getElementById('table');
var table2 = document.getElementById('table2');


btn_start.addEventListener('click', presionar);

btn_yes.addEventListener('click', jugar);

btn_no.addEventListener('click', salir);
btn_salir.addEventListener("click", terminar);

function presionar() {
    btn_start.disabled = true;
    modal_window.classList.remove("d-none", "hiden");
    modal_window.classList.add("showed");
    // setTimeout(() => {
    //     modal_window.style.display="block";
    // }, 500);
    console.log('Quieres jugar?');
}
const intento = 0;

function jugar() {
    console.log('Pues empecemos');
    btn_start.classList.remove("d-block");
    btn_start.classList.add("d-none");
    var btn_salir = document.createElement("button");
    btn_salir.setAttribute("type", "button");
    btn_salir.setAttribute("id", "btn_salir");
    btn_salir.setAttribute("class", "btn btn-danger");
    btn_salir.style.marginTop = "0.5rem";
    salir();
    table.style.margin = "0.5rem";
    btn_salir.innerHTML = "Salir";
    table_extern.style.flexDirection = "column-reverse";
    table_extern.appendChild(btn_salir);
    btn_salir.classList.remove("d-none");
    btn_salir.classList.add("d-block");

    if (intento == 0) {
        crearTablero();
    } else {
        mostrarTablero();
    }
}
function terminar() {
    console.log('Terminando partida');
    btn_start.disabled = false;
    table2.classList.add("hiden2");
    btn_salir.classList.remove("d-block");
    btn_salir.classList.add("d-none");
    setTimeout(() => {
        table2.classList.add("d-none");
        table.classList.add("flex");
        table_extern.style.height = "50vh";
        btn_start.classList.remove("d-none");
        btn_start.classList.add("d-block");
    }, 250);
    console.log(intento);
}
function crearTablero(){
    console.log("Intento: "+intento);
    for (let index = 1; index < 9; index++) {
        var para1 = document.createElement("div");
        para1.setAttribute("id", index);
        table2.appendChild(para1);
        var casilleros1 = para1.id;
        for (let index2 = 1; index2 < 9; index2++) {
            var para = document.createElement("div");
            para.style.width = "35px";
            para.style.height = "35px";
            para.style.backgroundColor = "#ffffff";
            para.style.border = "black 1px solid";
            para.setAttribute("id", index2);
            var casilleros = para.id;
            para1.appendChild(para);

            if ((casilleros % 2 == 0) && (casilleros1==1)) {
                para.style.backgroundColor = "black";
            }
            if ((casilleros % 2 != 0) && (casilleros1==2)) {
                para.style.backgroundColor = "black";
            }
            if ((casilleros % 2 == 0) && (casilleros1==3)) {
                para.style.backgroundColor = "black";
            }
            if ((casilleros % 2 != 0) && (casilleros1==4)) {
                para.style.backgroundColor = "black";
            }
            if ((casilleros % 2 == 0) && (casilleros1==5)) {
                para.style.backgroundColor = "black";
            }
            if ((casilleros % 2 != 0) && (casilleros1==6)) {
                para.style.backgroundColor = "black";
            }
            if ((casilleros % 2 == 0) && (casilleros1==7)) {
                para.style.backgroundColor = "black";
            }
            if ((casilleros % 2 != 0) && (casilleros1==8)) {
                para.style.backgroundColor = "black";
            }
        }
    }

    table2.classList.add("d-grid");
    table2.style.gridTemplateColumns = "auto auto auto auto auto auto auto auto";

    table_extern.style.height = "fit-content";
    console.log(intento);    
}

function mostrarTablero(){
    console.log("Hola mundo");
    // table2.classList.remove("d-none", "hiden2");
    // table2.classList.add("d-grid");
    // table2.style.gridTemplateColumns = "auto auto auto auto auto auto auto auto";

    // table_extern.style.height = "fit-content";
}
function salir() {

    // alert('Saliendo...');
    modal_window.classList.remove("showed");
    modal_window.classList.add("hiden");
    setTimeout(() => {
        modal_window.classList.add("d-none");
    }, 250);
}