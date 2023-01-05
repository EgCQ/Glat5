    var modal_window = document.getElementById("modal_window");
    var section = document.querySelector("section");
    function showWindow() {
        modal_window.hidden = false;
        section.classList.add("table-view");
        
    }
    function hideWindow(){
        modal_window.hidden = true;
        section.classList.remove("table-view");

    }
    $(document).ready(function(){
        $('.thead').on('click', '.addRow', function() {
            var tr = "<tr>"+
                        "<td>"+
                        "<input type='text' name='nombre[]' placeholder='Nombre' class='form-control'/>"+
                        "</td>"+
                        "<td>"+
                        "<input type='text' name='tipo_producto[]' placeholder='Tipo de producto' class='form-control'/>"+
                        "</td>"+
                        "<td>"+
                        "<input type='number' step='.01' name='precio[]' placeholder='0.00' class='form-control'/>"+
                        "</td>"+
                        "<td>"+
                            "<input type='file' name='img[]' class='form-control' accept='image/*'/>"+
                        "</td>"+
                        "<td class='text-center text-white'>"+
                            "<a id='delete_row' href='javascript:void(0)' class='pull-right btn btn-danger deleteRow'><i class='fa-light fas fa-square-minus'></i></a>"
                        "</td>"+
                    "</tr>"
                $('.tbody').append(tr);

            });

        $('.tbody').on('click', '.deleteRow', function() {
            $(this).parent().parent().remove(); 
        });

/*        $("#myTable").dynamicTable({
            columns: [
                {
                    text:"Nombre",
                    key:"nombre"
                },
                {
                    text:"Tipo de producto",
                    key:"tipo_producto"
                },
                {
                    text:"Precio",
                    key:"precio"
                },
            ],

            data: [

            ],
            buttons: {
                addButton:'<input type="button" value="Add" class="btn btn-primary" />',
                cancelButton:'<input type="button" value="Cancel" class="btn btn-primary" />',
                deleteButton:'<input type="button" value="Delete" class="btn btn-danger" />',
                editButton:'<input type="button" value="Edit" class="btn btn-primary" />',
                saveButton:'<input type="button" value="Save" class="btn btn-success" />',
            },

            showActionColumn:true,


        });*/



    });


    
