<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reposicoes_model extends CI_Model
{


	public function getReposicoes()
	{
		$this->db->order_by('datasolicitacao', 'desc');
		$query = $this->db->get('reposicoes');
		return $query->result();
	}

	public function inserirReposicao($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('reposicoes', $dados);
		}
	}

	public function getReposicaoById($id=NULL){
		if($id != NULL){
			$query = $this->db->where('id', $id)->limit(1)->get('reposicoes')->row();
			return $query;
		}
	}

	public function aprovarReposicao($id=NULL, $data=NULL){
		if($id != NULL && $data != NULL)
		{
			$this->db->where('id', $id)->update('reposicoes', array('status' => 2, 'datareposicao' => $data));
		}
	}

	public function cancelarReposicao($id=NULL){
		if($id != NULL){
			$this->db->where('id', $id)->update('reposicoes', array('status' => 0));
		}
	}


}