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
    <div class="col-md-12 ">

    </br>
    <div class="panel-heading" role="tab" id="">
      <table   align="center"  class="lista-clientes table table-striped" id="myTable">
        <thead>
          <tr>
            <th class="celula1">disciplinas</th>
            <th>Opções</th>
          </tr>
        </thead>

      </div>
      <?php foreach ($disciplinas as $disciplinas) { ?>

        <tr>
          <td class="celula1">
            <div class="panel-heading" role="tab" id="questao-painel-<?php echo $disciplinas['id']; ?>">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#questao-<?php echo $disciplinas['id']; ?>" aria-expanded="true" aria-controls="questao-<?php echo $disciplinas['id']; ?>">
                  <?php echo character_limiter(strip_tags($disciplinas['curso']),20); ?>
                </a>
              </h4>

            </div>

            <div id="questao-<?php echo $disciplinas['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questao-painel-<?php echo $disciplinas['id']; ?>">
              <div class="panel-body">

                Código: <?php echo $disciplinas['nome'];?><br>

                Nome: <?php echo $disciplinas['professor'];?><br>

                Disciplina: <?php echo $disciplinas['situacao'];?>

              </div>
            </div>
          </td>
          <td class="celula2">
            <p class=" text-right">

              <a href="<?=base_url('administrador/disciplinas/inativar/' .$disciplinas['id'])?>" class="btn-sm btn-danger"  onclick="return confirm ('Têm certeza que deseja excluir esse registro?') "><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
              <a href="<?=base_url('administrador/disciplinas/alterar/' .$disciplinas['id'])?>" class="btn-sm btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </p>
          </td>
        </tr>
      <?php } ?>

    </table>
 </div>
</div>

</body>
</html>

