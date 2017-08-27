<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<h1 class='text-center'>Usuário <?=$usuario->nome;?></h1>
	<hr>
		<form action="<?=base_url('usuarios/salvar');?>" name="form_add" method="post">
			<div class="row">
				<input type="hidden" name="id" id="id" value="<?=$usuario->id;?>" />
				<div class="form-group col-md-4">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" value="<?=$usuario->nome;?>" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="usuario">Usuário</label>
					<input type="text" class="form-control" id="usuario" name="usuario" value="<?=$usuario->usuario;?>" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" value="<?=$usuario->senha;?>" required/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?=$usuario->email;?>" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="permissao">Permissão</label>
					<select class="form-control" id="permissao" name="permissao" required>
						<option value='20'>Comum</option>
						<option value='10'>Admin</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="status">Status</label>
					<select class="form-control" id="status" name="status" required>
						<option value='1'>Ativo</option>
						<option value='0'>Inativo</option>
					</select>
				</div>
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Editar"/>
					<a href="<?=base_url('usuarios/listarusuarios');?>" class="btn btn-md btn-light">Voltar</a>
				</div> 
			</div>
		</form>
	</div>
</div>