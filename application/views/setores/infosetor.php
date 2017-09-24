<div class="container">
	<div class="row">
		<div class='col-12 text-center'>
			<div class="col-12">
				<br>
				<h3>Setor de <?=$setor->descricao;?> do Armazém <?=$armazem->id . " - " . $armazem->descricao;?></h3>
				<hr>
			</div>
			<div class="col-12">
				<span>Tipo de Armazém: <?=$armazem->tipoarmazem?></span>
			</div>
			<div class="col-1"></div>
		</div>
		<div class="col-6 text-center">
			<br>
			<h3>Prateleiras</h3>
			<hr>
			<table class="table table-bordered">
				<div class="table-inverse">
					<thead>
						<td>#</td>
						<td class='text-center'>Prateleira</td>
						<td class='text-center'>DX</td>
						<td class='text-center'>DY</td>
						<td class='text-center'>+Info</td>
					</thead>
					<tbody>
						<?php
							$contador = 0;
							foreach($prateleiras as $prat):
						?>
							<tr>
								<td><?=$contador+1;?></td>
								<td class='text-center'><?=$prat->id_prateleira;?></td>
								<td class='text-center'><?=$prat->posicoesx;?></td>
								<td class='text-center'><?=$prat->posicoesy;?></td>
								<td class='text-center'><a class='btn btn-sm btn-primary' href="<?=base_url('prateleiras/tabela/' . $prat->id_prateleira);?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
							</tr>
						<?php $contador++;
						endforeach; ?>
					</tbody>
				</div>
			</table>
			<span class="text-center"><?= "Total de prateleiras do setor: " . $contador;?></span>
		</div>
		<div class="col-6">
			<br>
			<h3 class='text-center'>Cadastrar Nova Prateleira</h3>
			<hr>
			<form method='post' action='<?=base_url('prateleiras/salvar');?>'>
				<input type='hidden' value="<?=$setor->id;?>" name='id_setor'/>
				<input type='hidden' value="<?=$armazem->id;?>" name='id_armazem'/>
				<div class="row">
					<div class="form-group col-4">
						<label for='id'>Código</label>
						<input type='text' class='form-control' name='id' id='id' required/>
						<button type='submit' class='btn btn-sm btn-success' style="margin-top: 23%;">Cadastrar</button>
						<button type='reset' class='btn btn-sm btn-light' style="margin-top: 23%;">Limpar</button>
					</div>
					<div class='form-group col-4'>
						<label for='dx'>Dimensão X</label>
						<input type='number' class='form-control' name='dx' id='dx' required/>
					</div>
					<div class='form-group col-4'>
						<label for='dy'>Dimensão Y</label>
						<input type='number' class='form-control' name='dy' id='dy' required/>
					</div>
				</div>
			</form>
		</div>
	</div>
	<br>
	<div class="text-center">
		<a href="<?=base_url('armazens/info/' . $armazem->id)?>" class="btn btn-sm btn-dark">Voltar</a>
	</div>
</div>