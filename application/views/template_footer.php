
<script type="text/javascript">
	(function() {
		'use strict';

		$(document).on('submit', 'form', function( event ) {
			event.preventDefault();
			event.stopPropagation();

			var $form = $(this),
			form = this;

        // inicia uma animação de loading
        $form.addClass('blur');

        $.ajax({
        	url: $form.attr('action'),
        	type: $form.attr('method'),
        	dataType: 'json',
        	data: $form.serialize(),
        })
        .done(function( response ) {

        	for (var campo in response.errors ) {

        		var mensagem = response.errors[campo];
        		
        		var $campo = $('#'+campo);

        		$campo.parent().addClass('has-error');
        		$campo.next().html(mensagem);

        		
        	}
        	if ( response.error === false ) {
                $.get('<?php echo base_url('perguntas/cadastra?aviso=1') ?>', function(data){

                    $('#coisas').html(data);

                });
                form.reset();
            }
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
          // remove animação de loading
          $form.removeClass('blur');
          form.reset();
      });
    });
	})();
</script>
<script>
    CKEDITOR.replace( 'questao' );
</script>
</br>
<footer class="py-3 bg-info">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Cristian Albrecht 2017</p>
</div>
<!-- /.container -->
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
   setTimeout(function(){
    $('button.close').click()
},2000)
</script>
</body>
</html>