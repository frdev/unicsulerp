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

    <!--JQUERY-->
    <script src="/unicsulerp/js/jquery-3.2.1.min.js" type="text/javascript"></script>

    <!-- Custom styles for this template -->
    <link href="/unicsulerp/bootstrap/css/sticky-footer.css" rel="stylesheet">

    <!-- Font awesome -->
    <link href="/unicsulerp/awesome/css/font-awesome.min.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Controle de Estoque</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estoque</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?=base_url('usuarios/listarusuarios')?>">Usuários</a>
              <a class="dropdown-item" href="<?=base_url('produtos/listarprodutos')?>">Estoque</a>
              <a class="dropdown-item" href="<?=base_url('categorias/index')?>">Categorias de Produto</a>
              <a class="dropdown-item" href="<?=base_url('setores/index')?>">Setores</a>
              <a class="dropdown-item" href="<?=base_url('armazens/index')?>">Armazéns</a>
              <a class="dropdown-item" href="<?=base_url('fornecedores/index')?>">Fornecedores</a>
              <a class="dropdown-item" href="<?=base_url('departamentos/index')?>">Departamentos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Solicitações</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="<?=base_url('compras/index')?>">Compras</a>
              <a class="dropdown-item" href="<?=base_url('vendas/index')?>">Vendas</a>
              <a class="dropdown-item" href="<?=base_url('producoes/index')?>">Produções</a>
              <a class="dropdown-item" href="<?=base_url('reposicoes/index')?>">Reposições de Usuários</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('login/logout');?>">Sair</a>
          </li>
        </ul>
      </div>
    </nav>