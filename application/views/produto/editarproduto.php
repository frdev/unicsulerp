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
					<input type="text" class="form-control" id="descricao" name="descricao" value="<?=$produto->descricao;?>" selected/>
				</div>
				<div class="form-group col-md-4">
					<label for="armazem">Armazém</label>
					<select class="form-control" id="armazem" name="armazem" selected>
						<?php foreach($armazens as $arm):
							if($arm->id == $produto->id_armazem){
								echo "<option value='" . $arm->id . "' selected>" . $arm->descricao . "</option>";
							} else {
								echo "<option value='" . $arm->id . "'>" . $arm->descricao . "</option>";
							}
						endforeach;?>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="categoria">Categoria</label>
					<select class="form-control" id="categoria" name="categoria" selected>
						<?php foreach($categorias as $cat):
							if($cat->id == $produto->id_categoria)
							{
								echo "<option value='" . $cat->id . "' selected>" . $cat->descricao . "</option>";
							} else 
							{
								echo "<option value='" . $cat->id . "'>" . $cat->descricao . "</option>";
							}
						endforeach; ?>
					</select>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="preco">Valor Unitário</label>
					<input type="number" class="form-control" id="preco" name="preco" placeholder="R$" value="<?=$produto->valor;?>"/>
				</div>
				<div class="form-group col-md-2">
					<label for="qtd">Quantidade</label>
					<input type="number" class="form-control" id="qtd" name="qtd" value="<?=$produto->qtd;?>"/>
				</div>
				<div class="form-group col-md-2">
				<label for="qtdmax">Estoque mínimo</label>
					<input type="number" class="form-control" id="qtdmin" name="qtdmin" value="<?=$produto->qtdmin;?>"/>
				</div>
				<div class="form-group col-md-2">
				<label for="qtdmax">Estoque máximo</label>
					<input type="number" class="form-control" id="qtdmax" name="qtdmax" value="<?=$produto->qtdmax;?>" />
				</div>
				<div class="form-group col-md-2">
					<label for="acionamento">Pnt. Acionamento</label>
					<input type="number" class="form-control" id="acionamento" name="acionamento" value="<?=$produto->acionamento;?>"/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-lg-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Alterar"/>
					<a href="<?=base_url('/produtos/listarprodutos');?>" class="btn btn-md btn-light">Cancelar</a>
				</div> 
			</div>
		</form>
		<hr>
	</div>
</div>