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
		$dados['razaosocial'] = strtoupper($this->input->post('razao'));
		$dados['fantasia'] = strtoupper($this->input->post('fantasia'));
		$dados['responsavel'] = strtoupper($this->input->post('responsavel'));
		$dados['telefone'] = $this->input->post('telefone');
		$dados['email'] = $this->input->post('email');
		$dados['cep'] = $this->input->post('cep');
		$dados['logradouro'] = strtoupper($this->input->post('logradouro'));
		$dados['numero'] = $this->input->post('numero');
		$dados['complemento'] = strtoupper($this->input->post('complemento'));
		$dados['cidade'] = strtoupper($this->input->post('cidade'));
		$dados['uf'] = strtoupper($this->input->post('estado'));
		if($this->input->post('id') != NULL)
		{
			$this->session->set_userdata('fornecedor', 'Fornecedor '. $dados['fantasia'] .' editado com sucesso.');
			$dados['status'] = $this->input->post('status');
			$this->fornecedores->editFornecedor($this->input->post('id'), $dados);
			redirect($url);
		} else 
		{
			$this->fornecedores->addFornecedor($dados);
			$this->session->set_userdata('fornecedor', 'Fornecedor '. $dados['fantasia'] .' inserido com sucesso.');
			redirect($url);
		}
	}

	public function info($id=NULL)
	{
		$url = base_url('fornecedores/listarfornecedores');

		if($id == NULL)
		{
			$this->session->set_userdata('fornecedor', 'Erro ao buscar informações do Fornecedor, selecione novamente.');
			redirect($url);
		}

		$this->load->model('historico_model', 'historico');
		$this->load->model('fornecedores_model', 'fornecedores');
		$this->load->model('materiasprima_model', 'materias');

		$query = $this->fornecedores->getFornecedorByID($id);

		if($query == NULL)
		{
			$this->session->set_userdata('fornecedor', 'Erro ao buscar informações do Fornecedor, selecione novamente.');
			redirect($url);
		}

		$dados['fornecedor'] = $query;
		$dados['historico']  = $this->historico->getHistoricoFornecedor($id);
		$dados['materias']   = $this->materias->getAll();

		$this->load->view('menu');
		$this->load->view('fornecedor/infofornecedor', $dados);
		$this->load->view('rodape');
	}

	public function editar($id=NULL)
	{

		$url = base_url('fornecedores/listarfornecedores');

		if($id == NULL)
		{
			$this->session->set_userdata('fornecedor', 'Erro ao buscar informações do Fornecedor, selecione novamente.');
			redirect($url);
		}

		$this->load->model('fornecedores_model', 'fornecedores');
		$query = $this->fornecedores->getFornecedorByID($id);

		if($query == NULL)
		{
			$this->session->set_userdata('fornecedor', 'Erro ao buscar informações do Fornecedor, selecione novamente.');
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
			$this->session->set_userdata('fornecedor', 'Erro ao buscar informações do Fornecedor, selecione novamente.');
			redirect($url);
		} 

		$this->load->model('fornecedores_model', 'fornecedores');

		$query = $this->fornecedores->getFornecedorByID($id);

		if($query == NULL)
		{
			$this->session->set_userdata('fornecedor', 'Erro ao buscar informações do Fornecedor, selecione novamente.');
			redirect($url);
		} else 
		{
			$this->fornecedores->apagarFornecedor($id);
			$this->session->set_userdata('fornecedor', 'Fornecedor ' . $query->fantasia . ' apagado com sucesso.');
			redirect($url);
		}

	}

}