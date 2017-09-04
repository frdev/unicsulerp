<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container text-center">
	<h1>Produto <?=$produto->descricao;?></h1>
	<hr>
	<h4>Tipo de produto</h4>
	<p>
		<?php if($produto->tipo == 0):?>
			Produto Acabado	
		<?php endif;?>
		<?php if($produto->tipo == 1):?>
			Matéria-prima	
		<?php endif;?>
		<?php if($produto->tipo == 2):?>
			Material de Insumo	
		<?php endif;?>
	</p>
	<h4>Status</h4>
	<p>
		<?php if($produto->status == 0):?>
			Inativo	
		<?php endif;?>
		<?php if($produto->status == 1):?>
			Ativo	
		<?php endif;?>
	</p>
	<h4>Preço Unitário</h4>
	<p>R$ <?=$produto->preco;?></p>
	<h4>Quantidade</h4>
	<p><?=$produto->qtd;?></p>
	<h4>Ponto de acionamento</h4>
	<p><?=$produto->acionamento;?></p>
	<h4>Valor total em estoque</h4>
	<p>R$ <?=($produto->qtd*$produto->preco);?></p>
	<a href="<?=base_url('produtos/listarprodutos')?>" class="btn btn-md btn-dark">Voltar</a>
</div>