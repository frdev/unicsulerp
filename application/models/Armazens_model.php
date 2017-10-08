<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armazens_model extends CI_Model
{

	public function inserirArmazem($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('armazens', $dados);
		}
	}

	public function getArmazens()
	{
		$query = $this->db->get('armazens');
		return $query->result();
	}

	public function getArmazemByTipo($tipo=NULL)
	{
		if($tipo != NULL || $tipo === 0	)
		{
			$query = $this->db->where('tipoarmazem', $tipo)->get('armazens')->result();
			return $query;
		}
	}

	public function getArmazemById($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('armazens');
			return $query->row();
		}
	}

	public function editArmazem($dados=NULL, $idold=NULL)
	{
		if($dados != NULL && $idold != NULL)
		{
			$query = $this->db->update('armazens', $dados, array('id' => $idold));
		}
		return $query;
	}

	public function apagarArmazem($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->delete('armazens', array('id' => $id));
		}
	}

}