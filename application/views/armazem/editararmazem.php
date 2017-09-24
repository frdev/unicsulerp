<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<h1 class='text-center'>Armazém <?=$armazem->descricao;?></h1>
	<hr>
		<form action="<?=base_url('armazens/editarArmazem');?>" name="form_add" method="post">
			<div class="row">
				<input type="text" name="idantigo" value="<?=$armazem->id;?>" hidden/>
				<div class="form-group col-md-1">
					<label for="id">Código</label>
					<input type="text" class="form-control" id="id" name="id" value="<?=$armazem->id;?>" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="descricao">Descrição</label>
					<input type="text" class="form-control" id="descricao" name="descricao" value="<?=$armazem->descricao;?>" required/>
				</div>
				<div class="form-group col-md-3">
					<label for="tipoarmazem">Tipo Armazém</label>
					<select class="form-control" id="tipoarmazem" name="tipoarmazem" required>
						<?php
							if($armazem->tipoarmazem == 'Produto Acabado')
							{
								echo "<option value='Produto Acabado' selected>Produto Acabado</option>";
								echo "<option value='Matéria-prima'>Matéria-prima</option>";
								echo "<option value='Matérial de insumo'>Material de insumo</option>";
							} else if($armazem->tipoarmazem == 'Matéria-prima')
							{
								echo "<option value='Produto Acabado'>Produto Acabado</option>";
								echo "<option value='Matéria-prima' selected>Matéria-prima</option>";
								echo "<option value='Matérial de insumo'>Material de insumo</option>";
							} else {
								echo "<option value='Produto Acabado'>Produto Acabado</option>";
								echo "<option value='Matéria-prima'>Matéria-prima</option>";
								echo "<option value='Matérial de insumo' selected>Material de insumo</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Editar"/>
					<a href="<?=base_url('armazens/index');?>" class="btn btn-md btn-light">Voltar</a>
				</div> 
			</div>
		</form>
	</div>
</div>