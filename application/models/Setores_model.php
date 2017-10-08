<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setores_model extends CI_Model
{


	public function getSetores($idarmazem=NULL)
	{
		if($idarmazem != NULL)
		{
			$query = $this->db->select('armazens.id as cod_armazem, setores.id, setores.descricao')
				->from('armazens')
				->join('setores_armazem', 'setores_armazem.id_armazem = armazens.id', 'left')
				->join('setores', 'setores_armazem.id_setor = setores.id', 'left')
				->where('armazens.id', $idarmazem)
				->get()
				->result();
			return $query;
		} else {
			$query = $this->db->get('setores');
			return $query->result();
		}
	}

	public function getSetorById($idsetor=NULL, $idarmazem=NULL)
	{
		if($idsetor != NULL && $idarmazem != NULL)
		{
			$query = $this->db
			->select('setores.id, setores.descricao')
			->from('setores')
			->join('setores_armazem', 'setores_armazem.id_setor = setores.id', 'left')
			->join('armazens', 'setores_armazem.id_armazem = armazens.id' ,' left')
			->where('setores.id' , $idsetor)
			->where('armazens.id', $idarmazem)
			->limit(1)
			->get()
			->row();
			return $query;
		}
	}

	public function getSetorUnico($id=NULL)
	{
		if($id != NULL)
		{
			$query = $this->db
			->where('id', $id)
			->limit(1)
			->get('setores')
			->row();
			return $query;
		}
	}

	public function addSetor($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('setores', $dados);
		}
	}

	public function deleteSetor($id=NULL)
	{
		if($id != NULL)
		{
			$this->db
			->where('id', $id)
			->delete('setores');
		}
	}

	public function updateSetor($dados=NULL, $idold=NULL)
	{
		if($dados != NULL && $idold != NULL){
			$this->db->where('id', $idold)->update('setores', $dados);
		}
	}

}