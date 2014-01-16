$(function(){
  
    $('.dropdown-menu li a').on('click', function() {
    $('.nav').find('.active').removeClass('active');
}); 
    $('.buscarAcuerdo').on('click', function(e) {
        e.preventDefault();

        acuerdo3949();
    });
    
    $('.votoVendimia').on('click', function(e){
        e.preventDefault();
        var candidata = $(this).attr('candidata');
        registrarVotoVendimia(candidata);
        $(this).addClass('hidden');
        var votos = $("#votos"+candidata).html();
        $("#votos"+candidata).html(parseInt(votos) + 1);
        $.cookie('votoVendimia' + candidata, 'votada', {expires: 30});
        
        
    });

    
});
$(window).scroll(function () { 
    var scroll = $(window).scrollTop();
   
    if (scroll > 140) {
        $('.flotanteabajo').addClass('flotantearriba');
        $('.flotanteabajo').removeClass('flotanteabajo');
        
    } else{
        $('.flotantearriba').addClass('flotanteabajo');
        $('.flotantearriba').removeClass('flotantearriba');   
    }
});

$(window).resize(function() {
    var ancho = $(window).width();
    
    if (ancho < 1100) {
        $("#flotante1").removeClass('affix');
        $("#flotante2").removeClass('affix');
    } else {
        $("#flotante1").addClass('affix');
        $("#flotante2").addClass('affix');
    }
});
$('ul.dropdown-menu li a').on('touchstart', function(e) {
    e.preventDefault();
    window.location.href = $(this).attr('href');
})


function activarLinkMenu(seccion){
    
    $('.nav').find('li:contains("'+seccion+'")').first().addClass('active');
}


function crearPdf(id){
    //var url = 'http://localhost/PaginaLavalle/public/licitaciones/pdf';
    var url = 'http://www.lavallemendoza.gov.ar/public/licitaciones/pdf/';
    var data = {};
    
    data['id'] = id;
    
    $.post(
       url,
       data,
       function(response){
           abrirPdf(response,htmlLink,id);
       },
       'json'
   );
   
   var htmlLink = $('[name="'+id+'"]').parent().parent().html();
   $('[name="'+id+'"]').parent().parent().html('<td><img id="loader" src="http://www.lavallemendoza.gov.ar/img/loader.gif">\n\
</td><td><h3>Cargando Certificado</h3></td>\n\
<td><p>esto puede demorar unos segundos..</p></td>');
   
   //$('[name="'+id+'"]').parent().parent().html('<td><img id="loader" src="http://localhost/PaginaLavalle/img/loader.gif">\n\
//</td><td><h3>Cargando Certificado</h3></td>\n\
//<td><p>esto puede demorar unos segundos..</p></td>');
}

function abrirPdf(response,htmlLink,id) {
    
    if(response === ''){
        alert('ha ocurrido un error, recargue la página e intentolo de nuevo');
    } else {
    $('#loader').parent().parent().html(htmlLink);
    window.open('http://www.lavallemendoza.gov.ar/'+response['pdf']);
    //window.open('http://localhost/PaginaLavalle/public/'+response['pdf']);    
    }
    
}

function acuerdo3949() {
    //var url = 'http://paginalavalle/acuerdo3949/'
    var url = 'http://www.lavallemendoza.gov.ar/acuerdo3949';
   var data = {};
   
   data['acuerdo'] = $("#acuerdo option:selected").val();
   
    $.post(
        url,
        data,
        function(response){
            var html = '<table class="table"><tr><th>Ejercicio</th><th>Periodo</th><th>Documento</th></tr>';
            $.each(response,function(i, documento) {
               html += '<tr><td>'+documento.ejercicio+'</td><td>'+documento.periodo+'</td>'+
                       '<td><a href="/acuerdo/'+documento.urlDocumento+'" target="_blank" onClick="window.open(this.href, this.target, "width=700,height=600");'+
                       'return false;" role="button" data-toggle="modal">'+documento.descripcion+'</a></td></tr>';
            });
            html += '</table>'
            $("#documentos").html();
            $("#documentos").html(html);
        },
        'json'
    );
}

function registrarVotoVendimia(candidata) {

    //var url = 'http://paginalavalle/vendimia';
    var url = 'http://www.lavallemendoza.gov.ar/vendimia'
    var data = {};

    data['candidata'] = candidata;

    $.post(
            url,
            data,
            function(response) {
                
            },
            'json'
            );
}

