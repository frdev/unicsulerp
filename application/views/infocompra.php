<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>

<div class="container">
	<h3 class="text-center">
		Informações da Compra - 
		<?php
			foreach($produtos as $produto):
				if($produto->id == $compra->id_produto)
				{
					echo $produto->descricao;
					break;
				}
			endforeach;
		?>
	</h3>
	<hr>
	<div class="row">
		<div class="col-4">
			<p><b>Compra efetuada com o Fornecedor: </b></p>
			<p>
				<?php
					foreach($fornecedores as $fornecedor):
						if($fornecedor->id == $compra->id_fornecedor)
						{
							echo $fornecedor->fantasia;
							break;
						}
					endforeach;
				?>
			</p>
		</div>
		<div class="col-4">
			<p><b>Usuário solicitante: </b></p>
			<p>
				<?php
					foreach($usuarios as $usuario):
						if($usuario->id == $compra->id_usuario)
						{
							echo $usuario->usuario;
							break;
						}
					endforeach;
				?>
			</p>
		</div>
		<div class="col-2">
			<p><b>Quantidade: </b></p>
			<p><?=$compra->qtd?></p>
		</div>
		<div class="col-2">
			<p><b>Valor da Compra: </b></p>
			<p>R$ <?=$compra->valor?></p>
		</div>
	</div>
	<div class="row">
			<div class="col-4">
				<p><b>Status</b></p>
				<p>
				<?php
				if($compra->status == 0)
				{
					echo "Cancelado";
				} else if($compra->status == 1)
				{
					echo "Aguardando Aprovação";
				} else if ($compra->status == 2)
				{
					echo "Aprovada";
				} else if($compra->status == 3)
				{
					echo "Aguardando Entrega";
				} else if($compra->status == 4)
				{
					echo "Entregue";
				}
				?>
			</p>
		</div>
		<div class="col-2">
			<p><b>Data Solicitação</b></p>
			<p><?=$compra->datasolicitacao;?></p>
		</div>
		<div class="col-2">
			<p><b>Data Aprovação</b></p>
			<p><?=($compra->dataaprovado != NULL)? $compra->dataaprovado : "-";?></p>
		</div>
		<div class="col-2">
			<p><b>Data Entregue</b></p>
			<p><?=($compra->dataentregue != NULL)? $compra->dataentregue : "-";?></p>
		</div>
	</div>
	<div class="row">
		<?php
			if($compra->status == 1){
		?>
			<a href="<?=base_url('compras/aprovarcompra/' . $compra->id)?>" class="btn btn-md btn-success">Aprovar Compra</a>
		<?php } ?>
		<?php
			if($compra->status == 2){
		?>
			<a href="<?=base_url('compras/aguardarentrega/' . $compra->id)?>" class="btn btn-md btn-primary">Aguardar Entrega</a>
		<?php } ?>
		<?php
			if($compra->status == 3){
		?>
			<a href="<?=base_url('compras/receberentrega/' . $compra->id)?>" class="btn btn-md btn-secondary">Receber Entrega</a>
		<?php } ?>
		<a style="margin-left: 1.5%;" href="<?=base_url('compras/index')?>" class="btn btn-md btn-light">Voltar</a>
	</div>
</div>