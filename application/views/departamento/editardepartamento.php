<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<h1 class='text-center'>Departamento <?=$departamento->descricao;?></h1>
	<hr>
		<form action="<?=base_url('departamentos/editardepto');?>" name="form_add" method="post">
			<div class="row">
				<input type="text" name="idantigo" value="<?=$departamento->id;?>" hidden/>
				<div class="form-group col-md-1">
					<label for="id">Código</label>
					<input type="text" class="form-control" id="id" name="id" value="<?=$departamento->id;?>" required/>
				</div>
				<div class="form-group col-md-3">
					<label for="descricao">Descrição</label>
					<input type="text" class="form-control" id="descricao" name="descricao" value="<?=$departamento->descricao;?>" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="status">Status</label>
					<select class="form-control" id="status" name="status" required>
						<?php
							if($departamento->status == 1)
							{
								echo "<option value='1' selected>Ativo</option>";
								echo "<option value='0'>Inativo</option>";
							} else 
							{
								echo "<option value='1'>Ativo</option>";
								echo "<option value='0' selected>Inativo</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-4" style="margin-top: 2.5%;">
					<input type="submit" class="btn btn-md btn-success" value="Editar"/>
					<a href="<?=base_url('departamentos/index');?>" class="btn btn-md btn-light">Voltar</a>
				</div> 
			</div>
		</form>
	</div>
</div>