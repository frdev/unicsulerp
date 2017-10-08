<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<p class="col-md-2 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Nova Categoria</a>
	</p>
	<h1 class='text-center'>Categorias de Produto</h1>
	<div class="collapse" id="testeCollapse">
		<hr>
		<form action="<?=base_url('categorias/salvar');?>" name="form_add" method="post">
			<div class="row">
				<div class="form-group col-md-3">
					<label for="descricao">Descrição da Categoria</label>
					<input type="text" class="form-control" id="descricao" name="descricao" required/>
				</div>
				<div class="form-group col-md-3">
					<label for="descricao">Setor da Categoria</label>
					<select class="form-control" id="setor" name="setor" required/>
						<option value=""></option>
						<?php
						foreach($setores as $setor): ?>
							<option value="<?=$setor->id;?>"><?=$setor->descricao?></option>
						<?php
						endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-3" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Cadastrar"/>
					<input type="reset" class="btn btn-md btn-light" value="Limpar"/>
				</div>
			</div>
		</form>
	</div>
	<hr>
	<div class="row">
		<div class="col-2"></div>
		<div class="col-8">
			<table class="table table-bordered">
				<thead class="table-inverse">
					<tr>
						<td class='text-center' row="scope"><b>#</b></td>
						<td class='text-center'><b>Categorias</b></td>
						<td class='text-center'><b>Setor</b></td>
						<td class='text-center'><b>Ações</b></td>
					</tr>
				</thead>
				<tbody>
					<?php
					$contador = 0;
					foreach ($categorias as $cat): ?>
					<tr>
						<td class='text-center' row="scope"><?=$cat->id;?></td>
						<td class='text-center'><?=$cat->descricao;?></td>
						<?php
						foreach($setores as $setor):
							if($cat->id_setor == $setor->id):?>
								<td class='text-center'><?=$setor->descricao;?></td>
						<?php
							endif;
						endforeach; ?>
						<td class='text-center'>
						<a class="btn btn-sm btn-warning" href="<?=base_url('/categorias/editar/' . $cat->id)?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-sm btn-danger" href="<?=base_url('/categorias/apagar/' . $cat->id)?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php $contador++; endforeach;?>
				</tbody>
			</table>
			<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
		</div>
		<div class="col-2"></div>
	</div>
</div>