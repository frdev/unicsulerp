<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function listarusuarios()
	{
		$this->load->view('menu');
		$this->load->model('usuarios_model', 'usuarios');
		$data['usuarios'] = $this->usuarios->getUsuarios();
		$this->load->model('departamentos_model', 'departamentos');
		$data['departamentos'] = $this->departamentos->getDepartamentos();
		$this->load->view('usuario/listarusuarios', $data);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$url = base_url('usuarios/listarusuarios');
		if($this->input->post('nome') == NULL){
			redirect($url);
		} else {
			$this->load->model('usuarios_model', 'usuarios');
			$dados['id_departamento'] = $this->input->post('departamento');
			$dados['nome'] = $this->input->post('nome');
			$dados['usuario'] = $this->input->post('usuario');
			$dados['senha'] = md5($this->input->post('senha'));
			$dados['email'] = $this->input->post('email');
			$dados['permissao'] = $this->input->post('permissao');
			$dados['status'] = $this->input->post('status');
			if($this->input->post('id') != NULL){
				$this->usuarios->editUsuario($dados, $this->input->post('id'));
				redirect($url);
			} else {
				if($this->usuarios->checkUsuario($dados) < 1){				
					$this->usuarios->addUsuario($dados);
					redirect($url);
				} else {
					redirect($url);
				}
			}
		}
	}

	public function info($id=NULL)
	{
		$url = base_url('usuarios/listarusuarios');
		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('usuarios_model', 'usuarios');
		$query = $this->usuarios->getUsuarioByID($id);
		$this->load->model('departamentos_model', 'departamentos');
		$data['departamentos'] = $this->departamentos->getDepartamentos();

		if($query == NULL){
			redirect($url);
		} else
		{
			$data['usuario'] = $query;
			$this->load->view('menu');
			$this->load->view('usuario/infousuario', $data);
			$this->load->view('rodape');
		}


	}

	public function apagar($id=NULL)
	{
		$url = base_url('usuarios/listarusuarios');
		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('usuarios_model', 'usuarios');
		$query = $this->usuarios->getUsuarioByID($id);

		if($query != NULL)
		{
			$this->usuarios->apagarUsuario($id);
			redirect($url);
		} else {
			redirect($url);
		}

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
		$this->load->model('departamentos_model', 'departamentos');
		$dados['departamentos'] = $this->departamentos->getDepartamentos();

		if($query == NULL)
		{
			redirect($url);
		}

		$dados['usuario'] = $query;

		$this->load->view('menu');
		$this->load->view('usuario/editarusuario', $dados);
		$this->load->view('rodape');
	}

}