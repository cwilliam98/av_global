<?php
include 'index_admin_tpl.php';
?>
<style type="text/css">
<!--
table {
	width:1000px;
	_width:760px;
}
#celula1 {
	width: 80px;
	padding:1px;
	_width: 55px;
}
#celula2 {
	width: 80px;
	padding:1px;
	_width: 495px;
}
-->
</style>

<body>
	<div class="container" id="print">
		<div class="col-md-2 col-md-offset-2">
			<input type="button" class="btn btn-primary" id="imprimir" onclick="window.print();" value="Imprimir">
		</div>
		<div class="col-md-12 col-md-offset-1">

		</br>

		<table align="center" class="" id="myTable">
			<tr>
				<td align="center">Questão</th>
					<td align="center">A</td>
					<td align="center">B</td>
					<td align="center">C</td>
					<td align="center">D</td>
					<td align="center">E</td>
				</tr>
				<?php foreach ($questoes as $pergunta) { ?>
					<tr>
						<td class=""  align="center" id="celula1">
							<?php echo $pergunta['id'];?> 
						</td>
						<?php foreach ($pergunta['alternativas'] as $alternativa) { ?>
							<?php if ($alternativa['correta'] == '1'){ ?> 

								<td  align="center">
									<button class="btn btn-primary"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
								</td>

							<?php } else { ?>

								<td  align="center">
									<button class="btn btn-primary"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
								</td>

							<?php } ?>

						</div>	
					<?php } ?>
				<?php } ?>


			</table>

		</div>
	</div>

	<script>
		function print(){
			$('#imprimir').toggle();
			var conteudo = document.getElementById('print').innerHTML;
			tela_impressao = window.open('Gabarito');
			tela_impressao.document.write(conteudo);
			tela_impressao.window.print();
			tela_impressao.window.close();
			$('#imprimir').toggle();
		}
	</script>

