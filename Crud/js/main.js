jQuery(document).on('submit','#formlg', function(event){
     event.preventDefault();
     jQuery.ajax({
          url:'login.php',
          type: 'POST'
          dataType: 'json',
          data: $(this).serialize(),
          beforeSend: function(){
           $('.der').val('Validando...')

          }
     })
     .done(function(respuesta){
         console.log(respuesta);
      if(respuesta.error){
         if(respuesta.tipo =='administrador'){
            location.href = 'tabla.php';
           } else if (respuesta.tipo =='empleado'){
                  location.href = 'index.php';


           }


         }else {
             $('.error').slideDown('slow');
               setTimeout(function(){
                $('.error').slideUp('slow');

               },3000);
               $('.der').val('Iniciar Sesión');
         }


     })
     .fail(function(resp){
     	 console.log(resp.responseText);
     })
     .always(function(){
         consosle.log("complete");

     });


});
