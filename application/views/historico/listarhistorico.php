<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>

<div class="container">
    <br>
    <div class="col-12">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="<?=base_url('produtos/listarprodutos');?>" class='btn btn-md btn-light'>Produtos Acabados</a>
            </li>
            <li class="nav-item" style="margin-left: 10px; margin-right: 10px">
                <a href="<?=base_url('materiasprima/listarmaterias');?>" class='btn btn-md btn-light'>Matérias-prima</a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url('materiasprima/listarconsumos');?>" class='btn btn-md btn-light'>Consumos</a>
            </li>
            <li class="nav-item" style="margin-left: 10px;">
                <a href="<?=base_url('historico/index');?>" class='btn btn-md btn-light active'>Histórico</a>
            </li>
        </ul>
    </div>
    <br>
    <h1 class='text-center'>Histórico</h1>
    <hr>
    <table class="table table-bordered">
        <thead class="table-inverse">
            <tr>
                <td><b>#</b></td>
                <td class='text-center'><b>Tipo</b></td>
                <td class='text-center'><b>Tipo movimentação</b></td>
                <td class='text-center'><b>Qtd</b></td>
                <td class='text-center'><b>Valor</b></td>
                <td class='text-center'><b>Data</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 0;
            foreach ($historico as $h): ?>
            <tr>
                <?php
                    if($h->tipo == 0){
                        foreach($produtos as $produto):
                            if($h->id_produto == $produto->id){
                                $url = base_url('produtos/info/' . $h->id_produto);
                                echo "<td><a href='$url'>" . $produto->descricao . "</a></td>";
                                echo "<td class='text-center'>Produto Acabado</td>";
                                break;
                            }
                        endforeach;
                    } else if($h->tipo == 1 || $h->tipo == 2){
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
                    }
                
                    if($h->tipo_movimentacao == 0){
                        $url = base_url('compras/info/' . $h->id_solicitacao);
                        echo "<td class='text-center'><a href='$url'>Compra</td>";
                    } else if ($h->tipo_movimentacao == 1){
                        $url = base_url('vendas/info/' . $h->id_solicitacao);
                        echo "<td class='text-center'><a href='$url'>Venda</a></td>";
                    } else if ($h->tipo_movimentacao == 2){
                        $url = base_url('reposicoes/info/' . $h->id_solicitacao);
                        echo "<td class='text-center'><a href='$url'>Reposição</a></td>";
                    } else if ($h->tipo_movimentacao == 3){
                        $url = base_url('producoes/info/' . $h->id_solicitacao);
                        echo "<td class='text-center'><a href='$url'>Produção</a></td>";
                    }
                ?>
                <td class='text-center'><?=$h->qtd;?></td>
                <?php
                    if($h->tipo_movimentacao == 1){
                        echo "<td class='text-center text-success'>+ R$" . $h->valor . "</td>";
                    } else {
                        echo "<td class='text-center text-danger'>- R$" . $h->valor . "</td>";
                    }
                ?>
                <td class='text-center'><?=$h->data;?></td>
            </tr>
            <?php $contador++; endforeach;?>
        </tbody>
    </table>
    <p class="text-center"><b>Total de registros: <?=$contador;?></b></p>
</div>