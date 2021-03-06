<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
	<br>
	<div class="row">
		<div class="col-12">
			<ul class="nav nav-pills">
  				<li class="nav-item">
    				<a href="<?=base_url('produtos/listarprodutos');?>" class='btn btn-md btn-light active'>Produtos Acabados</a>
  				</li>
  				<li class="nav-item" style="margin-left: 10px; margin-right: 10px">
    				<a href="<?=base_url('materiasprima/listarmaterias');?>" class='btn btn-md btn-light'>Matérias-prima</a>
  				</li>
  				<li class="nav-item">
    				<a href="<?=base_url('materiasprima/listarconsumos');?>" class='btn btn-md btn-light'>Consumos</a>
    			</li>
    			<li class="nav-item" style="margin-left: 10px;">
    				<a href="<?=base_url('historico/index');?>" class='btn btn-md btn-light'>Histórico</a>
    			</li>
			</ul>
		</div>
		<!--PRODUTO ACABADO-->
		<div class="col-12">
			<p class="col-md-2 ml-md-auto">
				<a class="btn btn-primary" data-toggle="collapse" href="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Novo Produto</a>
			</p>
			<h1 class='text-center'>Produtos</h1>
			<div class="collapse" id="testeCollapse">
				<hr>
				<form action="<?=base_url('produtos/salvar');?>" name="form_add" method="post">
					<div class="row">
						<input type="hidden" name="tipo" value="0" />
						<div class="form-group col-md-5">
							<label for="descricao">Descrição do Produto</label>
							<input type="text" class="form-control" id="descricao" name="descricao" />
						</div>
						<div class="form-group col-md-4">
							<label for="categoria">Armazém</label>
							<select class="form-control" id="armazem" name="armazem">
								<option value=""></option>
								<?php
									foreach($armazens as $armazem):
										echo '<option value="' . $armazem->id . '">' . $armazem->descricao . '</option>';
									endforeach;
								?>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="categoria">Categoria</label>
							<select class="form-control" id="categoria" name="categoria">
								<option value=""></option>
								<?php
									foreach($categorias as $cat):
										echo '<option value="' . $cat->id . '">' . $cat->descricao . '</option>';
									endforeach;
								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-2">
							<label for="preco">Valor Unitário</label>
							<input type="number" class="form-control" id="preco" name="preco" placeholder="R$" />
						</div>
						<div class="form-group col-md-2">
							<label for="qtd">Quantidade</label>
							<input type="number" class="form-control" id="qtd" name="qtd" />
						</div>
						<div class="form-group col-md-2">
							<label for="acionamento">Ponto Acionamento</label>
							<input type="number" class="form-control" id="acionamento" name="acionamento">
						</div>
						<div class="form-group col-md-2">
							<label for="qtdmax">Estoque mínimo</label>
							<input type="number" class="form-control" id="qtdmin" name="qtdmin" />
						</div>
						<div class="form-group col-md-2">
							<label for="qtdmax">Estoque máximo</label>
							<input type="number" class="form-control" id="qtdmax" name="qtdmax" />
						</div>
						<div class="form-group col-md-4" style="margin-top: 2.5%;">
							<input type="submit" class="btn btn-md btn-success" value="Cadastrar"/>
							<input type="reset" class="btn btn-md btn-light" value="Limpar"/>
						</div>
					</div>
				</form>
			</div>
			<div class="text-center">
		        <?php
		        if($this->session->has_userdata('produto')){
		            echo "<span class='text-success'><strong>";
		            echo $this->session->userdata('produto');
		            echo "</strong></span>";
		            $this->session->unset_userdata('produto');
		        }
		        ?>
		    </div>
			<hr>
			<table class="table table-bordered">
				<thead class="table-inverse">
					<tr>
						<td><b>Produto</b></td>
						<td class='text-center'><b>Categoria</b></td>
						<td class='text-center'><b>Armazém</b></td>
						<td class='text-center'><b>Qtd</b></td>
						<td class='text-center'><b>Qtd mínima</b></td>
						<td class='text-center'><b>Reposição</b></td>
						<td class='text-center'><b>Ações</b></td>
					</tr>
				</thead>
				<tbody>
					<?php
					$contador = 0;
					foreach($produtos as $produto):
						echo '<tr>';
						echo '<td>' . $produto->descricao . '</td>';
						foreach($categorias as $cat):
							if($cat->id == $produto->id_categoria):
							echo '<td class="text-center">' . $cat->descricao . "</td>";
							endif;
						endforeach;
						foreach($armazens as $arm):
							if($arm->id == $produto->id_armazem):
							echo '<td class="text-center">' . $arm->descricao . "</td>";
							endif;
						endforeach;
						echo '<td class="text-center">' . $produto->qtd . '</td>';
						echo '<td class="text-center">' . $produto->qtdmin . '</td>';
						echo '<td class="text-center">';
					?>
					<?php
					if($produto->qtd <= $produto->qtdmin)
					{ 
						echo "<span class='text-danger'><b>Produzir</b></span>";
					} else
					{
						echo "Não há necessidade";
					}
					echo '</td>';
					echo '<td class="text-center">';
					?>
					<a class="btn btn-sm btn-primary" href="<?=base_url('/produtos/info/' . $produto->id);?>"><i class="fa fa-info" aria-hidden="true"></i></a>
					<a class="btn btn-sm btn-warning" href="<?=base_url('/produtos/editar/' . $produto->id);?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a class="btn btn-sm btn-danger" href="<?=base_url('/produtos/apagar/' . $produto->id);?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					<?php
						echo '</td>';
						echo '</tr>';
						$contador++;
					endforeach;
					?>
				</tbody>
			</table>
			<p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
		</div>
	</div>
</div>
<script type="text/javascript" src="/unicsulerp/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="/unicsulerp/js/produtos.js"></script>
