<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<p class="col-md-2 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Novo Produto</a>
	</p>
	<h1 class='text-center'>Produtos</h1>
	<div class="collapse" id="testeCollapse">
		<hr>
		<form action="<?=base_url('produtos/salvar');?>" name="form_add" method="post">
			<div class="row">
				<div class="form-group col-md-5">
					<label for="descricao">Descrição do Produto</label>
					<input type="text" class="form-control" id="descricao" name="descricao" />
				</div>
				<div class="form-group col-md-3">
					<label for="tipo">Tipo do Produto</label>
					<select class="form-control" id="tipo" name="tipo">
						<option value="0">Produto Acabado</option>
						<option value="1">Matéria-prima</option>
						<option value="2">Material de Insumo</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="preco">Valor Unitário</label>
					<input type="number" class="form-control" id="preco" name="preco" placeholder="R$" />
				</div>
				<div class="form-group col-md-2">
					<label for="qtd">Quantidade</label>
					<input type="number" class="form-control" id="qtd" name="qtd" />
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label for="acionamento">Ponto Acionamento</label>
					<input type="number" class="form-control" id="acionamento" name="acionamento">
				</div>
				<div class="form-group col-md-2">
				<label for="qtdmax">Estoque mínimo</label>
					<input type="number" class="form-control" id="qtdmin" name="qtdmin" />
				</div>
				<div class="form-group col-md-2">
				<label for="qtdmax">Estoque máximo</label>
					<input type="number" class="form-control" id="qtdmax" name="qtdmax" />
				</div>
				<div class="form-group col-md-2">
					<label for="status">Status</label>
					<select class="form-control" id="status" name="status">
						<option value='1'>Ativo</option>
						<option value='0'>Inativo</option>		
					</select>
				</div>
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Cadastrar"/>
					<input type="reset" class="btn btn-md btn-light" value="Limpar"/>
				</div>
			</div>
		</form>
	</div>
	<hr>
	<table class="table table-bordered">
		<thead class="table-inverse">
			<tr>
				<td><b>Produto</b></td>
				<td class='text-center'><b>Tipo</b></td>
				<td class='text-center'><b>Qtd</b></td>
				<td class='text-center'><b>Preço Unit.</b></td>
				<td class='text-center'><b>Reposição</b></td>
				<td class='text-center'><b>Ações</b></td>
			</tr>
		</thead>
		<tbody>
			<?php
				$contador = 0;
				foreach($produtos as $produto):
					echo '<tr>';
						echo '<td>' . $produto->descricao . '</td>';
						if($produto->tipo == 0){
							echo '<td class="text-center">Produto Acabado</td>';
						} else if($produto->tipo == 1){
							echo '<td class="text-center">Matéria-prima</td>';
						} else if($produto->tipo == 2){
							echo '<td class="text-center">Material de Insumo</td>';
						}
						echo '<td class="text-center">' . $produto->qtd . '</td>';
						echo '<td class="text-center">R$ ' . $produto->preco . '</td>';
						echo '<td class="text-center">';
			?>
			<?php
					if($produto->qtd <= $produto->acionamento)
					{
						if($produto->tipo == 0)
						{
			?>
						<a class="btn btn-sm btn-primary" href="<?=base_url('producao/produto/' . $produto->id);?>">Produzir</a>
			<?php			
						} else {
			?>
							<a class="btn btn-sm btn-primary" href="<?=base_url('compras/produto/' . $produto->id);?>">Comprar</a>
			<?php
						}
					} else
					{
						echo "Não há necessidade";
					}
						echo '</td>';
						echo '<td class="text-center">';

			?>
						<a class="btn btn-sm btn-primary" href="<?=base_url('/produtos/info/' . $produto->id);?>"><i class="fa fa-info" aria-hidden="true"></i></a>
						<a class="btn btn-sm btn-warning" href="<?=base_url('/produtos/editar/' . $produto->id);?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-sm btn-danger" href="<?=base_url('/produtos/apagar/' . $produto->id);?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
			<?php
						echo '</td>';
					echo '</tr>';
					$contador++;
				endforeach;
			?>
		</tbody>
	</table>
	<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
</div>