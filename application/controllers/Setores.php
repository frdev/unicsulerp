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

	public function info($idsetor=NULL, $idarmazem=NULL)
	{
		$this->load->view('menu');
		$this->load->model('armazens_model', 'armazens');
		$dados['armazem'] = $this->armazens->getArmazembyId($idarmazem);
		if($dados['armazem'] == NULL)
		{
			redirect('armazens/info/' . $idarmazem);
		}
		$this->load->model('setores_model', 'setores');
		$dados['setor'] = $this->setores->getSetorById($idsetor, $idarmazem);
		if($dados['setor'] == NULL)
		{
			redirect('armazens/info/' . $idarmazem);
		}
		$this->load->model('prateleiras_model', 'prateleiras');
		$dados['prateleiras'] = $this->prateleiras->getPrateleirasBySetorArmazem($idsetor, $idarmazem);
		$this->load->view('setores/infosetor', $dados);
	}

	public function salvar()
	{
		if($this->input->post('id') == NULL || $this->input->post('descricao') == NULL)
		{
			redirect('setores/index');
		}
		$dados['id'] = $this->input->post('id');
		$dados['descricao'] = $this->input->post('descricao');
		$this->load->model('setores_model', 'setores');
		if($this->setores->getSetorUnico($dados['id']) != NULL)
		{
			redirect('setores/index');
		}
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

}