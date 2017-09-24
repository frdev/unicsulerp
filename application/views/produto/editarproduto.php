<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<h1 class='text-center'>Produto <?=$produto->descricao;?></h1>
	<hr>
	<div class="row">
		<hr>
		<form action="<?=base_url('produtos/salvar');?>" name="form_add" method="post">
			<div class="row">
				<input type="hidden" name="id" id="id" value="<?=$produto->id;?>" />
				<div class="form-group col-md-5">
					<label for="descricao">Descrição do Produto</label>
					<input type="text" class="form-control" id="descricao" name="descricao" value="<?=$produto->descricao;?>" />
				</div>
				<div class="form-group col-md-3">
					<label for="tipo">Tipo do Produto</label>
					<select class="form-control" id="tipo" name="tipo">
						<?php if($produto->tipo == "0"):?>
							<option value="0" selected>Produto Acabado</option>
							<option value="1">Matéria-prima</option>
							<option value="2">Material de Insumo</option>
						<?php endif;?>
						<?php if($produto->tipo == "1"):?>
							<option value="0">Produto Acabado</option>
							<option value="1" selected>Matéria-prima</option>
							<option value="2">Material de Insumo</option>
						<?php endif;?>
						<?php if($produto->tipo == "2"):?>
							<option value="0">Produto Acabado</option>
							<option value="1">Matéria-prima</option>
							<option value="2" selected>Material de Insumo</option>
						<?php endif;?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="preco">Valor Unitário</label>
					<input type="number" class="form-control" id="preco" name="preco" placeholder="R$" value="<?=$produto->preco;?>"/>
				</div>
				<div class="form-group col-md-2">
					<label for="qtd">Quantidade</label>
					<input type="number" class="form-control" id="qtd" name="qtd" value="<?=$produto->qtd;?>"/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="acionamento">Pnt. Acionamento</label>
					<input type="number" class="form-control" id="acionamento" name="acionamento" value="<?=$produto->acionamento;?>"/>
				</div>
				<div class="form-group col-md-2">
				<label for="qtdmax">Estoque mínimo</label>
					<input type="number" class="form-control" id="qtdmin" name="qtdmin" value="<?=$produto->min;?>"/>
				</div>
				<div class="form-group col-md-2">
				<label for="qtdmax">Estoque máximo</label>
					<input type="number" class="form-control" id="qtdmax" name="qtdmax" value="<?=$produto->max;?>" />
				</div>
				<div class="form-group col-md-2">
					<label for="status">Status</label>
					<select class="form-control" id="status" name="status">
						<?php if($produto->status == 0):?>
							<option value='1'>Ativo</option>
							<option value='0' selected>Inativo</option>
						<?php endif;?>
						<?php if($produto->status == 1):?>
							<option value='1' selected>Ativo</option>
							<option value='0'>Inativo</option>
						<?php endif;?>
					</select>
				</div>
				<div class="form-group col-lg-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Alterar"/>
					<a href="<?=base_url('/produtos/listarprodutos');?>" class="btn btn-md btn-light">Cancelar</a>
				</div> 
			</div>
		</form>
		<hr>
	</div>
</div>