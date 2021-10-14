var gra1;
var gra2;

$(document).ready(function () {
    var esVisible = $("#GrafoRT").is(":visible");
    if (esVisible) {
        $.ajax({
            url: "ajax/inicio.ajax.php",
            method: "POST",
            data: { GraficaR: 1},
            dataType: "json"
        }).done(function (res) {
            gra1 = res[0];
            NumeroTesis();
        });
    }
});

function NumeroTesis() {
    $.ajax({
        url: "ajax/inicio.ajax.php",
        method: "POST",
        data: { GraficaR: 2},
        dataType: "json"
    }).done(function (res) {
        data = {
            datasets: [{
                backgroundColor: ["#5cb85c","#d9534f"],
                data: [gra1, res[0]]
            }],
            labels: [
                'Residencias',
                'Tesis'
            ]
        };

        var graphTarget = $("#GrafoRT");
        var myDoughnutChart = new Chart(graphTarget, {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                // title: {
                //     display: true,
                //     text: 'Grafica de Residencias y Tesis'
                //   }
            }
        });

    });
  }

