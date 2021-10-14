
/*<!--=====================================
    EDITAR RESIDENTE
======================================-->*/
$(document).on("click", ".btnEditdireccion", function () {
    var idResidente = $(this).attr("idDireccionEdit");
    // console.log("idDireccionEdit Edit =", idResidente);
    var datos = new FormData();
    datos.append("idDireccionEdit", idResidente);
    $.ajax({
        url: "ajax/directorio.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idDirectorioEdit").val(respuesta["id"]);
            $("#nuevoExtension").val(respuesta["noExt"]);
            $("#nuevoDepartamento").val(respuesta["depto"]);
            $("#nuevoResponsable").val(respuesta["responsable"]);
        }
    });
});