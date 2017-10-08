<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producoes_model extends CI_Model
{

    public function getProducoes(){
        $query = $this->db->get('producoes')->result();
        return $query;
    }

    public function addProducao($dados=NULL){
        if($dados != NULL){
            $this->db->insert('producoes', $dados);
        }
    }

    public function cancelarProducao($id=NULL){
        if($id != NULL){
            $this->db->where('id', $id)->update('producoes', array('status' => 0));
        }
    }

    public function aprovarProducao($id=NULL, $data=NULL){
        if($id != NULL && $data != NULL){
            $this->db->where('id', $id)->update('producoes', array('status' => 2, 'dataaprovacao' => $data));
        }
    }

    public function receberProducao($id=NULL, $dados=NULL){
        if($id != NULL && $dados != NULL){
            $this->db->where('id', $id)->update('producoes', array('status' => 3, 'dataentrega' => $dados['dataentrega'], 'lote' => $dados['lote']));
        }
    }

    public function getProducaoById($id=NULL){
        if($id != NULL){
            $query = $this->db->where('id', $id)->limit(1)->get('producoes')->row();
            return $query;
        }
    }

}