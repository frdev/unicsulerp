<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<h1>Produto <?=$produto->descricao;?></h1>
	<hr>
	<div class="row">
		<div class="col-4">
			<p>
				Está armazenado em:
				<span><b><?=$produto->arm_desc;?></b></span>
			</p>
			<p>
				Categoria: 
				<span><b><?=$produto->cat_desc;?></b></span>
			</p>
		</div>
		<div class="col-4">
			<p>
				<h5>Preço Unitário</h5>
				<span>R$ <?=$produto->valor;?></span>
			</p>
			<p>
				<h5>Quantidade</h5>
				<span><?=$produto->qtd;?></span>
			</p>
			<p>
				<h5>Ponto de acionamento</h5>
				<span><?=$produto->acionamento;?></span>
			</p>
			<p>
				<h5>Quantidade Mínima</h5>
				<span><?=$produto->qtdmin;?></span>
			</p>
			<p>
				<h5>Quantidade Máxima</h5>
				<span><?=$produto->qtdmax;?></span>
			</p>
		</div>
		<div class="col-4">
			<p>
				<h5>Valor total em estoque</h5>
				<p>R$ <?=($produto->qtd*$produto->valor);?></p>
			</p>
			<p>
				<h5>Status de Reposição</h5>
				<p>
					<?php
						if($produto->qtd < $produto->acionamento){
							echo '<span class="text-danger"><b>Necessária a compra</b></span>';
						} else {
							echo '<span><b>Não há necessidade de Reposição</b></span>';
						}
					?>
				</p>
			</p>
		</div>
	</div>
	<h1>Histórico do Produto <?=$produto->descricao;?></h1>
	<hr>
	<table class="table table-bordered">
		<thead class="table-inverse">
			<tr>
				<td class='text-center'><b>Qtd</b></td>
				<td class='text-center'><b>Tipo movimentação</b></td>
				<td class='text-center'><b>Valor Total</b></td>
				<td class='text-center'><b>Solicitação</b></td>
			</tr>
		</thead>
		<tbody class="text-center">
			<?php
			$contador = 0;
			foreach ($historico as $h): ?>
			<tr>
				<td><?=$h->qtd?></td>
				<td>
					<?php
						if($h->tipo_movimentacao == 0){
							echo "Compra";
							$url = 'compras/info/'.$h->id_solicitacao;
						} else if($h->tipo_movimentacao == 1){
							echo "Venda";
							$url = 'vendas/info/'.$h->id_solicitacao;
						} else if($h->tipo_movimentacao == 2){
							echo "Reposição";
							$url = 'reposicoes/info/'.$h->id_solicitacao;
						} else if($h->tipo_movimentacao == 3){
							echo "Produção";
							$url = 'posicoes/info/'.$h->id_solicitacao;
						}

					?>
				</td>
				<td>
					<?php
						if($h->tipo_movimentacao != 1){
							echo "<span class='text-danger'>- R$ " . $h->valor . "</span>";
						} else {
							echo "<span class='text-success'>+ R$ " . $h->valor . "</span>";
						}
					?>
				</td>
				<td><a href="<?=base_url($url);?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></td>
			</tr>
			<?php $contador++; endforeach;?>
		</tbody>
	</table>
	<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
	<a href="<?=base_url('produtos/listarprodutos')?>" class="btn btn-md btn-dark">Voltar</a>
</div>