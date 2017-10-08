<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<p class="col-md-2 ml-md-auto">
		<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Novo Usuário</a>
	</p>
	<h1 class='text-center'>Usuários</h1>
	<div class="collapse" id="testeCollapse">
		<hr>
		<form action="<?=base_url('usuarios/salvar');?>" name="form_add" method="post">
			<div class="row">
				<div class="form-group col-md-4">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="usuario">Usuário</label>
					<input type="text" class="form-control" id="usuario" name="usuario" required/>
				</div>
				<div class="form-group col-md-4">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" name="senha" required/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" required/>
				</div>
				<div class="form-group col-md-2">
					<label for="permissao">Permissão</label>
					<select class="form-control" id="permissao" name="permissao" required>
						<option value='20'>Comum</option>
						<option value='10'>Admin</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="status">Status</label>
					<select class="form-control" id="status" name="status" required>
						<option value='1'>Ativo</option>
						<option value='0'>Inativo</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="departamento">Departamento</label>
					<select class="form-control" id="departamento" name="departamento" required>
						<option value=""></option>
						<?php
							foreach($departamentos as $depto):
						?>
							<option value="<?=$depto->id;?>"><?=$depto->descricao;?></option>
						<?php
							endforeach;
						?>
					</select>
				</div>
			</div>
			<div class="col-4">
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
				<td class='text-center'><b>Usuário</b></td>
				<td class='text-center'><b>Departamento</b></td>
				<td class='text-center'><b>Permissão</b></td>
				<td class='text-center'><b>Status</b></td>
				<td class='text-center'><b>Ações</b></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$contador = 0;
			foreach ($usuarios as $usuario): ?>
			<tr>
				<td class='text-center'><?=$usuario->nome;?></td>
				<td class='text-center'>
					<?php
						foreach($departamentos as $depto):
							if($depto->id == $usuario->id_departamento):
								echo $depto->descricao;
							endif;
						endforeach;
					?>
				</td>
				<?php
				if($usuario->permissao == 10):
					echo "<td class='text-center'>Administrador</td>";
				endif;
				if($usuario->permissao == 20):
					echo "<td class='text-center'>Comum</td>";
				endif;
				?>
				<td class='text-center'>
				<?php
				if($usuario->status == 1):
					echo "Ativo";
				endif;
				if($usuario->status == 0):
					echo "Inativo";
				endif;
				?>
				</td>
				<td class='text-center'>
				<a class="btn btn-sm btn-primary" href="<?=base_url('/usuarios/info/' . $usuario->id)?>"><i class="fa fa-info" aria-hidden="true"></i></a>
				<a class="btn btn-sm btn-warning" href="<?=base_url('/usuarios/editar/' . $usuario->id)?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<a class="btn btn-sm btn-danger" href="<?=base_url('/usuarios/apagar/' . $usuario->id)?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			<?php $contador++; endforeach;?>
		</tbody>
	</table>
	<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>

</div>