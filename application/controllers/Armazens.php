<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armazens extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu.php');
		$this->load->model('armazens_model', 'armazens');
		$dados['armazens'] = $this->armazens->getArmazens();
		$this->load->view('armazem/listararmazens', $dados);
		$this->load->view('rodape.php');
	}

	public function salvar()
	{
		$descricao = $this->input->post('descricao');
		$tipoarmazem = $this->input->post('tipoarmazem');
		if($descricao != NULL && $tipoarmazem != NULL)
		{
			$dados['descricao'] = $descricao;
			$dados['tipoarmazem'] = $tipoarmazem;
		} else 
		{
			redirect(base_url('armazens/index'));
		}
		$this->load->model('armazens_model', 'armazens');
		$this->armazens->inserirArmazem($dados);
		redirect(base_url('armazens/index'));
	}

	public function editar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('armazens'));
		}

		$this->load->model("armazens_model", "armazens");

		$query = $this->armazens->getArmazemById($id);

		if($query == NULL)
		{
			redirect(base_url('armazens/index'));
		}

		$dados['armazem'] = $query;
		$this->load->view("menu");
		$this->load->view("armazem/editararmazem", $dados);
		$this->load->view("rodape");
	}

	public function editarArmazem()
	{
		if($this->input->post('descricao') == NULL || $this->input->post('tipoarmazem') == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$data['descricao'] = $this->input->post('descricao');
		$data['tipoarmazem'] = $this->input->post('tipoarmazem');
		$this->load->model("armazens_model", "armazens");
		$query = $this->armazens->editArmazem($data, $this->input->post('id'));
		redirect(base_url('armazens/index'));
	}

	public function apagar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$this->load->model("armazens_model", "armazens");
		$this->armazens->apagarArmazem($id);
		redirect(base_url('armazens/index'));
	}

}