<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras_model extends CI_Model
{

	public function addCompra($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('compras', $dados);
		}
	}

	public function getCompras()
	{
		$query = $this->db->get('compras');
		return $query->result();
	}

	public function getCompraByID($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('compras');
			return $query->row();
		}
	}

	public function aprovaCompra($id=NULL, $data=NULL)
	{

		if($id !=NULL && $data != NULL)
		{
			$this->db->update('compras', array('status' => 2, 'dataaprovado' => $data), array('id' => $id));
		}

	}

	public function aguardaEntrega($id=NULL)
	{
		if($id !=NULL)
		{
			$this->db->update('compras', array('status' => 3), array('id' => $id));
		}
	}

	public function recebeEntrega($id=NULL, $data=NULL)
	{
		if($id !=NULL && $data != NULL)
		{
			$this->db->update('compras', array('status' => 4, 'dataentregue' => $data), array('id' => $id));
		}
	}

	public function cancelaCompra($id=NULL)
	{
		if($id !=NULL)
		{
			$this->db->update('compras', array('status' => 0), array('id' => $id));
		}
	}

}