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
			<p>R$ <?=$venda->qtd*$produto->valor?></p>
		</div>
		<div class="col-2">
			<p><b>Status</b></p>
			<p>
				<?php
				if($venda->status == 0)
				{
					echo "<span class='text-danger'>Cancelado</span>";
				} else if($venda->status == 1)
				{
					echo "Aguardando Aprovação";
				} else if ($venda->status == 2)
				{
					echo "<b>Aprovada</b>";
				}
				?>
			</p>
		</div>
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
		<div class="col-2">
			<p><b>NF de Venda</b></p>
			<p><?=$venda->nfvenda != NULL ? $venda->nfvenda : "-"?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?php
			if($venda->status == 1){
			?>
				<form method="post" action="<?=base_url('vendas/aprovarvenda');?>">
					<input type="hidden" id="id" name="id" value="<?=$venda->id?>" />
					<div class="row">
						<div class="form-group col-3">
							<label for="nf">NF de Venda</label>
							<input class=form-control type="text" id="nf" name="nf" required />
						</div>
						<div class="form-group col-3">
							<button type="submit" style="margin-top: 12%;" class="btn btn-md btn-success">Aprovar Venda</button>
						</div>
					</div>
				</form>
			<?php } ?>
			<a href="<?=base_url('vendas/index')?>" class="btn btn-md btn-secondary">Voltar</a>
		</div>
	</div>
</div>