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
	top: 20px;
}
</style>
<body>
	<span id="timer" class="datetime">31/10/2018 22:47</span>
	<?php $aluno = $this->session->userdata('usuario'); ?>
	<div class="container classe">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 colunas">
				<?php foreach ($disciplinas as $count => $questoes) :  ?>

					<div class="row">
						<hr style="border: 1px solid;">
						Disciplina de <?php echo  $questoes->nome;   ?>
						<hr style="border: 1px solid;">
					</div>

					<form role="form" class="questao" name="enviar_prova" method="post" action="<?php echo site_url('aluno/provas/resultado') ?>">
						<?php foreach ($questoes->questoes as $questao) : ?>
							<div><?php echo ($count++). ' ) '. $questao->descricao;   ?></div>
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

		$.ajax({
			type: "POST",
			url: '<?php echo base_url('aluno/provas/getDataInicio') ?>',
			data: {id:<?php echo $aluno['id']; ?>},
			success: function(result){
				console.log(result);
				countDownDate = new Date(result).getTime();
				console.log(countDownDate);

			},
				//dataType: dataType
			});

		// Set the date we're counting down to
		//var countDownDate = new Date("Oct 31, 2018 22:57:00").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		  // Get todays date and time
		  var now = new Date().getTime();
		  console.log(now);
		  // Find the distance between now and the count down date
		  var distance = now - countDownDate;

		  // Time calculations for days, hours, minutes and seconds
		  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		  // Display the result in the element with id="demo"
		  $('#timer').html(days + "d " + hours + "h " + minutes + "m " + seconds + "s ");

		  // If the count down is finished, write some text 
		  if (distance > 3600000) {
		  	clearInterval(x);
		  	$('#timer').html("EXPIRED");
		  }
		}, 1000);
	</script>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<button type="submit" value="<?php echo $aluno['id'];?>" id="finalizar_prova" class="btn btn-success">Finalizar prova</button>
			</div>
		</div>
	</div>
</br>