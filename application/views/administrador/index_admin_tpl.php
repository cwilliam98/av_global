<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('/assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('/assets/css/simple-sidebar.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/chart/Chart.min.js'); ?>"></script>

    <style type="text/css">
    .sidebar-nav .dropdown-menu {
        position: relative;
        width: 100%;
        padding: 0;
        margin: 0;
        border-radius: 0;
        border: none;
        background-color: #222;
        box-shadow: none;
    }
</style>
</head>
<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper overlay">
            <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="sidebar-nav">

                    <li class="sidebar-brand">
                        <a href="#">
                            <?php $usuario =$this->session->userdata('usuario'); 
                            echo $usuario['nome'];
                            ?>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('administrador/admin')?>" id="cadastra_pergunta"><span class="glyphicon glyphicon glyphicon-home" aria-hidden="true"></span> Home </a>
                    </li>

                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-collapse-down"></span> Cadastrar</a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header"></li>
                        <li>
                            <a href="<?php echo base_url('administrador/perguntas/cadastra')?>" id="cadastra_pergunta"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span> Questões</a>
                        </li> 
                        <li>
                            <a href="<?php echo base_url('administrador/provas/index')?>" id="cadastrar_provas"><span class="glyphicon glyphicon glyphicon-book" aria-hidden="true"></span> Provas</a>
                        </li> 
                        <li>
                            <a href="<?php echo base_url('administrador/alunos/index')?>" id="cadastrar_alunos"><span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span> Usuários</a>
                        </li> 
                        <li>
                            <a href="<?php echo base_url('administrador/disciplinas/index')?>" id="cadastrar_disciplina"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Disciplina</a> 
                        </li>               
                    </ul>
                </li>
                
                <li>
                    <a href="<?php echo base_url('administrador/perguntas/index')?>" id="perguntas_cadastradas"> <span class="glyphicon glyphicon glyphicon-list" aria-hidden="true"></span> Perguntas cadastradas </a>
                </li>

                <li>
                    <a href="<?php echo base_url('administrador/provas/acompanhaProvas')?>" id="acompanha_provas"> <span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Acompanhar provas </a>
                </li>

                <li>
                    <a href="<?php echo base_url('administrador/disciplinas/lista')?>"> <span class="glyphicon glyphicon glyphicon-list" aria-hidden="true"></span> Lista disciplinas</a>
                </li> 

                <li>
                    <a href="<?php echo base_url('administrador/perguntas/geraGabarito')?>"> <span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span> Gera gabarito </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-collapse-down"></span> Relatórios</a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header"></li>
                        <li><a href="<?php echo base_url('administrador/admin/acertosPorQuestoes')?>"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Quantidades de acertos</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url('administrador/admin/formBackup')?>"> <span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span> Gera backup </a>
                </li>
                <li>
                    <form method="post" action="<?php echo base_url('login/logout')?>" id="cadastra_perguntas">                                  
                        <button type="submit"  id="cadastrar" class="btn btn-md"> 
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Sair
                        </button>
                    </form>                    
                </li>

            </ul>
        </nav>
    </div>
    <!-- /#sidebar-wrapper -->

    <?php if($this->input->get('aviso')==1) { ?>    
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Sucesso!</strong> Registro inserido com sucesso.
        </div>
    <?php } ?>

    <?php if($this->input->get('aviso')==2) { ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Errooo!</strong> Registro não inserido.
        </div>
    <?php } ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid" id="coisas">
        </div>
    </div>
    &nbsp <ol class="breadcrumb">
        <div class="item"><a href="">Home / </a>
        </ol>

        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <script>


        // window.onbeforeunload = function() {
            // return "Os dados do formulário serão perdidos.";
        // }

        setTimeout(function(){
            $('button.close').click()
        },2000);

        $("#wrapper").toggleClass("toggled");
    </script>
</body>

<script type="text/javascript">
   $('a').on('click', function() {
      var $this = $(this),
      $bc = $('<div class="item"></div>');

      $this.parents('li').each(function(n, li) {
          var $a = $(li).children('a').clone();
          $bc.prepend(' / ', $a);
      });
      $('.breadcrumb').html( $bc.prepend('<a href="">Home</a>') );
          //return false;
      });

   $(document).ready(function () {
      var trigger = $('.hamburger'),
      overlay = $('.overlay'),
      isClosed = false;

      trigger.click(function () {
          hamburger_cross();      
      });

      function hamburger_cross() {

          if (isClosed == true) {          
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {   
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });  
});
</script>

</html>
