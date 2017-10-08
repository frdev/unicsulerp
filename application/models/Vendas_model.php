<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas_model extends CI_Model
{

	public function getVendas()
	{
		$query = $this->db->get('vendas');
		return $query->result();
	}

	public function addVendas($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('vendas', $dados);
		}
	}

	public function getVendaByID($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('vendas');
			return $query->row();
		}
	}

	public function cancelaVenda($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->update('vendas', array('status' => 0), array('id' => $id));
		}
	}

	public function aprovaVenda($id=NULL, $dados=NULL)
	{
		if($id !=NULL && $dados != NULL)
		{
			$this->db->update('vendas', array('status' => 2, 'dataaprovada' => $dados['data'], 'nfvenda' => $dados['nfvenda']), array('id' => $id));
		}
	}

}