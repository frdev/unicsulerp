<div class="container">
	<div class="row">
		<div class='col-6 text-center'>
			<div class="col-1"></div>
			<div class="col-10">
				<br>
				<h3>Armazém <?=$armazem->id . " - " . $armazem->descricao;?></h3>
				<hr>
			</div>
			<div class="col-10">
				<span>Código: <?=$armazem->id?></span>
			</div>
			<div class="col-10">
				<span>Nome: <?=$armazem->descricao?></span>
			</div>
			<div class="col-10">
				<span>Tipo de Armazém: <?=$armazem->tipoarmazem?></span>
			</div>
			<div class="col-1"></div>
		</div>
		<div class="col-6">
			<div class="col-1"></div>
			<div class="col-10">
				<br>
				<h3 class='text-center'>Setores do Armazém</h3>
				<hr>
				<?php if(sizeof($setores) != 0){?>
				<table class='table table-bordered'>
					<div class="table-inverse">
						<thead>
							<td>#</td>
							<td>Setor</td>
							<td class="text-center">-</td>
						</thead>
						<tbody>
						<?php
						foreach($setores as $setor): ?>
							<tr>
								<td><?=$setor->id?></td>
								<td><?=$setor->descricao?></td>
								<td class="text-center"><a class='btn btn-sm btn-primary' href="<?=base_url('setores/info/' . $setor->id . '/' . $armazem->id);?>"><i class="fa fa-info-circle" aria-hidden="true"></i></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</div>
				</table>
				<?php } else {
							echo "<p class='text-center'><b>Não há setores cadastrados.</b></p>";
				} ?>
				<br>
				<h4 class='text-center'>Cadastrar Novo Setor</h4>
				<hr>
				<form method='post' action='<?=base_url('armazens/salvarsetorarmazem')?>'>
					<input type='hidden' value='<?=$armazem->id;?>' name='armazem' />
					<div class="row">
						<div class='form-group col-md-7'>
							<label for='setor'>Setor</label>
							<select name='setor' id='setor' class='form-control' required/>
								<option value="">Selecione um setor</option>
								<?php 
									foreach($todossetores as $setor): ?>
										<option value='<?=$setor->id;?>'><?=$setor->descricao;?></option>
										<?php
									endforeach;
								?>
							</select>
						</div>
						<div class='form-group col-5'>
							<button type='submit' class='btn btn-sm btn-success' style='margin-top:23%'>Cadastrar</button>
							<button type='reset' class='btn btn-sm btn-light' style='margin-top:23%'>Limpar</button>
						</div>
						</div>
				</form>
			</div>
			<div class="col-1"></div>
		</div>
	</div>
	<div class="text-center">
		<a href="<?=base_url('armazens/index')?>" class="btn btn-sm btn-dark">Voltar</a>
	</div>
</div>