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
			$query = $this->db->select('produtos.*, armazens.descricao as arm_desc, categorias.descricao as cat_desc')
			->from('produtos')
			->join('armazens', 'armazens.id = produtos.id_armazem', 'left')
			->join('categorias', 'categorias.id = produtos.id_categoria', 'left')
			->where('produtos.id', $id)	
			->limit(1)
			->get();
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