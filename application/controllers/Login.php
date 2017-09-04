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
			redirect(base_url(''));
		} else {
			$user = array('id' => $id, 'usuario' => $u, 'logado' => TRUE);
			$this->session->set_userdata($user);
			redirect(base_url('produtos/listarprodutos'));
		}

	}

}