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

}