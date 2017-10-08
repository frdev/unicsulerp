<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<h1 class='text-center'>Categoria <?=$categoria->descricao;?></h1>
	<hr>
		<form action="<?=base_url('categorias/editarcategoria');?>" name="form_add" method="post">
			<div class="row">
				<input type="text" name="id" value="<?=$categoria->id;?>" hidden/>
				<div class="form-group col-md-3">
					<label for="descricao">Descrição da Categoria</label>
					<input type="text" class="form-control" id="descricao" name="descricao" value="<?=$categoria->descricao;?>" required/>
				</div>
				<div class="form-group col-md-3">
					<label for="descricao">Setor da Categoria</label>
					<select class="form-control" id="setor" name="setor" value="<?=$categoria->descricao;?>" required/>
						<?php
						foreach($setores as $setor): 
							if($setor->id == $categoria->id_setor){ ?>
								<option value="<?=$setor->id;?>" selected><?=$setor->descricao?></option>
							<?php } else { ?>
								<option value="<?=$setor->id;?>"><?=$setor->descricao?></option>
						<?php
								}
						endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Editar"/>
					<a href="<?=base_url('categorias/index');?>" class="btn btn-md btn-light">Voltar</a>
				</div> 
			</div>
		</form>
	</div>
</div>