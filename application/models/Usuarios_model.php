<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{

	public function getUsuarios()
	{
		$query = $this->db->get('usuarios');
		return $query->result();
	}

	public function addUsuario($dados=NULL)
	{
		if($dados != NULL){
			$this->db->insert('usuarios', $dados);
		}
	}

	public function checkUsuario($dados=NULL)
	{
		
		$nome = $dados['nome'];
		$usuario = $dados['usuario'];
		$email = $dados['email'];

		if($dados != NULL)
		{
			$this->db->where('nome', $nome);
			$this->db->or_where('usuario =', $usuario);
			$this->db->or_where('email =', $email);
			$query = $this->db->get('usuarios');
		}
		return $query->row();
	}

	public function getUsuarioByID($id=NULL){
		if($id != NULL)
		{
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('usuarios');
			return $query->row();
		}
	}

	public function getLogin($usuario=NULL, $senha=NULL)
	{
		if($usuario != NULL && $senha != NULL)
		{
			$this->db->where('usuario', $usuario);
			$this->db->where('senha', $senha);
			$this->db->limit(1);
			$query = $this->db->get('usuarios');
			return $query->result();
		}
	}

	public function editUsuario($dados=NULL, $id=NULL)
	{
		if($dados != NULL && $id != NULL){
			$this->db->update('usuarios', $dados, array('id' => $id));
		}
	}

	public function apagarUsuario($id=NULL){
		if($id != NULL)
		{
			$this->db->delete('usuarios', array('id' => $id));
		}
	}

}