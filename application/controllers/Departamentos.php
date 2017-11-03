<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos extends CI_Controller
{

	public function index()
	{
		$this->load->model("departamentos_model", "departamentos");
		$dados['departamentos'] = $this->departamentos->getDepartamentos();
		$this->load->view("menu");
		$this->load->view("departamento/listardepartamentos", $dados);
		$this->load->view("rodape");
	}

	public function salvar()
	{
		$descricao = $this->input->post('descricao');
		if($descricao != NULL)
		{
			$dados['descricao'] = strtoupper($descricao);
		} else {
			$this->session->set_userdata('departamento', 'Descrição do Departamento não pode conter valores vazios.');
			redirect(base_url('departamentos/index'));
		}
		$this->load->model('departamentos_model', 'departamentos');
		$this->departamentos->inserirDepartamento($dados);
		$this->session->set_userdata('departamento', 'Departamento '.$dados['descricao'].' inserido com sucesso');
		redirect(base_url('departamentos/index'));
	}

	public function editar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('departamentos/listardepartamentos'));
		}

		$this->load->model("departamentos_model", "departamentos");

		$query = $this->departamentos->getDepartamentoById($id);

		if($query == NULL)
		{
			redirect(base_url('departamentos/index'));
			$this->session->set_userdata('departamento', 'Erro ao carregar informações do projeto, selecione novamente.');
		}

		$dados['departamento'] = $query;
		$this->load->view("menu");
		$this->load->view("departamento/editardepartamento", $dados);
		$this->load->view("rodape");
	}

	public function editardepto()
	{
		if($this->input->post('descricao') == NULL)
		{
			$this->session->set_userdata('departamento', 'Não é possível salvar a edição do departamento sem uma Descrição do mesmo.');
			redirect(base_url('departamentos/index'));
		}
		$data['descricao'] = strtoupper($this->input->post('descricao'));
		$this->load->model("departamentos_model", "departamentos");
		$query = $this->departamentos->editDepartamento($data, $this->input->post('id'));
		$this->session->set_userdata('departamento', 'Departamento ' . $data['descricao'] . ' editado com sucesso.');
		redirect(base_url('departamentos/index'));
	}

	public function apagar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('departamentos/index'));
		}
		$this->load->model("departamentos_model", "departamentos");
		$departamento = $this->departamentos->getDepartamentoById($id);
		$this->departamentos->apagarDepartamento($id);
		$this->session->set_userdata('departamento', 'Departamento ' . $departamento->descricao . ' excluído com sucesso.');
		redirect(base_url('departamentos/index'));
	}

}