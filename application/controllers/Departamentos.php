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
			$dados['descricao'] = $descricao;
		} else {
			redirect(base_url('departamentos/index'));
		}

		$this->load->model('departamentos_model', 'departamentos');
		$this->departamentos->inserirDepartamento($dados);
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
			redirect(base_url('departamentos/index'));
		}
		$data['descricao'] = $this->input->post('descricao');
		$this->load->model("departamentos_model", "departamentos");
		$query = $this->departamentos->editDepartamento($data, $this->input->post('id'));
		redirect(base_url('departamentos/index'));
	}

	public function apagar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('departamentos/index'));
		}
		$this->load->model("departamentos_model", "departamentos");
		$this->departamentos->apagarDepartamento($id);
		redirect(base_url('departamentos/index'));
	}

}