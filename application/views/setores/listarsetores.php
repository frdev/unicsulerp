<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<p class="col-md-2 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Novo Setor</a>
	</p>
	<h1 class='text-center'>Setores</h1>
	<div class="collapse" id="testeCollapse">
		<hr>
		<form action="<?=base_url('setores/salvar');?>" method='post'>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="descricao">Descrição</label>
					<input type="text" class="form-control" id="descricao" name="descricao" required/>
				</div>
				<div class="form-group col-md-3" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Cadastrar"/>
					<input type="reset" class="btn btn-md btn-light" value="Limpar"/>
				</div> 
			</div>
		</form>
	</div>
	<hr>
</div>
<div class="container">
	<div class="row">
		<div class='col-md-2'>
		</div>
		<div class='col-md-8'>
			<table class="table table-bordered">
				<thead class="table-inverse">
					<tr>
						<td class='text-center' row="scope"><b>#</b></td>
						<td class='text-center'><b>Setor</b></td>
						<td class='text-center'><b>Ações</b></td>
					</tr>
				</thead>
				<tbody>
					<?php
					$contador = 0;
					foreach ($setores as $setor): ?>
					<tr>
						<td class='text-center' row="scope"><?=$setor->id;?></td>
						<td class='text-center'><?=$setor->descricao;?></td>
						<td class='text-center'>
						<a class="btn btn-sm btn-warning" href="<?=base_url('/setores/editar/' . $setor->id)?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-sm btn-danger" href="<?=base_url('/setores/apagar/' . $setor->id)?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php $contador++; endforeach;?>
				</tbody>
			</table>
		<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
		</div>
		<div class='col-md-2'>
		</div>
	</div>
</div>