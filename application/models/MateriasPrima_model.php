<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriasPrima_model extends CI_Model
{

	public function getAll(){
		$query = $this->db->get('materias')->result();
		return $query;
	}

	public function getMaterias()
	{
		$query = $this->db->where('tipo', 0)->get('materias')->result();
		return $query;
	}

	public function addMateria($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('materias', $dados);
		}
	}

	public function getMateriaById($id=NULL)
	{
		if($id != NULL)
		{
			$query = $this->db->where('id', $id)->limit(1)->get('materias')->row();
			return $query;
		}
	}

	public function editMateria($dados=NULL, $id=NULL){
		if($id != NULL && $dados != NULL){
			$this->db->where('id', $id)->update('materias', $dados);
		}
	}

	public function deleteMateria($id=NULL){
		if($id != NULL){
			$this->db->where('id', $id)->delete('materias');
		}
	}

	public function getConsumos()
	{
		$query = $this->db->where('tipo', 1)->get('materias')->result();
		return $query;
	}

	public function addConsumo($dados=NULL)
	{
		if($dados != NULL)
		{
			$this->db->insert('materias', $dados);
		}
	}

	public function getConsumoById($id=NULL){
		if($id != NULL){
			$query = $this->db->where('id', $id)->limit(1)->get('materias')->row();
			return $query;
		}
	}

	public function updateConsumo($dados=NULL, $id=NULL){
		if($id != NULL && $dados != NULL){
			$this->db->where('id', $id)->update('materias', $dados);
		}
	}

	public function deleteConsumo($id=NULL){
		if($id != NULL){
			$this->db->where('id', $id)->delete('materias');
		}
	}

	public function atualizarQtd($id=NULL, $qtd=NULL){
		if($id != NULL && $qtd != NULL){
			$this->db->where('id', $id)->update('materias', array('qtd' => $qtd));
		}
	}

}