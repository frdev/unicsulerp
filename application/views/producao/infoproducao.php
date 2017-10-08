<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br>

<div class="container">
    <h3 class="text-center">
        Informações da Produção - <?=$produto->descricao?>
    </h3>
    <hr>
    <div class="row">
        <div class="col-3">
            <p><b>Quantidade solicitada: </b></p>
            <p><?=$producao->qtd?></p>
        </div>
        <div class="col-3">
            <p><b>Status</b></p>
            <p>
                <?php
                if($producao->status == 0)
                {
                    echo "<span class='text-danger'>Cancelado</span>";
                } else if($producao->status == 1)
                {
                    echo "Aguardando Aprovação";
                } else if ($producao->status == 2)
                {
                    echo "Aprovada, em produção";
                } else if($producao->status == 3){
                    echo "<b class='text-success'>Entregue - Lote: " . $producao->lote . "</b>";
                }
                ?>
            </p>
        </div>
        <div class="col-2">
            <p><b>Data Solicitação</b></p>
            <p><?=$producao->datasolicitacao;?></p>
        </div>
        <div class="col-2">
            <p><b>Data Aprovação</b></p>
            <p><?=($producao->dataaprovacao != NULL)? $producao->dataaprovacao : "-";?></p>
        </div>
        <div class="col-2">
            <p><b>Data Entrega</b></p>
            <p><?=($producao->dataentrega != NULL)? $producao->dataentrega : "-";?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            if($producao->status == 1){
            ?>
                <a href="<?=base_url('producoes/aprovar/' . $producao->id);?>" class="btn btn-md btn-success">Aprovar Produção</a>
            <?php } else if ($producao->status == 2) { ?>
                <form method="post" action="<?=base_url('producoes/receberproducao/' . $producao->id);?>">
                    <div class="row">
                        <input type="hidden" id="id" name="id" value="<?=$producao->id?>" />
                        <div class="form-group col-3">
                            <label for="lote"><b>Número do Lote:</b></label>
                            <input type="text" name="lote" id="lote" class="form-control" required />
                        </div>
                        <div class="form-group col-2">
                            <button style="cursor:pointer; margin-top: 20%;" type="submit" class="btn btn-md btn-success">Receber Produção</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
            <a href="<?=base_url('producoes/index')?>" class="btn btn-md btn-secondary">Voltar</a>
        </div>
    </div>
</div>