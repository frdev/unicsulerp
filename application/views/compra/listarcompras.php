<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<p class="col-md-5 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#consumoCollapse" aria-expanded="false" aria-controls="consumoCollapse">Comprar Consumo</a>
		<a class="btn btn-primary" data-toggle="collapse" href="#materiaCollapse" aria-expanded="false" aria-controls="materiaCollapse">Comprar Matéria-Prima</a>
	</p>
	<h1 class="text-center">Solicitações de Compras</h1>
	<div class="collapse" id="consumoCollapse">
		<hr>
		<form id="form_compraconsumo" action="<?=base_url('compras/salvar');?>" method="post">
			<div class="row">
				<div class="form-group col-md-5">
					<label for="id_produto">Consumo</label>
					<select class="form-control" id="id_produto" name="id_produto" required>
						<option value=""></option>
						<?php
							foreach($consumos as $consumo):
								echo "<option value='" . $consumo->id ."'>" . $consumo->descricao . "</option>";
							endforeach;
						?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="qtd">Quantidade</label>
					<input type="text" class="form-control" id="qtd" name="qtd" required/>
				</div>
				<div class="form-group col-md-5" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Cadastrar"/>
					<input type="reset" class="btn btn-md btn-light" value="Limpar"/>
				</div> 
			</div>
		</form>
	</div>
	<div class="collapse" id="materiaCollapse">
		<hr>
		<form id="form_compramateria" action="<?=base_url('compras/salvar');?>" method="post">
			<div class="row">
				<div class="form-group col-md-5">
					<label for="id_produto">Matéria-prima</label>
					<select class="form-control" id="id_produto" name="id_produto" required>
						<option value=""></option>
						<?php
							foreach($materias as $materia):
								echo "<option value='" . $materia->id ."'>" . $materia->descricao . "</option>";
							endforeach;
						?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="qtd">Quantidade</label>
					<input type="text" class="form-control" id="qtd" name="qtd" required/>
				</div>
				<div class="form-group col-md-5" style="margin-top: 2.5%;">
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
				<td class='text-center' scope="row"><b>#</b></td>
				<td class='text-center'><b>Produto</b></td>
				<td class='text-center'><b>Valor Total</b></td>
				<td class='text-center'><b>Qtd</b></td>
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
				<?php foreach ($todos as $produto):
					if($produto->id == $compra->id_produto){
				?>
						<td class='text-center'><?=$produto->descricao;?></td>
				<?php
						break;
					}
				endforeach;?>
				<td class='text-center'><?=$compra->valor ? 'R$ ' . $compra->valor : '-';?></td>
				<td class='text-center'><?=$compra->qtd;?></td>
				<td class='text-center'>
				<?php
					if($compra->status == 0)
					{
						echo "Cancelado";
					} else if($compra->status == 1)
					{
						echo "Aguardando Orçamento";
					} else if ($compra->status == 2)
					{
						echo "Aguardando Aprovação";
					} else if($compra->status == 3)
					{
						echo "Aprovada, aguardando entrega";
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