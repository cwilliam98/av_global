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
    .navbar-inverse{border-color:#222}
    .text-white{color:#fff;}
    .sidebar-nav li a{color:#fff;}

    .navbar-toggle{color: white;}
    .btn{padding-left: 20px;}
</style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <button type="button" class="navbar-toggle collapsed" id="abrir" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="<?php echo base_url('administrador/admin')?>" id="cadastra_pergunta"><span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span> <?php $usuario =$this->session->userdata('usuario'); 
                    echo $usuario['nome'];
                    ?> </a>
                </li>
            </ul>

        </nav>
        <div id="wrapper">

            <!-- Sidebar -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <nav class="navbar navbar-inverse" id="sidebar-wrapper" role="navigation">
                    <ul class="sidebar-nav">

                        <li class="sidebar-brand">

                        </li>

                        <li>
                            <a href="<?php echo base_url('professor/admin')?>" id="cadastra_pergunta"><span class="glyphicon glyphicon glyphicon-home" aria-hidden="true"></span> Home </a>
                        </li>

                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-collapse-down"></span> Cadastrar</a>
                          <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header"></li>
                            <li>
                                <a href="<?php echo base_url('professor/perguntas/cadastra')?>" id="cadastra_pergunta"><span class="glyphicon glyphicon glyphicon-pencil" aria-hidden="true"></span> Questões</a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url('professor/provas/index')?>" id="cadastrar_provas"><span class="glyphicon glyphicon glyphicon-book" aria-hidden="true"></span> Provas</a>
                            </li>            
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url('professor/perguntas/index')?>" id="perguntas_cadastradas"> <span class="glyphicon glyphicon glyphicon-list" aria-hidden="true"></span> Perguntas cadastradas </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('professor/provas/acompanhaProvas')?>" id="acompanha_provas"> <span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="true"></span> Acompanhar provas </a>
                    </li>


                    <li>
                        <a href="<?php echo base_url('professor/perguntas/geraGabarito')?>"> <span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span> Gera gabarito </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-collapse-down"></span> Relatórios</a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header"></li>
                            <li>
                                <a href="<?php echo base_url('professor/admin/acertosPorQuestoes')?>"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Quantidades de acertos</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('professor/admin/acertosPorAluno')?>"> <span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Acertos por aluno</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <form method="post" action="<?php echo base_url('login/logout')?>" id="cadastra_perguntas">                                  
                            <button type="submit"  id="cadastrar" class="btn btn-link"> 
                                <span class="glyphicon glyphicon-log-out"></span>
                                Sair
                            </button>
                        </form>  
                    </li>                  
                </ul>
            </nav>
        </div>
    </div>

    <!-- /#sidebar-wrapper -->
    <br>
    <br>
    <br>
    <?php if($this->input->get('aviso')==1) { ?>  
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">  
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Sucesso!</strong> Registro inserido com sucesso.
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if($this->input->get('aviso')==2) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">  
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Errooo!</strong> Registro não inserido.
                </div>
            </div>
        </div>
    </div>
    <?php } ?>


    <!-- Page Content -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                &nbsp <ol class="breadcrumb">
                    <div class="item">
                       <a href=""> <?php print_r($this->uri->segment(1)) ?></a>
                       /
                       <a href=""> <?php print_r($this->uri->segment(2)) ?></a>
                       /
                       <a href=""> <?php print_r($this->uri->segment(3)) ?></a>
                   </ol>
               </div>
           </div>
       </div>



   </body>
   <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
   <script>
    setTimeout(function(){
        $('button.close').click()
    },2000);

</script>
<script type="text/javascript">

    $('#wrapper').toggleClass('toggled');
</script>

</html>
