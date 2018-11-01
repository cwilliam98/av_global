<footer class="py-3 bg-info">
	<div class="container">
		<p class="m-0 text-center text-white">Copyright &copy; Cristian Albrecht 2017</p>
	</div>
	<!-- /.container -->
</footer>
<script>
	setTimeout(function(){
		$('button.close').click()
	},2000);

$('#finalizar_prova').click(function(){

	var resposta = confirm("Deseja realmente encerrar a prova?");
	
	if (resposta == true) {
          window.location.href = "<?php echo base_url('aluno/provas/fim') ?>";
     }
});

</script>

</body>
</html>