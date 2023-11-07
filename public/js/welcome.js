let btn_start = document.querySelector('#btn_start');
var btn_yes = document.getElementById('yes'), btn_no = document.getElementById('no'),
modal_window = document.querySelector('.modal_window'), table_extern = document.getElementById('table_extern'),
table = document.getElementById('table'), table2 = document.getElementById('table2');
btn_start.addEventListener('click', presionar);
btn_yes.addEventListener('click', jugar);
btn_no.addEventListener('click', salir);
function presionar() {
    btn_start.disabled = true;
    modal_window.classList.remove("d-none", "hiden");
    modal_window.classList.add("showed");
    setTimeout(() => {
        modal_window.style.display="block";
    }, 500);
    console.log('Quieres jugar?');
}
var intento = 0;
function jugar() {
    console.log('Pues empecemos');
    btn_start.classList.remove("d-block");
    btn_start.classList.add("d-none");
    if (intento == 0) {
        crearTablero();
        btn_salir.addEventListener("click", terminar);
        intento = 1;
    } else {
        mostrarTablero();
        btn_salir.addEventListener("click", terminar);
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
}
function crearTablero(){
    console.log("Intento: "+intento);
    let btn_salir = document.createElement("button");
    btn_salir.setAttribute("type", "button");
    btn_salir.setAttribute("id", "btn_salir");
    btn_salir.setAttribute("class", "btn btn-danger");
    btn_salir.style.marginTop = "0.5rem";
    salir();
    table.style.margin = "0.5rem";
    btn_salir.innerHTML = "Finalizar";
    table_extern.style.flexDirection = "column-reverse";
    table_extern.appendChild(btn_salir);
    btn_salir.classList.remove("d-none");
    btn_salir.classList.add("d-block");
    let new_array = ["A", "B", "C" , "D", "E", "F", "G", "H"];
    const para2 = [], para3 = [];
    for (let index = 0; index < 8; index++) {
        const arr1 = new_array[index];
        var para1 = document.createElement("div");
        para1.setAttribute("id", (index + 1));
        table2.appendChild(para1);
        let casilleros1 = para1.id;
        for (let index2 = 1; index2 < 9; index2++) {
            let para = document.createElement("div");
            para.style.width = "35px"; para.style.height = "35px"; para.style.backgroundColor = "#ffffff"; para.style.border = "black 1px solid";
            para.setAttribute("id", index2); para.classList.add("celdas");
            let casilleros = para.id;
            para1.appendChild(para);
            let input_radio = document.createElement("input"), div_two = document.createElement("div");
            input_radio.type = "radio";
            if ((casilleros % 2 != 0 && casilleros1 % 2 != 0) || (casilleros % 2 == 0 && casilleros1 % 2 == 0)) {
                if ((casilleros == 1) || (casilleros == 2) || (casilleros == 3) || (casilleros == 6) || (casilleros == 7) || (casilleros == 8)){
                    para.appendChild(div_two); div_two.appendChild(input_radio); para.classList.add("p-1");
                    div_two.style.borderRadius = "15px";
                    input_radio.id = "radio"+(index + 1)+"_"+index2; input_radio.classList.add("input_radios");
                }
                if ((casilleros == 1) || (casilleros == 2) || (casilleros == 3)) {
                    div_two.style.backgroundColor = "rgb(105, 15, 15)";
                    input_radio.setAttribute("name", "hola_mundo1");
                } if ((casilleros == 6) || (casilleros == 7) || (casilleros == 8)) {
                    div_two.style.backgroundColor = "white";
                    input_radio.setAttribute("name", "hola_mundo2");
                }
                para.style.backgroundColor = "black";
            }
            para.addEventListener("click", function(event){
                // console.log(event.target.childNodes[0].childNodes[0]);
                if ((casilleros % 2 != 0 && casilleros1 % 2 != 0) || (casilleros % 2 == 0 && casilleros1 % 2 == 0)) {
                    if ((casilleros == 1) || (casilleros == 2) || (casilleros == 3) || (casilleros == 6) || (casilleros == 7) || (casilleros == 8)){
                        para.childNodes[0].childNodes[0].checked = true;
                        if (para2[1]) {
                            para2.shift();
                        }
                        if (para3[0]) {
                            para3.shift()
                        }
                        para2.push(para);
                        para3.push(para);
                        // para.childNodes[0].remove();
                        // console.log(para.childNodes[0]);
                        // console.log(para3[0]);
                        para.classList.add("bg-blue");
                        if (!input_radio.checked || para == para2[1]) {
                            if (para != para2[0] || para != para2[1]) {
                                para2[0].classList.remove("bg-blue");
                            }
                        }
                    }
                }
                let para6 = para.childNodes[0];
                // if (para.childNodes[0]) {
                //     console.log(para.childNodes[0]);
                // } else {
                    // console.log(para);
                    // console.log(para2[0]);
                    //  if (para[1]) {
                    //     console.log(para2[1]);

                    // }
                // }
                const otro_para = para2[0].childNodes[0];
                console.log(para3[0]);
                if (!para.childNodes[0]) {
                    // console.log(para);
                    console.log(otro_para);
                    if (para3[0]) {
                        const node_para = para3[0].childNodes[0];
                        // console.log(node_para);
                        move(para2[0].childNodes[0], para3[0].childNodes[0], para);
                    }
                }
                // console.log("Hola mundo, me has presionado columna: "+casilleros1+", fila: "+casilleros);
            });
        }
    }
    table2.classList.add("d-grid");
    table2.style.gridTemplateColumns = "auto auto auto auto auto auto auto auto";
    table_extern.style.height = "fit-content";
}

function mostrarTablero(){
    console.log("Hola mundo");
    salir();
    table2.classList.remove("d-none", "hiden2");
    btn_salir.classList.remove("d-none");
    btn_salir.classList.add("d-block");
    // table2.classList.add("d-grid");
    // table2.style.gridTemplateColumns = "auto auto auto auto auto auto auto auto";
    // table_extern.style.height = "fit-content";
}
function salir() {
    // alert('Saliendo...');
    btn_start.disabled = false;
    modal_window.classList.remove("showed");
    modal_window.classList.add("hiden");
    setTimeout(() => {
        modal_window.classList.add("d-none");
    }, 250);
}
function move(element, element2, root){
    element.classList.add("transition");
    setTimeout(() => {
        element.remove();
    }, 500);
    setTimeout(() => {
        root.append(element2);
        if (element2.className.includes("transition")) {
            element2.classList.remove("transition");

        }
    }, 560);
}
