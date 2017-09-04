<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<h1 class="text-center">Histórico de movimentações</h1>
	<hr>

	<table class="table table-bordered">
		<thead class="table-inverse">
			<tr>
				<td class='text-center' scope="row"><b>#</b></td>
				<td class='text-center'><b>Produto</b></td>
				<td class='text-center'><b>Tipo</b></td>
				<td class='text-center'><b>Quantidade</b></td>
				<td class='text-center'><b>Valor</b></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$contador = 0;
			foreach ($historico as $h): ?>
			<tr>
				<th class='text-center' scope="row"><?=$h->id;?></td>
				<?php foreach ($produtos as $produto):
					if($produto->id == $h->id_produto){
				?>
						<td class='text-center'><?=$produto->descricao;?></td>
				<?php
						$valormov = $produto->preco*$h->qtd;
						break;
					}
				endforeach;?>

				<td class='text-center'><?=$h->movimentacao;?></td>
				<td class='text-center'><?=$h->qtd;?></td>
				<td class='text-center'>
					<?php
					if($h->movimentacao == 'Venda')
					{
						echo "<span class='text-success'>+ R$ " . $valormov . "</span>";
					} else 
					{
						echo "<span class='text-danger'>- R$ " . $valormov . "</span>";
					}

					?>
				</td>
			</tr>
			<?php $contador++; endforeach;?>
		</tbody>
	</table>
	<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>

</div>