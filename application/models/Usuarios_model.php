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

	public function getUsuarioByID($id=NULL){
		if($id != NULL)
		{
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('usuarios');
			return $query->row();
		}
	}

	public function editUsuario($dados=NULL, $id=NULL)
	{
		if($dados != NULL && $id != NULL){
			$data = array('nome' => $dados['nome'], 'usuario' => $dados['usuario'], 'senha' => $dados['senha'], $email => $dados['email'], $permissao => $dados['permissao'], $status => $dados['status'],  'modificado' => $dados['modificado']);
			$this->db->update('usuarios', $data, array('id' => $id));
		}
	}

}