<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<p class="col-md-2 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Nova Venda</a>
	</p>
	<h1 class="text-center">Solicitações de Vendas</h1>
	<div class="collapse" id="testeCollapse">
		<hr>
		<form id="form_venda" action="<?=base_url('vendas/salvar');?>" method="post">
			<div class="row">
				<div class="form-group col-md-5">
					<label for="id_produto">Produto</label>
					<select class="form-control" id="id_produto" name="id_produto" required>
						<option value=""></option>
						<?php
							foreach($produtos as $produto):
								if($produto->tipo == 0)
								{
									echo "<option value='" . $produto->id ."'>" . $produto->descricao . "</option>";
								}
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
			foreach ($vendas as $venda): ?>
			<tr>
				<th class='text-center' scope="row"><?=$venda->id;?></td>
				<?php foreach ($produtos as $produto):
					if($produto->id == $venda->id_produto){
				?>
						<td class='text-center'><?=$produto->descricao;?></td>
						<td class='text-center'>R$  	<?=$venda->qtd*$produto->valor;?></td>
				<?php
						break;
					}
				endforeach;?>
				<td class='text-center'><?=$venda->qtd;?></td>
				<td class='text-center'>
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
				</td>
				<td class='text-center'>
					<a href="<?=base_url('vendas/info/' . $venda->id)?>" class="btn btn-sm btn-primary">+Info</a>
				</td>
				<td class='text-center'>
					<?php if($venda->status != 2 && $venda->status != 0) { ?>
						<a href="<?=base_url('vendas/cancelar/' . $venda->id)?>" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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
<script type="text/javascript" src="/unicsulerp/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/unicsulerp/js/vendas.js"></script>