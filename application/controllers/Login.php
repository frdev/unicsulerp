<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('index');
	}

	public function validarlogin()
	{
		$usuario = $this->input->post('usuario');
		$senha = md5($this->input->post('senha'));

		//echo $usuario . " " . $senha;

		if($usuario == NULL || $senha == NULL)
		{
			redirect(base_url(''));
		}

		$this->load->model('usuarios_model', 'usuarios');

		$query = $this->usuarios->getLogin($usuario, $senha);

		if($query == NULL)
		{
			$this->session->set_userdata('login', "Usuário ou senha incorretos.");
			redirect(base_url(''));
		} else {
			$this->load->model('departamentos_model', 'departamentos');
			$qd = $this->departamentos->getDepartamentoById($query['id_departamento']);
			$this->session->set_userdata('email', $query['email']);
			$this->session->set_userdata('username', $query['usuario']);
			$this->session->set_userdata('permissao', $query['permissao']);
			$this->session->set_userdata('departarmento', $query['id_departamento']);
			$this->session->set_userdata('user_id', $query['id']);
			$this->session->set_userdata('nome', $query['nome']);
			$this->session->set_userdata('nome_departamento', $qd->descricao);
			$this->session->set_userdata('logado', true);
			redirect(base_url('produtos/listarprodutos'));
		}
	}

	public function logout()
	{
		$array_items = array('email', 'username', 'permissao', 'departamento', 'user_id', 'nome' , 'nome_departamento', 'logado');
		$this->session->unset_userdata($array_items);
		$this->session->set_userdata('login', "Sessão encerrada.");
		redirect(base_url(''));
	}

}