<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<div class="col-12">
		<h2 class="text-center">Solicitação de Compra do Item <?=$produto->descricao;?></h2>
		<hr>
	</div>
	<div class="col-12">
		<h4 class="text-center">Informações atuais</h4>
		<br>
	</div>
	<div class="row text-center">
		<div class="col-3">
			<p><b>Quantidade: </b><?=$produto->qtd;?></p>
		</div>
		<div class="col-3">
			<p><b>Ponto de acionamento: </b><?=$produto->acionamento;?></p>
		</div>
		<div class="col-3">
			<p><b>Quantidade mínima: </b><?=$produto->min;?></p>
		</div>
		<div class="col-3">
			<p><b>Quantidade máxima: </b><?=$produto->max;?></p>
		</div>
	</div>
	<hr>
	<form action="<?=base_url('compras/salvar')?>" method="post" name="form_add">
		<div class="row">
			<div class="form-group col-3">
				<label for="usuario">Usuário</label>
				<select id="usuario" name="usuario" class="form-control" required>
				<option value=""></option>
				<?php
					foreach($usuarios as $usuario):
						echo "<option value='" . $usuario->id . "'>" . $usuario->usuario . "</option>";
					endforeach;
				?>
				</select>
			</div>
			<div class="form-group col-2">
				<input type="hidden" id="idproduto" name="idproduto" value="<?=$produto->id;?>" />
				<label for="qtdcomprar">Qtd à Comprar</label>
				<input type="number" class="form-control" id="qtdcomprar" name="qtdcomprar" required>
			</div>
			<div class="form-group col-2">
				<label for="valor">Valor Total da Compra</label>
				<input type="text" class="form-control" id="valor" name="valor" placeholder="R$" required>
			</div>
			<div class="form-group col-5">
				<label for="fornecedor">Fornecedor</label>
				<select id="fornecedor" name="fornecedor" class="form-control" required>
					<option value=""></option>
					<?php
						foreach($fornecedores as $fornecedor):
							echo "<option value='" . $fornecedor->id . "'>" . $fornecedor->fantasia . "</option>";
						endforeach;
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<input type="submit" class="btn btn-md btn-success" value="Solicitar">
				<a href="<?=base_url('compras/index')?>" class="btn btn-md btn-light">Voltar</a>
			</div>
		</div>
	</form>
</div>