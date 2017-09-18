<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos_model extends CI_Model
{

	public function getDepartamentos()
	{
		$this->db->order_by("descricao", "asc");
		$query = $this->db->get("departamentos");
		return $query->result();
	}

	public function inserirDepartamento($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('departamentos', $dados);
		}
	}

	public function getDepartamentoById($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('departamentos');
			return $query->row();
		}
	}

	public function editDepartamento($dados=NULL)
	{
		if($dados != NULL)
		{
			$id = $dados['id'];
			$query = $this->db->update('departamentos', $dados, array('id' => $id));
		}
			return $query;
	}

	public function apagarDepartamento($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->delete('departamentos', array('id' => $id));
		}
	}

}