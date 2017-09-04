<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores_model extends CI_Model
{

	public function getFornecedores()
	{
		$query = $this->db->get('fornecedores');
		return $query->result();
	}

	public function addFornecedor($dados=NULL)
	{
		if($dados != NULL)
		{
			$query = $this->db->insert('fornecedores', $dados);
		}
	}

	public function getFornecedorByID($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('fornecedores');
			return $query->row();
		}
	}

	public function apagarFornecedor($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->delete('fornecedores', array('id' => $id));
		}
	}

	public function editFornecedor($id=NULL, $dados=NULL)
	{
		if($id != NULL && $dados != NULL)
		{
			$this->db->update('fornecedores', $dados, array('id' => $id));
		}
	}

}