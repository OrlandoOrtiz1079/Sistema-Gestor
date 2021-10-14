/*<!--=====================================
    ON/OFF PRE-REGISTRO
======================================-->*/
$(document).on("click", ".config1", function () {
    if (document.getElementById("config1").checked) {
        var EstadoCheck = "on";
    }else{
        var EstadoCheck = "off";
    }
    $.ajax({
        url: "ajax/config.ajax.php",
        method: "POST",
        data: {idConfig: $('#configID1').val(), valorConfig: EstadoCheck}
     }).done(function(res){
         if (res == '"ok"') {
            //  document.querySelector('#EstadoConfig1').innerText = ' ¡Guardado!';
             setTimeout(QuitarTextConfig1, 1000);
         }
        //  else{
        //      document.querySelector('#EstadoConfig1').innerText = '¡Error!';
        //  }
     });
})

function QuitarTextConfig1() {
    document.querySelector('#EstadoConfig1').innerText = '';
  }
