/*<!--=====================================
EDITAR Jerarquia
======================================-->*/
function btnEditarJerarquia(idJerarquia) {
    var datos = new FormData();
    datos.append("idJerarquia", idJerarquia);
    $.ajax({
        url: "ajax/Jerarquia.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#editarNombreJ").val(respuesta["nombre"]);
            $("#editarCargoJ").val(respuesta["cargo"]);
            $("#idJerarquia").val(respuesta["id"]);
            $("#editarSexoJ").val(respuesta["sexo"]);
        }
    });
}

$(document).on("click", ".btnEditarJerarquia", function () {
    var idJerarquia = $(this).attr("idJerarquia");
    btnEditarJerarquia(idJerarquia);
})

/*<!--=====================================
ELIMINAR Jerarquia
======================================-->*/
$(document).on("click", ".btnEliminarJerarquia", function () {
    var idJerarquia = $(this).attr("idJerarquia");
    Swal.fire({
        title: '¿Eliminar?',
        text: "¡Esta acción no se puede revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: "#d33",
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Eliminar!'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=Jerarquia&idJerarquia=" + idJerarquia;
        }
    })
})