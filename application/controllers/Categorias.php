<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->model('categorias_model', 'categorias');
		$dados['categorias'] = $this->categorias->getCategorias();
		$this->load->model('setores_model', 'setores');
		$dados['setores'] = $this->setores->getSetores();
		$this->load->view('categoria/listarcategorias', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		if($this->input->post('descricao') == "")
		{
			redirect(base_url('categorias/index'));
		}
		$this->load->model('categorias_model', 'categorias');
		$result = $this->categorias->getCategoriaById($this->input->post('id'));
		if($result != NULL)
		{
			$this->session->set_userdata('categoria', 'Erro ao inserir.');
			redirect(base_url('categorias/index'));
		}
		$dados['id_setor'] = $this->input->post('setor');
		$dados['descricao'] = strtoupper($this->input->post('descricao'));
		$this->categorias->addCategoria($dados);
		$this->session->set_userdata('categoria', 'Categoria '.$dados['descricao'].' inserida com sucesso.');
		redirect(base_url('categorias/index'));
	}

	public function apagar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('categorias/index'));
		}
		$this->load->model('categorias_model', 'categorias');
		$result = $this->categorias->getCategoriaById($id);
		if($result == NULL)
		{
			$this->session->set_userdata('categoria', 'Erro ao excluir.');
			redirect(base_url('categorias/index'));
		}
		$this->session->set_userdata('categoria', 'Categoria '.$result->descricao.' excluída com sucesso.');
		$this->categorias->deleteCategoria($id);
		redirect(base_url('categorias/index'));
	}

	public function editar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('categorias/index'));
		}
		$this->load->model('categorias_model', 'categorias');
		$dados['categoria'] = $this->categorias->getCategoriaById($id);
		if($dados['categoria'] == NULL)
		{
			redirect(base_url('categorias/index'));
		}
		$this->load->model('setores_model', 'setores');
		$dados['setores'] = $this->setores->getSetores();
		$this->load->view('menu');
		$this->load->view('categoria/editarcategoria', $dados);
		$this->load->view('rodape');
	}

	public function editarcategoria()
	{
		if($this->input->post('descricao') == NULL || $this->input->post('setor') == NULL)
		{
			$this->session->set_userdata('categoria', 'Não é possível cadastrar categoria sem descrição ou setor.');
			redirect(base_url('categorias/index'));
		}
		$this->load->model('categorias_model', 'categorias');
		$dados['id_setor'] = $this->input->post('setor');
		$dados['descricao'] = strtoupper($this->input->post('descricao'));
		$this->categorias->updateCategoria($dados, $this->input->post('id'));
		$this->session->set_userdata('categoria', 'Categoria '.$dados['descricao'].' editada com sucesso.');
		redirect(base_url('categorias/index'));
	}

}