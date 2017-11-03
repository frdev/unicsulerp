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
			$this->session->set_userdata('setor', 'Não é possível registrar um Armazém sem descrição.');
			redirect('setores/index');
		}
		$dados['descricao'] = strtoupper($this->input->post('descricao'));
		$this->load->model('setores_model', 'setores');
		$this->setores->addSetor($dados);
		$this->session->set_userdata('setor', 'Setor '.$dados['descricao'].' inserido com sucesso.');
		redirect('setores/index');
	}

	public function apagar($id=NULL)
	{
		if($id == NULL)
		{
			redirect('armazens/index');
		}
		$this->load->model('setores_model', 'setores');
		$setor = $this->setores->getSetorUnico($id);
		if($setor == NULL)
		{
			redirect('setores/index');
		}
		$this->setores->deleteSetor($id);
		$this->session->set_userdata('setor', 'Setor '.$dados['descricao'].' excluído com sucesso.');
		redirect('setores/index');
	}

	public function editar($id=NULL)
	{
		if($id == NULL)
		{
			$this->session->set_userdata('setor', 'Setor não encontrado, selecione novamente.');
			redirect('setores/index');
		}
		$this->load->model('setores_model', 'setores');
		if($this->setores->getSetorUnico($id) == NULL)
		{
			$this->session->set_userdata('setor', 'Setor não encontrado, selecione novamente.');
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
			$this->session->set_userdata('setor', 'Erro ao editar Setor, campo descrição estava vazio.');
			redirect('setores/index');
		}	
		$dados['descricao'] = strtoupper($this->input->post('descricao'));
		$this->load->model('setores_model', 'setores');
		$this->setores->updateSetor($dados, $this->input->post('id'));
		$this->session->set_userdata('setor', 'Setor '.$dados['descricao'].' editado com sucesso.');
		redirect('setores/index');
	}

}