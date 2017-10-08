<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
?>
<br>
<div class="container">
    <h1 class='text-center'>Matéria-prima <?=$materia->descricao;?></h1>
    <hr>
        <form action="<?=base_url('materiasprima/salvar');?>" name="form_add" method="post">
            <div class="row">
                <input type="hidden" name="id" id="id" value="<?=$materia->id;?>" />
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição da Matéria-prima</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$materia->descricao;?>" selected/>
                </div>
                <div class="form-group col-md-4">
                    <label for="armazem">Armazém</label>
                    <select class="form-control" id="armazem" name="armazem" selected>
                        <?php foreach($armazens as $arm):
                            if($arm->id == $materia->id_armazem){
                                echo "<option value='" . $arm->id . "' selected>" . $arm->descricao . "</option>";
                            } else {
                                echo "<option value='" . $arm->id . "'>" . $arm->descricao . "</option>";
                            }
                        endforeach;?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="valor">Valor Unitário</label>
                    <input type="number" class="form-control" id="valor" name="valor" placeholder="R$" value="<?=$materia->valor;?>"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="qtd">Quantidade</label>
                    <input type="number" class="form-control" id="qtd" name="qtd" value="<?=$materia->qtd;?>"/>
                </div>
                <div class="form-group col-md-2">
                    <label for="acionamento">Pnt. Acionamento</label>
                    <input type="number" class="form-control" id="acionamento" name="acionamento" value="<?=$materia->acionamento;?>"/>
                </div>
                <div class="form-group col-md-2">
                <label for="qtdmax">Estoque mínimo</label>
                    <input type="number" class="form-control" id="qtdmin" name="qtdmin" value="<?=$materia->qtdmin;?>"/>
                </div>
                <div class="form-group col-md-2">
                <label for="qtdmax">Estoque máximo</label>
                    <input type="number" class="form-control" id="qtdmax" name="qtdmax" value="<?=$materia->qtdmax;?>" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4" style="margin-top: 2.5%;">
                    <input type="submit" class="btn btn-md btn-success" value="Alterar"/>
                    <a href="<?=base_url('materiasprima/listarmaterias');?>" class="btn btn-md btn-light">Cancelar</a>
                </div> 
            </div>
        </form>
</div>