<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->view('painel');
		$this->load->view('rodape');
	}


	public function listarprodutos()
	{
		$this->load->view('menu');
		$this->load->model('produtos_model', 'produtos');
		$data['produtos'] = $this->produtos->getProdutos();
		$this->load->view('listarprodutos', $data);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$url = base_url('produtos/listarprodutos');
		//verifica se os dados passados são vazios
		if($this->input->post('descricao') == NULL){
			echo "DESCRIÇÃO VAZIA";
		} else {
			$this->load->model('produtos_model', 'produtos');
			$dados['descricao'] = $this->input->post('descricao');
			$dados['tipo'] = $this->input->post('tipo');
			$dados['status'] = $this->input->post('status');
			$dados['preco'] = $this->input->post('preco');
			$dados['qtd'] = $this->input->post('qtd');
			$dados['acionamento'] = $this->input->post('acionamento');
			$dados['min'] = $this->input->post('qtdmin');
			$dados['max'] = $this->input->post('qtdmax');

			$descricao = $this->input->post('descricao');

			if($this->input->post('id') != NULL){
				$this->produtos->editarProduto($dados, $this->input->post('id'));
				redirect($url);
			} else {
				$query = $this->produtos->checkProduto($descricao);
				if($query == NULL)
				{
					$this->produtos->addProduto($dados);
					redirect($url);
				} else 
				{
					redirect($url);
				}	
			}
		}
	}

	public function painel()
	{
		$this->load->view('menu');
		$this->load->view('painel');
		$this->load->view('rodape');
	}

	public function editar($id=NULL){
		$url = base_url('produtos/listarprodutos');
		if($id==NULL){
			redirect($url);
		}

		$this->load->model('produtos_model', 'produtos');

		$query = $this->produtos->getProdutoByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$dados['produto'] = $query;

		$this->load->view('menu');
		$this->load->view('editarproduto', $dados);
		$this->load->view('rodape');
	}

	public function apagar($id=NULL){
		$url = base_url('produtos/listarprodutos');
		if($id==NULL){
			redirect($url);
		}

		$this->load->model('produtos_model', 'produtos');

		$query = $this->produtos->getProdutoByID($id);

		if($query != NULL){
			$this->produtos->apagarProduto($query->id);
			redirect($url);
		} else {
			redirect($url);
		}

	}

	public function info($id=NULL){
		$url = base_url('produtos/listarprodutos');
		if($id==NULL){
			redirect($url);
		}

		$this->load->model('produtos_model', 'produtos');

		$query = $this->produtos->getProdutoByID($id);

		if($query == NULL){
			redirect($url);
		} else {
			$dados['produto'] = $query;
			$this->load->view('menu');
			$this->load->view('infoproduto', $dados);
			$this->load->view('rodape');
		}

	}

}
