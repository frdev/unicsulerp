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
		$id = $this->input->post('id');
		$descricao = $this->input->post('descricao');
		$tipoarmazem = $this->input->post('tipoarmazem');
		if($id != NULL && $descricao != NULL && $tipoarmazem != NULL)
		{
			$dados['id'] = $id;
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
		if($this->input->post('id') == NULL || $this->input->post('descricao') == NULL || $this->input->post('tipoarmazem') == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$data['id'] = $this->input->post('id');
		$data['descricao'] = $this->input->post('descricao');
		$data['tipoarmazem'] = $this->input->post('tipoarmazem');
		$this->load->model("armazens_model", "armazens");
		$query = $this->armazens->editArmazem($data, $this->input->post('idantigo'));
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

	public function info($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$this->load->model('armazens_model', 'armazens');
		$result = $this->armazens->getArmazemById($id);
		if($result == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		//armazena as informações do armazém
		$dados['armazem'] = $result;
		$this->load->model('setores_model', 'setores');
		$dados['setores'] = $this->setores->getSetores($id);
		$dados['todossetores'] = $this->setores->getSetores();
		if($dados['setores'] == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$this->load->view('menu');
		$this->load->view('armazem/infoarmazem', $dados);
		$this->load->view('rodape');
	}

	public function salvarsetorarmazem()
	{
		if($this->input->post('armazem') == NULL || $this->input->post('setor') == NULL)
		{
			redirect('armazens/index');
		}
		$dados['id_setor'] = $this->input->post('setor');
		$dados['id_armazem'] = $this->input->post('armazem');
		$this->load->model('setores_model', 'setores');
		$result = $this->setores->getSetorById($dados['id_setor'], $dados['id_armazem']);
		if($result != NULL)
		{
			exit();
			redirect('armazens/index');
		} else 
		{
			$this->load->model('armazens_model', 'armazens');
			$this->armazens->addSetorArmazem($dados);
		}
		redirect('armazens/info/' . $dados['id_armazem']);
	}

}