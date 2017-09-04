<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favctc.ico">

    <title>Controle de Estoque</title>

    <!-- Bootstrap core CSS 
    <link href="/ci/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/unicsulerp/bootstrap/css/sticky-footer.css" rel="stylesheet">

    <!-- Font awesome -->
    <link href="/unicsulerp/awesome/css/font-awesome.min.css" rel="stylesheet">

  </head>
  	<body>
		<div class="container">
			<div class="row" style="margin-top: 9.5%;">
				<div class="col-4"></div>
				<div class="col-4">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title text-center">Controle de Estoque</h4>
							<hr>
							<form action="<?=base_url('login/validarlogin')?>" method="post">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon1">@</span>
									<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" />
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">@</span>
									<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" />
								</div>
								<br>
								<input type="submit" class="btn btn-success" value="Entrar">
								<input type="reset" class="btn btn-light" value="Limpar">
							</form>
						</div>
					</div>
				</div>
				<div class="col-4"></div>
			</div>
		</div>
	<footer class="footer">
      <div class="container-fluid">
        <span class="text-muted">Projeto - Controle de Estoque - Unicsul 2017</span>
      </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>