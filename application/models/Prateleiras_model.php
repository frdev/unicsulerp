<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prateleiras_model extends CI_Model
{

	public function getPrateleirasBySetorArmazem($idsetor=NULL, $idarmazem=NULL)
	{
		if($idsetor != NULL && $idarmazem != NULL)
		{
			$query = $this->db
			->select('prateleiras_setor.id_prateleira, prateleiras.posicoesx, prateleiras.posicoesy')
			->from('prateleiras_setor')
			->join('prateleiras', 'prateleiras_setor.id_prateleira = prateleiras.id', 'left')
			->where('id_setor', $idsetor)
			->where('id_armazem', $idarmazem)
			->order_by('id_prateleira')
			->get()
			->result();
			return $query;
		}
	}

	public function getPrateleiraById($id=NULL)
	{
		if($id != NULL)
		{
			$query = $this->db
			->where('id', $id)
			->limit(1)
			->get('prateleiras')
			->row();
			return $query;
		}
	}

	public function addPrateleira($dados=NULL)
	{
		if($dados != NULL)
		{
			//tabela prateleiras
			$dadosprat['id'] = $dados['id'];
			$dadosprat['posicoesx'] = $dados['posicoesx'];
			$dadosprat['posicoesy'] = $dados['posicoesy'];
			//tabela prateleira_setor
			$pratsetoram['id_setor'] = $dados['id_setor'];
			$pratsetoram['id_prateleira'] = $dados['id'];
			$pratsetoram['id_armazem'] = $dados['id_armazem'];
			//insert prateleiras
			$this->db->insert('prateleiras', $dadosprat);
			//insert tabela de relacionamento
			$this->db->insert('prateleiras_setor', $pratsetoram);
		}
	}

}