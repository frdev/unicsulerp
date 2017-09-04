<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<h1 class='text-center'>Fornecedor <?=$fornecedor->fantasia;?></h1>
	<hr>
		<form action="<?=base_url('fornecedores/salvar');?>" name="form_add" method="post">
			<input type="hidden" name="id" value="<?=$fornecedor->id;?>" />
			<div class="row">
				<div class="form-group col-md-3">
					<label for="cnpj">CNPJ</label>
					<input type="text" name="cnpj" id="cnpj" class="form-control" value="<?=$fornecedor->cnpj;?>" required/>
				</div>
				<div class="form-group col-md-5">
					<label for="razao">Razão Social</label>
					<input type="text" name="razao" id="razao" class="form-control" value="<?=$fornecedor->razaosocial;?>" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="fantasia">Nome Fantasia</label>
					<input type="text" name="fantasia" id="fantasia" class="form-control" value="<?=$fornecedor->fantasia;?>" required/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="responsavel">Responsável</label>
					<input type="text" class="form-control" id="responsavel" name="responsavel" value="<?=$fornecedor->responsavel;?>" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="telefone">Telefone</label>
					<input type="text" class="form-control" id="telefone" name="telefone" value="<?=$fornecedor->telefone;?>" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?=$fornecedor->email;?>" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="status">Status</label>
					<select id="status" name="status" class="form-control" required>
						<?php
							if($fornecedor->status == 'Ativo')
							{
								echo "<option value='Ativo' selected>Ativo</option>";
								echo "<option value='Inativo'>Inativo</option>";
							} else 
							{
								echo "<option value='Ativo'>Ativo</option>";
								echo "<option value='Inativo' selected>Inativo</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="cep">CEP</label>
					<input type="text" class="form-control" id="cep" name="cep" value="<?=$fornecedor->cep;?>" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="logradouro">Logradouro</label>
					<input type="text" class="form-control" id="logradouro" name="logradouro" value="<?=$fornecedor->logradouro;?>" required/>
				</div>
				<div class="form-group col-md-1">
					<label for="numero">Nº</label>
					<input type="text" class="form-control" id="numero" name="numero" value="<?=$fornecedor->numero;?>" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="complemento">Complemento</label>
					<input type="text" class="form-control" id="complemento" name="complemento" value="<?=$fornecedor->complemento;?>" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="cidade">Cidade</label>
					<input type="text" class="form-control" id="cidade" name="cidade" value="<?=$fornecedor->cidade;?>" required/>
					</div>
				<div class="form-group col-md-1">
					<label for="estado">UF</label>
					<input type="text" class="form-control" id="estado" name="estado" value="<?=$fornecedor->uf;?>" required/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Alterar"/>
					<a href="<?=base_url('fornecedores/index')?>" class="btn btn-md btn-light">Voltar</a>
				</div> 
			</div>
		</form>
	</div>
</div>