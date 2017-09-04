<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>

<div class="container">
	<br>
	<p class="col-md-2 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Novo Fornecedor</a>
	</p>
	<h1 class='text-center'>Fornecedores</h1>
	<div class="collapse" id="testeCollapse">
		<hr>
		<form action="<?=base_url('fornecedores/salvar');?>" name="form_add" method="post">
			<div class="row">
				<div class="form-group col-md-3">
					<label for="cnpj">CNPJ</label>
					<input type="text" class="form-control" id="cnpj" name="cnpj" required/>
				</div>
				<div class="form-group col-md-5">
					<label for="razao">Razão Social</label>
					<input type="text" class="form-control" id="razao" name="razao" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="fantasia">Nome Fantasia</label>
					<input type="text" class="form-control" id="fantasia" name="fantasia" required/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-5">
					<label for="responsavel">Responsável</label>
					<input type="text" class="form-control" id="responsavel" name="responsavel" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone" required/>
				</div>
				<div class="form-group col-md-5">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" required/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="cep">CEP</label>
					<input type="text" class="form-control" id="cep" name="cep" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="logradouro">Logradouro</label>
					<input type="text" class="form-control" id="logradouro" name="logradouro" required/>
				</div>
				<div class="form-group col-md-1">
					<label for="numero">Nº</label>
					<input type="text" class="form-control" id="numero" name="numero" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="complemento">Complemento</label>
					<input type="text" class="form-control" id="complemento" name="complemento" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="cidade">Cidade</label>
					<input type="text" class="form-control" id="cidade" name="cidade" required/>
				</div>
				<div class="form-group col-md-1">
					<label for="estado">UF</label>
					<input type="text" class="form-control" id="estado" name="estado" required/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Cadastrar"/>
					<input type="reset" class="btn btn-md btn-light" value="Limpar"/>
				</div> 
			</div>
		</form>
	</div>
	<hr>
	<table class="table table-bordered">
		<thead class="table-inverse">
			<tr>
				<td class='text-center'><b>CNPJ</b></td>
				<td class='text-center'><b>Razão Social</b></td>
				<td class='text-center'><b>Nome Fantasia</b></td>
				<td class='text-center'><b>Status</b></td>
				<td class='text-center'><b>Ações</b></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$contador = 0;
			foreach ($fornecedores as $fornecedor): ?>
			<tr>
				<td class='text-center'><?=$fornecedor->cnpj;?></td>
				<td class='text-center'><?=$fornecedor->razaosocial;?></td>
				<td class='text-center'><?=$fornecedor->fantasia;?></td>
				<td class='text-center'><?=$fornecedor->status;?></td>
				<td class='text-center'>
				<a class="btn btn-sm btn-primary" href="<?=base_url('/fornecedores/info/' . $fornecedor->id)?>"><i class="fa fa-info" aria-hidden="true"></i></a>
				<a class="btn btn-sm btn-warning" href="<?=base_url('/fornecedores/editar/' . $fornecedor->id)?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<a class="btn btn-sm btn-danger" href="<?=base_url('/fornecedores/apagar/' . $fornecedor->id)?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			<?php $contador++; endforeach;?>
		</tbody>
	</table>
	<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
</div>