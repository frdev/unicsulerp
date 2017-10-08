<div class="container">
	<div class="row text-center">
		<div class="col-12">
			<br>
			<h1>Usuário <?=$usuario->usuario;?></h1>
			<hr>
		</div>
		<div class="col-12">
			<h4>Nome</h4>
			<p><?=$usuario->nome;?></p>
		</div>
		<div class="col-12">
			<h4>Departamento</h4>
			<p>
				<?php
					foreach($departamentos as $depto):
						if($depto->id == $usuario->id_departamento):
							echo $depto->descricao;
						endif;
					endforeach;
				?>
			</p>
		</div>
		<div class="col-12">
			<h4>E-mail</h4>
			<p><?=$usuario->email;?></p>
		</div>
		<div class="col-12">
			<h4>Permissão</h4>
			<?php
				if($usuario->permissao == 20)
				{
					echo "<p>Comum</p>";
				} else if($usuario->permissao == 10)
				{
					echo "<p>Administrador</p>";
				}
			?>
		</div>
		<div class="col-12">
			<h4>Status</h4>
			<?php
				if($usuario->status == 0)
				{
					echo "<p>Inativo</p>";
				} else if ($usuario->status == 1)
				{
					echo "<p>Ativo</p>";
				}
			?>
		</div>
		<div class="col-12">
		<a href="<?=base_url('usuarios/listarusuarios')?>" class="btn btn-md btn-dark">Voltar</a>
		</div>
	</div>
</div>