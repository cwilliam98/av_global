<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>


	<link href="<?=base_url('/assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('/assets/css/shop-homepage.css')?>" rel="stylesheet">


  </head>

  <body>

    <!-- Navigation -->
      <div class="container">
      <div class="row">
	    <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Avaliacao Global</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
			 <!--
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
			 -->
          </ul>
        </div>
    </nav>
        </div>
        </div>
      </div>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
		
          <p class="my-4"><?php echo $this->session->userdata('nome'); ?></p>
          <div class="list-group">
           	<a href="<?php echo base_url('/perguntas/cadastra')?>" class="list-group-item">Cadastrar nova pergunta</a>
           	<a href="<?php echo base_url('/provas/index')?>" class="list-group-item">Gerar provas</a>
           <a href="<?php echo base_url('/perguntas/index')?>" class="list-group-item">Perguntas cadastradas</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas aliquam vulputate odio id efficitur. Nunc massa elit, gravida et nisi et, condimentum scelerisque sem. Sed mollis volutpat lectus. 
				Nullam ac condimentum velit, nec eleifend nulla. Proin vel elit vehicula, consequat enim eget, sollicitudin velit. Aliquam vitae semper tortor, eu volutpat orci. Pellentesque maximus dolor eget quam sollicitudin
				ultrices. Suspendisse ultrices tortor lacus, a fringilla lacus placerat a. Maecenas luctus massa ut risus placerat blandit.
				</p>
				<p>
				Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque volutpat interdum suscipit. Pellentesque fringilla elit at erat congue ultricies eget et lacus. Aenean suscipit, 
				enim eget molestie hendrerit, nunc turpis venenatis orci, vitae imperdiet leo sapien et arcu. Ut et purus ut justo posuere auctor. Aliquam sed quam condimentum, interdum lectus vitae, euismod elit. Mauris pharetra 
				posuere dui eget vestibulum. Integer luctus ex sem, in ultrices ante malesuada sed. Sed accumsan lorem sit amet metus dapibus vulputate. Nulla semper turpis quis felis sollicitudin, non sollicitudin mauris lobortis. 
				Nam fringilla iaculis turpis. Quisque id mi ac tellus pulvinar fringilla ac vitae turpis.
				</p>
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
	</br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Cristian Albrecht 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
	<script href="<?=base_url('/assets/vendor/jquery/jquery.min.js')?>"></script>
	<script href="<?=base_url('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
   
   
  </body>

</html>
