<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<p class="col-md-2 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Nova Reposição</a>
	</p>
	<div class="collapse" id="testeCollapse">
		<hr>
		<form action="<?=base_url('reposicoes/salvar');?>" name="form_add" method="post">
			<div class="row">
				<div class="form-group col-md-4">
					<label for="id_produto">Produto</label>
					<select class="form-control" id="id_produto" name="id_produto" required>
						<option value=""></option>
						<?php
							foreach($produtos as $produto):
								echo "<option value='" . $produto->id ."'>" . $produto->descricao . "</option>";
							endforeach;
						?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="qtd">Quantidade</label>
					<input type="text" class="form-control" id="qtd" name="qtd" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="depto">Departamento</label>
					<select class="form-control" id="depto" name="depto" required>
						<?php
							foreach($departamentos as $depto):
								echo "<option value='" . $depto->id . "'>" . $depto->descricao . "</option>";
							endforeach;
						?>
					</select>
				</div>
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Solicitar"/>
					<input type="reset" class="btn btn-md btn-light" value="Limpar"/>
				</div> 
			</div>
		</form>
	</div>
	<h1 class="text-center">Solicitações de Usuários</h1>
	<hr>

	<table class="table table-bordered">
		<thead class="table-inverse">
			<tr>
				<td class='text-center' scope="row"><b>#</b></td>
				<td class='text-center'><b>Produto</b></td>
				<td class='text-center'><b>Qtd</b></td>
				<td class='text-center'><b>Departamento</b></td>
				<td class='text-center'><b>Status</b></td>
				<td class='text-center'><b>Data Solicitação</b></td>
				<td class='text-center'><b>Ações</b></td>
				<td class='text-center'><b>Cancelar</b></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$contador = 0;
			foreach ($reposicoes as $reposicao): ?>
			<tr>
				<th class='text-center' scope="row"><?=$reposicao->id;?></td>
				<?php foreach ($produtos as $produto):
					if($produto->id == $reposicao->id_produto){
				?>
						<td class='text-center'><?=$produto->descricao;?></td>
				<?php
						break;
					}
				endforeach;?>
				<td class='text-center'><?=$reposicao->qtd;?></td>
				<td class='text-center'>
					<?php
						foreach($departamentos as $depto):
							if($depto->id == $reposicao->id_departamento)
							{
								echo $depto->descricao;
								break;
							}
						endforeach;
					?>
				</td>
				<td class='text-center'>
				<?php
					if($reposicao->status == 0)
					{
						echo "Cancelado";
					} else if($reposicao->status == 1)
					{
						echo "Aguardando Aprovação";
					} else if ($reposicao->status == 2)
					{
						echo "Aprovada";
					}
				?>
				</td>
				<td class='text-center'><?=$reposicao->datasolicitacao;?></td>
				<td class='text-center'>
					<a href="<?=base_url('reposicoes/info/' . $reposicao->id)?>" class="btn btn-sm btn-primary">+Info</a>
				</td>
				<td class='text-center'>
					<?php if($reposicao->status == 1) { ?>
						<a href="<?=base_url('reposicoes/cancelar/' . $reposicao->id)?>" class="btn btn-sm btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>
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