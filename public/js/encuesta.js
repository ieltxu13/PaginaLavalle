$(function() {
        $('#encuestaSi').load(function(){
           $(this). on('click', function(e) {
            e.preventDefault();
            var encuesta = $(this).attr('encuesta');
            registrarVoto(encuesta, true); 
        });
            

        });

        $('#encuestaNo').load(function(){
           $(this).on('click', function(e) {
            e.preventDefault();
            var encuesta = $(this).attr('encuesta');
            registrarVoto(encuesta, false);

        });
    });
    });

function registrarVoto(encuesta, voto) {

    //var url = 'http://localhost/PaginaLavalle/public/';
    var url = 'http://mendozalavalle.com.ar/'
    var data = {};

    data['voto'] = voto;

    $.post(
            url,
            data,
            function(response) {
                mostrarResultados(response);
            },
            'json'
            );
}

function mostrarResultados(response) {

    $.cookie('encuesta' + response['encuesta'], 'respondida', {expires: 30});
    $('.pregunta').hide();
    $('.resultados').html('<canvas id="graficoResultados" width="200" height="200" style="float:left;"></canvas>');
    var html = '<br><br><a class="btn btn-success btn-large">Si(' + response["si"] + ')</a><br><br>';
    html += '<a class="btn btn-danger btn-large">No(' + response["no"] + ')</a><br><br>';
    html += '<p>Total de respuestas: ' + response['total'] + '</p><br>';

    var data = [
        {
            value: response['si'],
            color: "#5bb75b"
        },
        {
            value: response['no'],
            color: "#da4f49"
        }
    ];
    var canvasGrafico = document.getElementById("graficoResultados").getContext("2d");
    var grafico = new Chart(canvasGrafico).Pie(data);
    $('.widgetEncuesta').append(html);

}