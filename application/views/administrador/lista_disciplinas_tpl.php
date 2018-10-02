<?php
include 'index_admin_tpl.php';
?>

<body>
	<div class="container">
		<div class="col-md-12">

		</br>

		<table width="600" border="1" align="center"  class="" id="myTable">
			<tr>
				<th class="text-center">Nome</th>
				<th class="text-center">Professor</th>
				<th class="text-center">Opções</th>
			</tr>
			<?php foreach ($disciplinas as $disciplina) { ?>
				<tr>
					<td class="btn-info text-center">
						<?php echo $disciplina['nome'];?>
					</td>
					
					<td class="btn-info text-center">
						<?php echo $disciplina['professor'];?>
					</td>
					<td  class="btn-light text-center">
					 <a href="<?=base_url('administrador/disciplinas/alterar/' .$disciplina['id'])?>"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					 <a href="<?=base_url('administrador/disciplinas/alterar/' .$disciplina['id'])?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
					</td>
				<?php } ?>
			</tr>

		</table>
	</div>
</div>

<script src="<?=base_url('/assets/js/bootstrap.min.js')?>"></script>
</body>
</html>
<script type="text/javascript">
	$('#descricao_<?php echo $pergunta['id']?>').click( function () {
		$('#alternativa_').toggle();
	} );
</script>
