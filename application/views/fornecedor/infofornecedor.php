<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Fornecedor <?=$fornecedor->fantasia;?></h1>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-3">
			<h3>CNPJ</h3>
			<p><?=$fornecedor->cnpj;?></p>
		</div>
		<div class="col-4">
			<h3>Razão Social</h3>
			<p><?=$fornecedor->razaosocial;?></p>
		</div>
		<div class="col-4">
			<h3>Nome Fantasia</h3>
			<p><?=$fornecedor->fantasia;?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-3">
			<h3>Responsavel</h3>
			<p><?=$fornecedor->responsavel;?></p>
		</div>
		<div class="col-4">
			<h3>E-mail</h3>
			<p><?=$fornecedor->email;?></p>
		</div>
		<div class="col-3">
			<h3>Telefone</h3>
			<p><?=$fornecedor->telefone;?></p>
		</div>
		<div class="col-2">
			<h3>Status</h3>
			<p><?=$fornecedor->status;?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h3>Endereço</h3>
			<p><?=$fornecedor->logradouro . ", " . $fornecedor->numero . ", " . $fornecedor->complemento . " - CEP " . $fornecedor->cep . " - " . $fornecedor->cidade . "/" . $fornecedor->uf;?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12 text-center">
		<a href="<?=base_url('fornecedores/index')?>" class="btn btn-md btn-dark">Voltar</a>
		</div>
	</div>
</div>