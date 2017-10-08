<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico_model extends CI_Model
{

    public function getHistorico(){
        $query = $this->db->order_by('data desc')->get('historico')->result();
        return $query;
    }

    public function addHistorico($dados=NULL){
        if($dados != NULL){
            $this->db->insert('historico', $dados);
        }
    }

}