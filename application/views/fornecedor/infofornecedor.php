<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>
<div class="container">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Fornecedor <?=$fornecedor->fantasia;?></h1>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-3">
			<h3>CNPJ</h3>
			<p><?=$fornecedor->cnpj;?></p>
		</div>
		<div class="col-4">
			<h3>Razão Social</h3>
			<p><?=$fornecedor->razaosocial;?></p>
		</div>
		<div class="col-4">
			<h3>Nome Fantasia</h3>
			<p><?=$fornecedor->fantasia;?></p>
		</div>
	</div>
	<div class="row">
		<div class="col-3">
			<h3>Responsavel</h3>
			<p><?=$fornecedor->responsavel;?></p>
		</div>
		<div class="col-4">
			<h3>E-mail</h3>
			<p><?=$fornecedor->email;?></p>
		</div>
		<div class="col-3">
			<h3>Telefone</h3>
			<p><?=$fornecedor->telefone;?></p>
		</div>
		<div class="col-2">
			<h3>Status</h3>
			<p>
                <?php
                    if($fornecedor->status == 0){
                        echo 'Inativo';
                    } else {
                        echo 'Ativo';
                    }
                ?>  
            </p>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h3>Endereço</h3>
			<p><?=$fornecedor->logradouro . ", " . $fornecedor->numero . ", " . $fornecedor->complemento . " - CEP " . $fornecedor->cep . " - " . $fornecedor->cidade . "/" . $fornecedor->uf;?></p>
		</div>
	</div>
	<h1>Histórico do Fornecedor <?=$fornecedor->fantasia;?></h1>
    <hr>
    <table class="table table-bordered">
        <thead class="table-inverse">
            <tr>
                <td class='text-center'><b>Descrição Item</b></td>
                <td class='text-center'><b>Tipo</b></td>
                <td class='text-center'><b>Qtd</b></td>
                <td class='text-center'><b>Valor Total</b></td>
                <td class='text-center'><b>Solicitação</b></td>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $contador = 0;
            foreach ($historico as $h): ?>
            <tr>
                <?php
                foreach($materias as $materia):
                    if($h->id_produto == $materia->id){
                        if($h->tipo == 1){
                            $url = base_url('materiasprima/infomateria/' . $h->id_produto);
                            echo "<td><a href='$url'>" . $materia->descricao . "</a></td>";
                            echo "<td class='text-center'>Matéria-prima</td>";
                        } else {
                            $url = base_url('listarmaterias/infoconsumo/' . $h->id_produto);
                            echo "<td><a href='$url'>" . $materia->descricao . "</a></td>";
                            echo "<td class='text-center'>Consumo</td>";
                        }
                        break;
                    }
                endforeach;
                ?>
                <td><?=$h->qtd?></td>
                <td>
                    <?php
                        if($h->tipo_movimentacao != 1){
                            echo "<span class='text-danger'>- R$ " . $h->valor . "</span>";
                        } else {
                            echo "<span class='text-success'>+ R$ " . $h->valor . "</span>";
                        }
                    ?>
                </td>
                <td><a href="<?=base_url('compras/info/'.$h->id_solicitacao);?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></td>
            </tr>
            <?php $contador++; endforeach;?>
        </tbody>
    </table>
    <p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
    <div class="row">
        <div class="col-12 text-center">
        <a href="<?=base_url('fornecedores/index')?>" class="btn btn-md btn-dark">Voltar</a>
        </div>
    </div>
</div>