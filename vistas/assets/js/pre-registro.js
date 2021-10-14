/*<!--=====================================
EDITAR PRE-REGISTRO
======================================-->*/
$(document).on("click", ".btnEditarPreRegistro", function () {
    var idPreRegistroEdit = $(this).attr("idPreRegistroEdit");
    // console.log("Edit: ", idPreRegistroEdit);
    var datos = new FormData();
    datos.append("idPreRegistroEdit", idPreRegistroEdit);
    $.ajax({
        url: "ajax/pre-registro.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.table(respuesta);
            $("#idPreRegistroEdit").val(respuesta["id"]);
            $("#editarNoControlPR").val(respuesta["noControl"]);
            $("#editarCarreraPR").val(respuesta["carrera"]);
            $("#editarTelefonoPR").val(respuesta["telefono"]);
            $("#editarNombrePR").val(respuesta["nombre"]);
            $("#editarApellidoPPR").val(respuesta["apellidoP"]);
            $("#editarApellidoMPR").val(respuesta["apellidoM"]);
            $("#editarAsesorPRE").val(respuesta["asesorPre"]);

            document.getElementById("CheckPreRegistroEdit").checked = false;
            document.getElementById('AsesorPreRegistroEditView').style.display='block';
            document.getElementById('AlertAsesorPreRegistroEditView').style.display='block';

        }
    });
})

/*<!--=====================================
MOSTRAR/OCULTAR INPUT ASESOR EN EDITAR PRE-REGISTRO
======================================-->*/
$(document).on("click", ".CheckPreRegistroEdit", function () {
    if (document.getElementById("CheckPreRegistroEdit").checked) {
        document.getElementById('AsesorPreRegistroEditView').style.display='none';
        document.getElementById('AlertAsesorPreRegistroEditView').style.display='none';
        $('#editarAsesorPRE').removeAttr("required");
    }else{
        document.getElementById('AsesorPreRegistroEditView').style.display='block';
        document.getElementById('AlertAsesorPreRegistroEditView').style.display='block';
        $('#editarAsesorPRE').prop("required", true);
    }
})

/*<!--=====================================
    ELIMINAR PRE-REGISTRO
======================================-->*/
$(document).on("click", ".btnEliminarPreRegistro", function () {
    var idPreRegistro = $(this).attr("idPreRegistroDel");
    Swal.fire({
        title: '¿Eliminar?',
        text: "¡Esta acción no se puede revertir!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Eliminar!'
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?ruta=Pre-Registro&idPreRegistro=" + idPreRegistro;
        }
    })
})

/*<!--=====================================
LLENAR CAMPOS PARA REGISTRO DESDE PRE-REGISTRO
======================================-->*/
$(document).on("click", ".btnPreRegistroRegister", function () {
    var idPreRegistroRe = $(this).attr("idPreRegistroRegister");
    // console.log("ID: ", idPreRegistroRe);
    var datos = new FormData();
    datos.append("idRegistroView", idPreRegistroRe);
    $.ajax({
        url: "ajax/pre-registro.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log("R:", respuesta);
            $("#idResidentePreReR").val(respuesta["id"]);
            $("#nuevoNoControlRPR").val(respuesta["noControl"]);
            $("#nuevoCarreraR").val(respuesta["carrera"]);
            $("#nuevoNombreR").val(respuesta["nombre"]);
            $("#nuevoApellidoPR").val(respuesta["apellidoP"]);
            $("#nuevoApellidoMR").val(respuesta["apellidoM"]);
            $("#nuevoAsesorIntR").val(respuesta["asesorPre"]);
            $("#nuevoTelefonoRR").val(respuesta["telefono"]);
            
        }
    });
})
/*<!--=====================================
VER DOCENTES DISPONIBLES SIN ACTUALIZAR
======================================-->*/
$(document).on("click", ".btnActuDocDisp", function () {
    var datos = new FormData();
    datos.append("varDocDisponible", "noResidentes");
    $.ajax({
        url: "ajax/pre-registro.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            $("#DocentesDisponibles").find('option').remove();
        },
        success: function (respuesta) {
            $("#DocentesDisponibles").append('<option value="NA" >Seleccione un asesor</option>');
            $.each(respuesta,function(key, registro) {
                $("#DocentesDisponibles").append('<option value='+registro.id+'>'+registro.nombre+'</option>');
              }); 
        },
        error: function(respuesta) {
            console.table(respuesta);
            alert('¡Error en el Ajax Status 200, mas info en la consola!');
          }
    });
})