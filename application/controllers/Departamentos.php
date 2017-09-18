<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departamentos extends CI_Controller
{

	public function index()
	{
		$this->load->model("departamentos_model", "departamentos");
		$dados['departamentos'] = $this->departamentos->getDepartamentos();
		$this->load->view("menu");
		$this->load->view("listardepartamentos", $dados);
		$this->load->view("rodape");
	}

	public function salvar()
	{

		$id = $this->input->post('id');
		$descricao = $this->input->post('descricao');
		if($id != NULL && $descricao != NULL)
		{
			$dados['id'] = $id;
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
			echo "<pre>";
			print_r($query);
			echo "</pre>";
			//redirect(base_url('departamentos/index'));
		}

		$dados['departamento'] = $query;
		$this->load->view("menu");
		$this->load->view("editardepartamento", $dados);
		$this->load->view("rodape");
	}

	public function editardepto()
	{
		if($this->input->post('id') == NULL || $this->input->post('descricao') == NULL || $this->input->post('status') == NULL)
		{
			redirect(base_url('departamentos/index'));
		}
		$data['id'] = $this->input->post('id');
		$data['descricao'] = $this->input->post('descricao');
		$data['status'] = $this->input->post('status');
		$this->load->model("departamentos_model", "departamentos");
		$query = $this->departamentos->editDepartamento($data);
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