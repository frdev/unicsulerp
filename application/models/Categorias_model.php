<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model
{

	public function getCategorias()
	{
		$query = $this->db->order_by('id asc')->get('categorias');
		return $query->result();
	}

	public function getCategoriaById($id=null)
	{
		if($id != NULL)
		{
			$query = $this->db
			->where('id', $id)
			->get('categorias')
			->row();
			return $query;
		}
	}

	public function addCategoria($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('categorias', $dados);
		}
	}

	public function deleteCategoria($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->where('id', $id)->delete('categorias');
		}
	}

	public function updateCategoria($dados=NULL, $idold=NULL)
	{
		if($dados != NULL && $idold != NULL)
		{
			$this->db->where('id', $idold)->update('categorias', $dados);
		}
	}

}