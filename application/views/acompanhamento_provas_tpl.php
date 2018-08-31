
<?php if (!$usuario) { ?>
<div class="container">
	
	
	<div class="row">
		
		<div class="col col-md-4">
			<p> Você não tem provas para acompanhar hoje!</p>
		</div>
		
	</div>
</div>

<?php } ?>


<div class="container">
	
	
	<div class="row">
		
		<div class="col col-md-4">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">Situação</th>
						<th scope="col">Aluno</th>
						<th scope="col">Disciplinas</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $situacao?></td>
						<td><?php echo $usuario?></td>
						<td><?php echo $disciplina?></td>
					</tr>
				</tbody>
			</table>	
		</div>
		
	</div>
</div>