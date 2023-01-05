    function showButtons() {
        document.getElementById('editar').hidden = true;
        document.getElementById('cancelar').hidden = false;
        document.getElementById('guardar').hidden = false;
        document.getElementById("td_guardar").hidden = false;
        document.getElementById("td_cancelar").hidden = false;
        document.getElementById("td_editar").hidden = true;

        document.getElementById('nombre').readOnly = false;
        document.getElementById('tipo_producto').readOnly = false;
        document.getElementById('precio').readOnly = false;
        document.getElementById('image').disabled = false;


    }
    function hideButtons(){
        document.getElementById('editar').hidden = false;
        document.getElementById('cancelar').hidden = true;
        document.getElementById('guardar').hidden = true;
        document.getElementById("td_guardar").hidden = true;
        document.getElementById("td_cancelar").hidden = true;
        document.getElementById("td_editar").hidden = false;

        document.getElementById('nombre').readOnly = true;
        document.getElementById('tipo_producto').readOnly = true;
        document.getElementById('precio').readOnly = true;
        document.getElementById('image').disabled = true;

    }