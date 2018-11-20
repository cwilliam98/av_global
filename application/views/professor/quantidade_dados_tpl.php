<?php
include 'index_admin_professor_tpl.php'; 
?>

<!DOCTYPE html>
<html>

<body>

	<div class="container ">
		
		<div class="jumbotron">
			<div class="row">
				<div class="col-md-3">
					<div class="col-md-3">
						<div class="">
							<div class="">
								<h4>
								</h4>

								<h3>
								</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-body text-center">
							<h4>
								<span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span>
								Alunos
							</h4>

							<h3>
								<div id="alunos"></div>
							</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="">
						<div class="">
							<h4>
							</h4>

							<h3>
							</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-body text-center">
							<h4>
								<span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span>
								Questões
							</h4>

							<h3>
								<div id="questoes"></div>
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>



	<div class="container ">
		
		<div class="jumbotron">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-primary">
						<p class="text-center">Últimas provas</p>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
						<table width="600"  align="center"  class="table table-striped" id="myTable">
							<tr>
								<th class="text-center">Nome</th>
								<th class="text-center">Data aplicação</th>
								<th class="text-center">Professor</th>
								<th class="text-center">Periodo Letivo</th>
								<th class="text-center">Opções</th>
							</tr>
							<?php foreach ($provas as $prova) { ?>

								<tr>
									<td class="text-center">
										<?php echo $prova['nome']; ?>
									</td>

									<td class="text-center">
										<?php echo nice_date($prova['aplicacao'],'d/m/Y H:i:s'); ?>
									</td>

									<td class="text-center">
										<?php echo $prova['professor']; ?>
									</td>

									<td class="text-center">
										<?php echo $prova['codigo_periodo']; ?>
									</td>
									<?php if ($prova['aplicacao'] >= date('d/m/Y H:i:s')) { ?>
										<td>
											<p class=" text-right">

												<a href="<?=base_url('professor/provas/inativar/' .$prova['id'])?>" class="btn-sm btn-danger"  onclick="return confirm ('Têm certeza que deseja excluir esse registro?') "><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
												<a href="<?=base_url('professor/provas/alterar/' .$prova['id'])?>" class="btn-sm btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
											</p>
										</td>
									<?php } ?>
								</tr>
							<?php }?>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$.post("<?php echo base_url();?>professor/admin/dadosAdmin",
				function(data){
					var obj = JSON.parse(data);
					var alunos = document.getElementById('alunos');
					var questoes = document.getElementById('questoes');
					var min = 0;
					var maxAlunos = obj.alunos;
					var maxQuestoes = obj.questoes;
				var duração = 1000; // 5 segundos

				for (var i = min; i <= maxQuestoes; i++) {
					setTimeout(function(nr) {
						questoes.innerHTML = nr;
					}, i * 1000 / maxQuestoes, i);
				}
				for (var i = min; i <= maxAlunos; i++) {
					setTimeout(function(nr) {
						alunos.innerHTML = nr;
					}, i * 1000 / maxAlunos, i);
				}
			});
		});

	</script>

</body>
</html>