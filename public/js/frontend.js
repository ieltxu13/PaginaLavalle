$(window).scroll(function () { 
    var scroll = $(window).scrollTop();
    
    if (scroll > 100) {
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
$(function(){
  
    $('.dropdown-menu li a').on('click', function() {
    $('.nav').find('.active').removeClass('active');
    $('#verPdf').on('click', function(e){
        alert('hola');
        e.preventDefault();
        crearPdf(e);
    });
    
}); 

    
});

function activarLinkMenu(seccion){
    
    $('.nav').find('li:contains("'+seccion+'")').first().addClass('active');
}


function crearPdf(id){
    //var url = 'http://localhost/PaginaLavalle/public/licitaciones/pdf';
    var url = 'http://mendozalavalle.com.ar/public/licitaciones/pdf/';
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
   $('[name="'+id+'"]').parent().parent().html('<td><img id="loader" src="http://mendozalavalle.com.ar/public/img/loader.gif">\n\
</td><td><h3>Cargando Certificado</h3></td>\n\
<td><p>esto puede demorar unos segundos..</p></td>');
   
   //$('[name="'+id+'"]').parent().parent().html('<td><img id="loader" src="http://localhost/PaginaLavalle/public/img/loader.gif">\n\
//</td><td><h3>Cargando Certificado</h3></td>\n\
//<td><p>esto puede demorar unos segundos..</p></td>');
}

function abrirPdf(response,htmlLink,id) {
    
    if(response === ''){
        alert('ha ocurrido un error, recargue la página e intentolo de nuevo');
    } else {
    $('#loader').parent().parent().html(htmlLink);
    window.open('http://mendozalavalle.com.ar/public/'+response['pdf']);
    //window.open('http://localhost/PaginaLavalle/public/'+response['pdf']);    
    }
    
}