
<title>Cadastro de Provas</title>

<style>
	.classe {
	background: #F5F5DC;
	}
</style>
</br>
<div class="container">
	<div class="row">
		
		
	</div>
				
		
		<?php 
		
		echo $aluno['nome'] .': '. $disciplina['nome'];
		
		foreach ($questoes as $questao) { ?>
		
			<div class="col-md-12 classe"> <?php echo $questao['disciplina']. ')'. $questao['descricao']; ?> </div> 
			<?php foreach ($questao['alternativas'] as $alternativa) { ?>	
				<div class="col-md-12"> <?php echo $alternativa['questao'] . '--' . $alternativa['descricao'] .'--'. $alternativa['correta'] ?></div>
				<?php
				} 
				
		}?>
			
</div>
