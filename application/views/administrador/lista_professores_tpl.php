<?php
include 'index_admin_tpl.php';
?>
<style type="text/css">
.celula1 {
  width: 800px;
  padding:100px;
  _width: 55px;
}
</style>

<body>
  <div class="container">
    <div class="col-md-10 col-md-offset-2">

    </br>
    <div class="panel-heading" role="tab" id="">
      <table   align="center"  class="lista-clientes table table-striped" id="myTable">
        <thead>
          <tr>
            <th class="celula1">Professores</th>
            <th>Opções</th>
          </tr>
        </thead>

      </div>
      <?php  foreach ($professores as $professor) { ?>
        <tr>
          <td class="celula1">
            <div class="panel-heading" role="tab" id="questao-painel-<?php echo $professor['professor']; ?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#questao-<?php echo $professor['professor']; ?>" aria-expanded="true" aria-controls="questao-<?php echo $professor['professor']; ?>">
                  <?php  echo character_limiter(strip_tags($professor['nome']),20); ?>
                </a>
              </h4>

            </div>

            <div id="questao-<?php echo $professor['professor']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questao-painel-<?php echo $professor['professor']; ?>">
              <div class="panel-body">

                Código: <?php echo $professor['professor'];?><br>

                Código: <?php echo $professor['nome'];?><br>

                Curso/Disciplinas:
                <?php foreach($disciplinas_professor as $disciplina) {?>
                  <strong><?php echo ' | '; echo $disciplina['curso']; ?></strong>
                  <?php echo ' | '; echo $disciplina['disciplina']; ?><br>
                <?php } ?>
                
                

              </div>
            </div>
          </td>
          <td class="celula2">
            <p class=" text-right">

              <a href="<?=base_url('administrador/alunos/inativar/' .$professor['professor'])?>" class="btn-sm btn-danger"  onclick="return confirm ('Têm certeza que deseja excluir esse registro?') "><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              <a href="<?=base_url('administrador/alunos/alterarProfessor/' .$professor['professor'])?>" class="btn-sm btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </p>
          </td>
        </tr>
      <?php } ?>

    </table>
  </div>
</div>

</body>
</html>

