<head>
	<link href="<?=base_url('/assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('/assets/css/funkyradio.css')?>" rel="stylesheet">
</head>
<style>
.classe {
	background: #FFFAFA;
}

.colunas {
	-webkit-column-count: 2; /* Chrome, Safari, Opera */
	-moz-column-count: 2; /* Firefox */
	column-count: 2;

	-webkit-column-gap: 40px; /* Chrome, Safari, Opera */
	-moz-column-gap: 40px; /* Firefox */
	column-gap: 40px;

}
.colunas .questao{
	break-inside: avoid-column;
}

.datetime {
	position: fixed;
	right: 20px;
	top: 0px;
}
</style>
<body>
	<span id="timer" class="datetime alert alert-success"></span>
	<?php $aluno = $this->session->userdata('usuario'); ?>
	<div class="container classe">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 colunas">
				<?php foreach ($disciplinas as $count => $questoes) :  ?>

					<hr style="border: 1px solid;">
					Disciplina de <?php echo  $questoes->nome;   ?>
					<hr style="border: 1px solid;">

					<form role="form" class="questao" id="enviar_prova" name="enviar_prova" method="post" action="<?php echo site_url('aluno/provas/resultado') ?>">
						<?php foreach ($questoes->questoes as $questao) : ?>
							<div><?php echo ($count++). ' ) '. html_entity_decode($questao->descricao); ?></div>
							<?php foreach ($questao->alternativas as $alternativa) : ?>
								<div class="radio radio-info">
									<input type="radio"  name="questao[<?php echo $questao->questao ?>]"  value="<?php echo 
									$alternativa->id ?>"  id="<?php echo $alternativa->id ?>"/>
									<label for="<?php echo $alternativa->id ?>"> <?php echo $alternativa->descricao?></label>
								</div>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</form>
					
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("input").click(function(e){
			$.ajax({
				type: "POST",
				url: '<?php echo base_url('aluno/provas/corrigir') ?>',
				data: $(this).serializeArray(),
				//success: ,
				//dataType: dataType
			});
		});

		var countDownDate = new Date();
		var dataFim = new Date(countDownDate.toDateString() + ' 19:51:00');
		var distance = Math.floor((dataFim - countDownDate) / 1000);

		var x = setInterval(function() {
		  distance--;

		  var horas   = Math.floor(distance / 3600);
		  var minutos = Math.floor((distance / 60) % 60);
		  var segundos = distance % 60;

		  // Display the result in the element with id="demo"
		  $('#timer').html(horas + ':' + minutos + ':' + segundos);

		  // If the count down is finished, write some text 
		  if (distance <= 0) {
		  	$('#timer').html("Terminouuu!");
		  	$('#finalizar').click();
		  	clearInterval(x);
		  }
		}, 1000);
	</script>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<button type="submit" value="<?php echo $aluno['id'];?>" id="finalizar_prova" class="btn btn-success">Finalizar prova</button>
				<button style="visibility: hidden;" type="submit" value="<?php echo $aluno['id'];?>" id="finalizar" class=""></button>
			</div>
		</div>
	</div>
</br>