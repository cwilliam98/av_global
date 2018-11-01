<?php
include 'index_admin_tpl.php';
 
 ?>
<?php if (!$prova) { ?>
<div class="container">
	<div class="row">
		<div class="col col-md-4 col-md-offset-2">
			<p> Você não tem provas para acompanhar hoje!</p>
		</div>
	</div>
</div>

<?php } ?>


<div class="container">
	
	
	<div class="row">
		
		<div class="col col-md-10 col-md-offset-2">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Situação</th>
						<th scope="col">Aluno</th>
						<th scope="col">Disciplinas</th>
						<th scope="col">Aplicação</th>
						<th scope="col">Qtd questões/disciplinas</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($prova as  $dado) { ?>
						
						<tr>
							<td><?php echo $dado['situacao'] ?></td>
							<td><?php echo $dado['usuario'] ?></td>
							<td><?php echo $dado['disciplina'] ?></td>
							<td><?php echo date('d/m/Y h:m:s',strtotime($dado['aplicacao'])) ?></td>
							<td><?php echo $dado['qtd_questoes'] ?></td>
						</tr>

					<?php } ?>
				</tbody>
			</table>	
		</div>
		
	</div>
</div>