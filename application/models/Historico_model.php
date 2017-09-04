<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico_model extends CI_Model
{

	public function addHistorico($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('historico', $dados);
		}
	}

	public function getHistorico()
	{
		$query = $this->db->get('historico');
		return $query->result();
	}

}