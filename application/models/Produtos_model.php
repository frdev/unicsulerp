<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model
{

	public function getProdutos($tipo=NULL)
	{
		if($tipo != NULL)
		{
			$query = $this->db->where('tipo', $tipo)->get('produtos');
			return $query->result();
		} else {
			$query = $this->db->get('produtos');
			return $query->result();
		}
	}

	public function addProduto($dados=NULL)
	{
		if($dados != NULL){
			$this->db->insert('produtos', $dados);
		}
	}

	public function getProdutoByID($id=NULL)
	{
		if($id != NULL){
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('produtos');
			return $query->row();
		}
	}

	public function checkProduto($descricao=NULL)
	{
		if($descricao != NULL)
		{
			$this->db->where('descricao', $descricao);
			$query = $this->db->get('produtos');
		}
		return $query->row();
	}

	public function editarProduto($dados=NULL, $id=NULL)
	{
		if($dados != NULL && $id != NULL)
		{
			$this->db->update('produtos', $dados, array('id' => $id));
		}
	}

	public function apagarProduto($id=NULL)
	{
		if($id != NULL)
		{
			$this->db->delete('produtos', array('id' => $id));
		}
	}

	public function atualizarQtd($id=NULL, $qtd=NULL)
	{
		if($id != NULL && $qtd != NULL)
		{
			$this->db->update('produtos', array('qtd' => $qtd), array('id' => $id));
		}
	}

}