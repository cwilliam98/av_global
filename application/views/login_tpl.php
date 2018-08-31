<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Login</title>

  <!-- Bootstrap -->
  <link href="<?=base_url('/assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style> 
    .formBox{
      margin-top: 90px;
      padding: 50px;
    }
    .formBox  h2{
      margin: 0;
      padding: 0;
      text-align: center;
      margin-bottom: 50px;
      text-transform: uppercase;
      font-size: 48px;
    }
    .inputBox{
      position: relative;
      box-sizing: border-box;
      margin-bottom: 50px;
    }
    .inputBox .inputText{
      position: absolute;
      font-size: 24px;
      line-height: 50px;
      transition: .5s;
      opacity: .5;
    }
    .inputBox .input{
      position: relative;
      width: 100%;
      height: 50px;
      background: transparent;
      border: none;
      outline: none;
      font-size: 24px;
      border-bottom: 1px solid rgba(0,0,0,.5);

    }
    .focus .inputText{
      transform: translateY(-30px);
      font-size: 18px;
      opacity: 1;
      color: #000;

    }
    body{
    background:#BFEFFF;
    } 
  </style>
</head>
<body>

  

  <div class="container-fluid">
    <div class="container">
      <div class="formBox">
        <form method="post" action="<?php echo base_url('login/logon')?>" id="cadastra_perguntas">
            <?php if($this->input->get('aviso')==2): ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Errooo!</strong> Usuário ou senha inválidos.
            </div>
            <?php endif ?>
            
              <div class="col-sm-6 col-sm-offset-3">
                <h2> 
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                Login
                </h2>
              </div>

            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="inputBox">
                  <div class="inputText">Código</div>
                   <input type="number" class="input" id="codigo" name="codigo" autofocus>
                </div>
              
                <div class="inputBox">
                  <div class="inputText">Senha</div>
                  <input type="password" class="input" id="senha" name="senha" autofocus>
                </div>
              </div>
            </div>

            
            
              <div class="col-sm-6 col-sm-offset-3">
                <button type="submit"  id="cadastrar" class="btn btn-lg btn-success btn-block"> 
                <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                Login
                </button>
              </div>
            
        </form>
        <div class="col-md-6 col-sm-offset-3">
          <h3>Instruções de Login</h3>
          <p>Acesse com o seu Usuário e Senha do Portal Acadêmico</p>
        </div>
      </div>
    </div>
  </div>



   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url('/assets/js/bootstrap.min.js')?>"></script>
</body>
<script>
  setTimeout(function(){
    $('button.close').click()
  },2000)
  
   
  $(".input").focus(function() {
    $(this).parent().addClass("focus");
  })
 </script>

</html>
