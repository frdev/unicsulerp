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
			$dados['descricao'] = strtoupper($descricao);
			$dados['tipoarmazem'] = $tipoarmazem;
		} else 
		{
			$this->session->set_userdata('armazem', 'Não é possível registrar um Armazém sem descrição ou preendimento do tipo de armazém.');
			redirect(base_url('armazens/index'));
		}
		$this->session->set_userdata('armazem', 'Armazém '.$dados['descricao'].' cadastrado com sucesso.');
		$this->load->model('armazens_model', 'armazens');
		$this->armazens->inserirArmazem($dados);
		redirect(base_url('armazens/index'));
	}

	public function editar($id=NULL)
	{
		if($id == NULL)
		{
			$this->session->set_userdata('armazem', 'Erro ao buscar informações do armazém informado, selecione novamente.');
			redirect(base_url('armazens'));
		}

		$this->load->model("armazens_model", "armazens");

		$query = $this->armazens->getArmazemById($id);

		if($query == NULL)
		{
			$this->session->set_userdata('armazem', 'Erro ao buscar informações do armazém informado, selecione novamente.');
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
			$this->session->set_userdata('armazem', 'Não é possível editar o Armazém se os campos não estiverem preenchidos.');
			redirect(base_url('armazens/index'));
		}
		$data['descricao'] = strtoupper($this->input->post('descricao'));
		$data['tipoarmazem'] = $this->input->post('tipoarmazem');
		$this->load->model("armazens_model", "armazens");
		$query = $this->armazens->editArmazem($data, $this->input->post('id'));
		$this->session->set_userdata('armazem', 'Armazém '.$data['descricao'].' editado com sucesso.');
		redirect(base_url('armazens/index'));
	}

	public function apagar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$this->load->model("armazens_model", "armazens");
		$armazem = $this->armazens->getArmazemById($id);
		$this->armazens->apagarArmazem($id);
		$this->session->set_userdata('armazem', 'Armazém '.$armazem->descricao.' excluído com sucesso.');
		redirect(base_url('armazens/index'));
	}

}