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
		$query = $this->db->order_by('datasolicitacao desc')->get('compras');
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

	public function gerarOrcamento($dados=NULL)
	{

		if($dados != NULL)
		{

			$id = $dados['id'];
			$fornecedor = $dados['id_fornecedor'];
			$valor = $dados['valor'];
			$this->db->update('compras', 
				array(
					'status' => 2, 
					'id_fornecedor' => $fornecedor,
					'valor' => $valor 
				), array('id' => $id));
		}

	}

	public function aprovarOrcamento($id=NULL, $data=NULL)
	{
		if($id !=NULL && $data != NULL)
		{
			$this->db->update('compras', array('status' => 3, 'dataaprovado' => $data), array('id' => $id));
		}
	}

	public function recebeEntrega($id=NULL, $dados=NULL)
	{
		if($id !=NULL && $dados != NULL)
		{
			$this->db->update('compras', array('status' => 4, 'dataentregue' => $dados['data'], 'nfcompra' => $dados['nfcompra']), array('id' => $id));
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