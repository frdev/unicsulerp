<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reposicoes extends CI_Controller
{

	public function index()
	{

		$this->load->model("reposicoes_model", "reposicoes");
		$dados['reposicoes'] = $this->reposicoes->getReposicoes();
		$this->load->model("produtos_model", "produtos");
		$dados['produtos'] = $this->produtos->getProdutos();
		$this->load->model("departamentos_model", "departamentos");
		$dados['departamentos'] = $this->departamentos->getDepartamentos();
		$this->load->view('menu');
		$this->load->view('listarreposicoes', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$dados['id_produto'] = $this->input->post('id_produto');
		$dados['id_departamento'] = $this->input->post('depto');
		$dados['qtd'] = $this->input->post('qtd');
		$dados['datasolicitacao'] = date('Y-m-d');
		if($dados['produto'] == NULL || $dados['qtd'] == NULL || $dados['departamento'] == NULL)
		{
			//(base_url('reposicoes/index'));
		}
		$this->load->model("reposicoes_model", "reposicoes");
		
		if($this->input->post('id') != NULL){
			$datareposicao = date('Y-m-d');
			$this->reposicoes->editReposicao($this->input->post('id'), $datareposicao);
			redirect('reposicoes/index');
		} else 
		{
			$this->reposicoes->inserirReposicao($dados);
			redirect('reposicoes/index');	
		}		
	}

}