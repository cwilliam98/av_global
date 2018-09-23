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

</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <?php $usuario = $_SESSION['aluno']; 
                        echo $usuario['nome'];
                        ?>
                    </a>
                </li>
                <li>
                    <a href="" id="cadastra_pergunta">Cadastrar nova pergunta</a>
                </li>
                <li>
                    <a href="" id="cadastrar_provas">Cadastrar provas</a>
                </li>
                <li>
                    <a href="" id="perguntas_cadastradas">Perguntas cadastradas</a>
                </li>

                <li>
                    <a href="" id="acompanha_provas">Acompanhar provas</a>
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
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

    <script>
     setTimeout(function(){
        $('button.close').click()
    },2000);

     $("#wrapper").toggleClass("toggled");

     $("#cadastra_pergunta").click(function(e){
        e.preventDefault();
        $.get('<?php echo base_url('perguntas/cadastra') ?>', function(data){

            $('#coisas').html(data);

        });
    });

     $("#cadastrar_provas").click(function(e){
        e.preventDefault();
        $.get('<?php echo base_url('provas/index') ?>', function(data){

            $('#coisas').html(data);

        });
    });

     $("#perguntas_cadastradas").click(function(e){
        e.preventDefault();
        $.get('<?php echo base_url('perguntas/index') ?>', function(data){

            $('#coisas').html(data);

        });
    });

     $("#acompanha_provas").click(function(e){
        e.preventDefault();
        $.get('<?php echo base_url('provas/acompanhaProvas') ?>', function(data){

            $('#coisas').html(data);

        });
    });



</script>

</body>

</html>
