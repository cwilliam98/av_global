<?php
include 'index_admin_tpl.php'; 
?>

<!DOCTYPE html>
<html>

<body>

	<div class="container col-md-offset-2">
		
		<div class="jumbotron">
			<div class="row">
				<div class="col-md-3">
					<div class="panel panel-primary">
						<div class="panel-body text-center">
							<h4>
								<span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span>
								Professores
							</h4>
						
							<h3>
								<div id="professores"></div>
							</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
					<div class="panel panel-primary">
						<div class="panel-body text-center">
							<h4>
								<span class="glyphicon glyphicon glyphicon-book" aria-hidden="true"></span>
								Disciplinas
							</h4>
						
							<h3>
								<div id="disciplinas"></div>
							</h3>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-md-offset-1">
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


	<script>
		$(document).ready(function() {
			$.post("<?php echo base_url();?>administrador/admin/dadosAdmin",
				function(data){
					var obj = JSON.parse(data);
					var professores = document.getElementById('professores');
					var disciplinas = document.getElementById('disciplinas');
					var questoes = document.getElementById('questoes');
					var min = 0;
					var maxDisciplinas = obj.disciplinas;
					var maxProfessores = obj.professores;
					var maxQuestoes = obj.questoes;
				var duração = 1000; // 5 segundos

				for (var i = min; i <= maxProfessores; i++) {
					setTimeout(function(nr) {
						professores.innerHTML = nr;
					}, i * 1000 / maxProfessores, i);
				}
				for (var i = min; i <= maxDisciplinas; i++) {
					setTimeout(function(nr) {
						disciplinas.innerHTML = nr;
					}, i * 1000 / maxDisciplinas, i);
				}
				for (var i = min; i <= maxQuestoes; i++) {
					setTimeout(function(nr) {
						questoes.innerHTML = nr;
					}, i * 1000 / maxQuestoes, i);
				}
			});
		});

	</script>

</body>
</html>