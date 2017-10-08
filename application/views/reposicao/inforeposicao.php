<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>

<div class="container">
    <h3 class="text-center">
        Informações da Reposição - <?=$produto->descricao?>
    </h3>
    <hr>
    <div class="row">
        <div class="col-3">
            <p><b>Quantidade solicitada: </b></p>
            <p><?=$reposicao->qtd;?></p>
        </div>
        <div class="col-2">
            <p><b>Quantidade atual: </b></p>
            <p><?=$produto->qtd?></p>
        </div>
        <div class="col-2">
            <p><b>Valor da Reposição: </b></p>
            <p>R$ <?=$reposicao->qtd*$produto->valor?></p>
        </div>
        <div class="col-3">
            <p><b>Status</b></p>
            <p>
                <?php
                if($reposicao->status == 1)
                {
                    echo "Aguardando Reposição";
                } else if ($reposicao->status == 2)
                {
                    echo "<b class='text-success'>Reposição realizada</b>";
                }
                ?>
            </p>
        </div>
        <div class="col-2">
            <p><b>Data Solicitação</b></p>
            <p><?=$reposicao->datasolicitacao;?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <p><b>Data Reposição</b></p>
            <p><?=($reposicao->datareposicao != NULL)? $reposicao->datareposicao : "-";?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            if($reposicao->status == 1){
            ?>
                <a href="<?=base_url('reposicoes/aprovar/' . $reposicao->id);?>" class="btn btn-md btn-success">Aprovar Reposição</a>
            <?php } ?>
            <a href="<?=base_url('reposicoes/index')?>" class="btn btn-md btn-secondary">Voltar</a>
        </div>
    </div>
</div>