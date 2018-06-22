<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

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
                        Start Bootstrap
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
                    <a href="" id="cadastrar_alunos">Cadastrar alunos</a>
                </li>
				
				<li>
                    <a href="" id="cadastrar_disciplina">Cadastrar disciplina</a>
                </li>

            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid" id="coisas">
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

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
		
		$("#cadastrar_alunos").click(function(e){
            e.preventDefault();
            $.get('<?php echo base_url('alunos/index') ?>', function(data){

                $('#coisas').html(data);

            });
        });

		$("#cadastrar_disciplina").click(function(e){
            e.preventDefault();
            $.get('<?php echo base_url('disciplinas/index') ?>', function(data){

                $('#coisas').html(data);

            });
        });



  </script>

</body>

</html>
