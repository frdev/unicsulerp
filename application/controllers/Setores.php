<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setores extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->model('setores_model', 'setores');
		$dados['setores'] = $this->setores->getSetores();
		$this->load->view('setores/listarsetores', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		if($this->input->post('descricao') == NULL)
		{
			redirect('setores/index');
		}
		$dados['descricao'] = $this->input->post('descricao');
		$this->load->model('setores_model', 'setores');
		$this->setores->addSetor($dados);
		redirect('setores/index');
	}

	public function apagar($id=NULL)
	{
		if($id == NULL)
		{
			redirect('armazens/index');
		}
		$this->load->model('setores_model', 'setores');
		if($this->setores->getSetorUnico($id) == NULL)
		{
			redirect('setores/index');
		}
		$this->setores->deleteSetor($id);
		redirect('setores/index');
	}

	public function editar($id=NULL)
	{
		if($id == NULL)
		{
			redirect('setores/index');
		}
		$this->load->model('setores_model', 'setores');
		if($this->setores->getSetorUnico($id) == NULL)
		{
			redirect('setores/index');
		}
		$dados['setor'] = $this->setores->getSetorUnico($id);
		$this->load->view('menu');
		$this->load->view('setores/editsetor', $dados);
		$this->load->view('rodape');
	}

	public function editarsetor()
	{
		if($this->input->post('descricao') == NULL)
		{
			redirect('setores/index');
		}	
		$dados['descricao'] = $this->input->post('descricao');
		$this->load->model('setores_model', 'setores');
		$this->setores->updateSetor($dados, $this->input->post('id'));
		redirect('setores/index');
	}

}