<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
    <h1 class='text-center'>Consumo <?=$consumo->descricao;?></h1>
    <hr>
        <form action="<?=base_url('materiasprima/salvarconsumo');?>" name="form_add" method="post">
            <div class="row">
                <input type="hidden" name="id" id="id" value="<?=$consumo->id;?>" />
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição do Consumo</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$consumo->descricao;?>" selected/>
                </div>
                <div class="form-group col-md-4">
                    <label for="armazem">Armazém</label>
                    <select class="form-control" id="armazem" name="armazem" selected>
                        <?php foreach($armazens as $arm):
                            if($arm->id == $consumo->id_armazem){
                                echo "<option value='" . $arm->id . "' selected>" . $arm->descricao . "</option>";
                            } else {
                                echo "<option value='" . $arm->id . "'>" . $arm->descricao . "</option>";
                            }
                        endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="valor">Valor Unitário</label>
                    <input type="number" class="form-control" id="valor" name="valor" placeholder="R$" value="<?=$consumo->valor;?>"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="qtd">Quantidade</label>
                    <input type="number" class="form-control" id="qtd" name="qtd" value="<?=$consumo->qtd;?>"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="acionamento">Pnt. Acionamento</label>
                    <input type="number" class="form-control" id="acionamento" name="acionamento" value="<?=$consumo->acionamento;?>"/>
                </div>
                <div class="form-group col-md-2">
                <label for="qtdmax">Estoque mínimo</label>
                    <input type="number" class="form-control" id="qtdmin" name="qtdmin" value="<?=$consumo->qtdmin;?>"/>
                </div>
                <div class="form-group col-md-2">
                <label for="qtdmax">Estoque máximo</label>
                    <input type="number" class="form-control" id="qtdmax" name="qtdmax" value="<?=$consumo->qtdmax;?>" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4" style="margin-top: 2.5%;">
                    <input type="submit" class="btn btn-md btn-success" value="Alterar"/>
                    <a href="<?=base_url('consumos/listarconsumos');?>" class="btn btn-md btn-light">Cancelar</a>
                </div> 
            </div>
        </form>
</div>