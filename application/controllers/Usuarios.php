<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function listarusuarios()
	{
		$this->load->view('menu');
		$this->load->model('usuarios_model', 'usuarios');
		$data['usuarios'] = $this->usuarios->getUsuarios();
		$this->load->view('listarusuarios', $data);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$url = base_url('usuarios/listarusuarios');
		if($this->input->post('nome') == NULL){
			redirect($url);
		} else {
			
			$data = date('Y-m-d H:i:s');
			$this->load->model('usuarios_model', 'usuarios');
			$dados['nome'] = $this->input->post('nome');
			$dados['usuario'] = $this->input->post('usuario');
			$dados['senha'] = md5($this->input->post('senha'));
			$dados['email'] = $this->input->post('email');
			$dados['permissao'] = $this->input->post('permissao');
			$dados['status'] = $this->input->post('status');

			if($this->input->post('id') != NULL){
				$dados['modificado'] = $data;
				echo '<pre>';
				print_r($dados);
				echo '</pre>';
				//$this->usuarios->editUsuario($dados);
				//redirect($url);
			} else {
				$this->usuarios->addUsuario($dados);
				//redirect($url);
			}
		}
	}

	public function info(){

	}

	public function apagar(){

	}

	public function editar($id=NULL)
	{
		$url = base_url('usuarios/listarusuarios');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('usuarios_model', 'usuarios');

		$query = $this->usuarios->getUsuarioByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$dados['usuario'] = $query;

		$this->load->view('menu');
		$this->load->view('editarusuario', $dados);
		$this->load->view('rodape');
	}

}