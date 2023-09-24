var editar = document.querySelectorAll(".ed");
for (let i = 0; i < editar.length; i++) {
    const ed = editar[i];
    ed.addEventListener("click", function () {
        alert('Hola mundo');
        console.log("Hola mundo editar");
    });
}
