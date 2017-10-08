<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>

<div class="container">
	<h3 class="text-center">
		Informações da Compra - 
		<?php
			foreach($produtos as $produto):
				if($produto->id == $compra->id_produto)
				{
					echo $produto->descricao;
					break;
				}
			endforeach;
		?>
	</h3>
	<hr>
	<div class="row">
		<div class="col-4">
			<p><b>Compra efetuada com o Fornecedor: </b></p>
			<p>
				<?php
					foreach($fornecedores as $fornecedor):
						if($fornecedor->id == $compra->id_fornecedor)
						{
							echo $fornecedor->fantasia;
							break;
						}
					endforeach;
				?>
			</p>
		</div>
		<div class="col-2">
			<p><b>Usuário solicitante: </b></p>
			<p>
				<?php
					foreach($usuarios as $usuario):
						if($usuario->id == $compra->id_usuario)
						{
							echo $usuario->usuario;
							break;
						}
					endforeach;
				?>
			</p>
		</div>
		<div class="col-2">
			<p><b>Quantidade: </b></p>
			<p><?=$compra->qtd?></p>
		</div>
		<div class="col-2">
			<p><b>Valor da Compra: </b></p>
			<p>R$ <?=$compra->valor?></p>
		</div>
		<div class="col-2">
			<p><b>NF da Compra:</b></p>
			<p><?=$compra->nfcompra;?></p>
		</div>
	</div>
	<div class="row">
			<div class="col-4">
				<p><b>Status</b></p>
				<p>
				<?php
				if($compra->status == 0)
				{
					echo "Cancelado";
				} else if($compra->status == 1)
				{
					echo "Aguardando Orçamento";
				} else if ($compra->status == 2)
				{
					echo "Aguardando Aprovação";
				} else if($compra->status == 3)
				{
					echo "Aprovada, aguardando entrega";
				} else if($compra->status == 4)
				{
					echo "Entregue";
				}
				?>
			</p>
		</div>
		<div class="col-2">
			<p><b>Data Solicitação</b></p>
			<p><?=$compra->datasolicitacao;?></p>
		</div>
		<div class="col-2">
			<p><b>Data Aprovação</b></p>
			<p><?=($compra->dataaprovado != NULL)? $compra->dataaprovado : "-";?></p>
		</div>
		<div class="col-2">
			<p><b>Data Entregue</b></p>
			<p><?=($compra->dataentregue != NULL)? $compra->dataentregue : "-";?></p>
		</div>
	</div>
	<div class="row">
		<?php
			if($compra->status == 1){
		?>
		<div class="col-12">
			<hr>
			<form action="<?=base_url('compras/gerarorc');?>" method='post'>
				<div class="row">
					<input type="hidden" value="<?=$compra->id;?>" id="id" name="id"/>
					<div class="form-group col-4">
						<label for="fornecedor">Fornecedor</label>
						<select class="form-control" id="fornecedor" name="fornecedor" required>
							<option value=""></option>
							<?php
								foreach($fornecedores as $f):
									echo "<option value='" . $f->id . "'>" . $f->fantasia . "</option>";
								endforeach;
							?>
						</select>
					</div>
					<div class="form-group col-2">
						<label for="valor">Valor da Compra</label>
						<input type="text" class="form-control" id="valor" name="valor" placeholder="R$" required />
					</div>
					<div class="form-group">
						<button type="submit" style="margin-top: 20%; cursor: pointer;" class="btn btn-md btn-success">Enviar Orçamento</button>
					</div>
				</div>
			</form>
		</div>
		<?php } ?>
		<?php
			if($compra->status == 2){
		?>
			<a href="<?=base_url('compras/aprovarorc/' . $compra->id)?>" class="btn btn-md btn-primary">Aprovar Orçamento</a>
		<?php } ?>
		<?php
			if($compra->status == 3){
		?>
		<div class="col-12">
			<form action="<?=base_url('compras/receberentrega');?>" method='post'>
				<div class="row">
					<input type="hidden" value="<?=$compra->id;?>" id="id" name="id"/>
					<div class="form-group col-3">
						<label for="nf">Nota Fiscal</label>
						<input class="form-control" id="nf" name="nf" required type="text" required>
					</div>
					<div class="form-group">
						<button type="submit" style="margin-top: 22%; cursor: pointer;" class="btn btn-md btn-success">Receber Entrega</button>
					</div>
				</div>
			</form>
		</div>
		<?php } ?>	
		<a style="margin-left: 1.5%;" href="<?=base_url('compras/index')?>" class="btn btn-md btn-secondary">Voltar</a>
	</div>
</div>