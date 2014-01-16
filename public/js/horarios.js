$(function() {
   
    $("a[name='botoneditarhorario']").on('click',function(e) {
        var id = $(this).attr('horario');
        var valor = $('#'+id).val();
        var url = 'http://paginalavalle/administracion/colectivos/modificar-hora/';
        var data = {};
        
        data['id'] = id;
        data['valor'] = valor;
    
    $.post(
       url,
       data,
       function(response){
           alert('modificado!')
       },
       'json'
   );
        
    })
    
});

