<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedores extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->model('fornecedores_model', 'fornecedores');
		$data['fornecedores'] = $this->fornecedores->getFornecedores();
		$this->load->view('fornecedor/listarfornecedores', $data);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$url = base_url('fornecedores/index');
		$this->load->model('fornecedores_model', 'fornecedores');
		$dados['cnpj'] = $this->input->post('cnpj');
		$dados['razaosocial'] = $this->input->post('razao');
		$dados['fantasia'] = $this->input->post('fantasia');
		$dados['responsavel'] = $this->input->post('responsavel');
		$dados['telefone'] = $this->input->post('telefone');
		$dados['email'] = $this->input->post('email');
		$dados['cep'] = $this->input->post('cep');
		$dados['logradouro'] = $this->input->post('logradouro');
		$dados['numero'] = $this->input->post('numero');
		$dados['complemento'] = $this->input->post('complemento');
		$dados['cidade'] = $this->input->post('cidade');
		$dados['uf'] = $this->input->post('estado');
		if($this->input->post('id') != NULL)
		{
			$dados['status'] = $this->input->post('status');
			$this->fornecedores->editFornecedor($this->input->post('id'), $dados);
			redirect($url);
		} else 
		{
			$this->fornecedores->addFornecedor($dados);
			redirect($url);
		}
	}

	public function info($id=NULL)
	{
		$url = base_url('fornecedores/listarfornecedores');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('fornecedores_model', 'fornecedores');

		$query = $this->fornecedores->getFornecedorByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$dados['fornecedor'] = $query;

		$this->load->view('menu');
		$this->load->view('fornecedor/infofornecedor', $dados);
		$this->load->view('rodape');
	}

	public function editar($id=NULL)
	{

		$url = base_url('fornecedores/listarfornecedores');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('fornecedores_model', 'fornecedores');
		$query = $this->fornecedores->getFornecedorByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$dados['fornecedor'] = $query;

		$this->load->view('menu');
		$this->load->view('fornecedor/editarfornecedor', $dados);
		$this->load->view('rodape');
	}

	public function apagar($id=NULL)
	{
		$url = base_url('fornecedores/listarfornecedores');
		if($id == NULL)
		{
			redirect($url);
		} 

		$this->load->model('fornecedores_model', 'fornecedores');

		$query = $this->fornecedores->getFornecedorByID($id);

		if($query == NULL)
		{
			redirect($url);
		} else 
		{
			$this->fornecedores->apagarFornecedor($id);
			redirect($url);
		}

	}

}