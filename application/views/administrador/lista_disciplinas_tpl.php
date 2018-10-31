<?php
include 'index_admin_tpl.php';
?>

<body>
	<div class="container">
		<div class="col-md-10 col-md-offset-2">

		</br>

		<table width="600"  align="center"  class="table table-striped" id="myTable">
			<tr>
				<th class="text-center">Nome</th>
				<th class="text-center">Professor</th>
				<th class="text-center">Situação</th>
				<th class="text-center">Curso</th>
				<th class="text-center">Opções</th>
			</tr>
			<?php foreach ($disciplinas as $disciplina) { ?>
				<tr>
					<td class="text-center">
						<?php echo $disciplina['nome'];?>
					</td>
					
					<td class="text-center">
						<?php echo $disciplina['professor'];?>
					</td>

					<td class="text-center">
						<?php echo $disciplina['situacao'];?>
					</td>

					<td class="text-center">
						<?php echo $disciplina['curso'];?>
					</td>

					<td  class="btn-light text-center">
					 <a href="<?=base_url('administrador/disciplinas/inativar/' .$disciplina['id'])?>" class="btn-sm btn-danger"  onclick="return confirm ('Têm certeza que deseja excluir esse registro?') "><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					 <a href="<?=base_url('administrador/disciplinas/alterar/' .$disciplina['id'])?>" class="btn-sm btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
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
