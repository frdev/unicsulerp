<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>

<div class="container">
	<h3 class="text-center">
		Informações da Venda - <?=$produto->descricao?>
	</h3>
	<hr>
	<div class="row">
		<div class="col-2">
			<p><b>Quantidade vendida: </b></p>
			<p><?=$venda->qtd;?></p>
		</div>
		<div class="col-2">
			<p><b>Quantidade: </b></p>
			<p><?=$venda->qtd?></p>
		</div>
		<div class="col-2">
			<p><b>Valor da Venda: </b></p>
			<p>R$ <?=$venda->qtd*$produto->preco?></p>
		</div>
		<div class="col-3">
			<p><b>Status</b></p>
			<p>
				<?php
				if($venda->status == 0)
				{
					echo "Cancelado";
				} else if($venda->status == 1)
				{
					echo "Aguardando Aprovação";
				} else if ($venda->status == 2)
				{
					echo "Aprovada";
				}
				?>
			</p>
		</div>
		<div class="col-2">
			<p><b>Estoque atual</b></p>
			<p><?=$produto->qtd;?></p>
		</div>
	</div>
	<div class="row">		
		<div class="col-2">
			<p><b>Data Solicitação</b></p>
			<p><?=$venda->datasolicitacao;?></p>
		</div>
		<div class="col-2">
			<p><b>Data Aprovação</b></p>
			<p><?=($venda->dataaprovada != NULL)? $venda->dataaprovada : "-";?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<?php
			if($venda->status == 1){
			?>
				<a style="margin-top: 9%;" href="<?=base_url('vendas/aprovarvenda/' . $venda->id)?>" class="btn btn-md btn-success">Aprovar Venda</a>
			<?php } ?>
			<a style="margin-top: 9%; margin-left: 1.5%;" href="<?=base_url('vendas/index')?>" class="btn btn-md btn-light">Voltar</a>
		</div>
	</div>
</div>