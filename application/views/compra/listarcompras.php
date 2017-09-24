<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<h1 class="text-center">Solicitações de Compras</h1>
	<hr>

	<table class="table table-bordered">
		<thead class="table-inverse">
			<tr>
				<td class='text-center' scope="row"><b>#</b></td>
				<td class='text-center'><b>Produto</b></td>
				<td class='text-center'><b>Qtd</b></td>
				<td class='text-center'><b>Valor Total</b></td>
				<td class='text-center'><b>Status</b></td>
				<td class='text-center'><b>Ações</b></td>
				<td class='text-center'><b>Cancelar</b></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$contador = 0;
			foreach ($compras as $compra): ?>
			<tr>
				<th class='text-center' scope="row"><?=$compra->id;?></td>
				<?php foreach ($produtos as $produto):
					if($produto->id == $compra->id_produto){
				?>
						<td class='text-center'><?=$produto->descricao;?></td>
				<?php
						break;
					}
				endforeach;?>
				<td class='text-center'><?=$compra->qtd;?></td>
				<td class='text-center'>R$ <?=$compra->valor;?></td>
				<td class='text-center'>
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
				</td>
				<td class='text-center'>
					<a href="<?=base_url('compras/info/' . $compra->id)?>" class="btn btn-sm btn-primary">+Info</a>
				</td>
				<td class='text-center'>
					<?php if($compra->status != 4 && $compra->status != 0) { ?>
						<a href="<?=base_url('compras/cancelarcompra/' . $compra->id)?>" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
					<?php } else {
							echo "-";
						} ?>
				</td>
			</tr>
			<?php $contador++; endforeach;?>
		</tbody>
	</table>
	<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>

</div>