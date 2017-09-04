<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->model('vendas_model', 'vendas');
		$dados['vendas'] = $this->vendas->getVendas();
		$this->load->model('produtos_model', 'produtos');
		$dados['produtos'] = $this->produtos->getProdutos();
		$this->load->view('listarvendas', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$url = base_url('vendas/index');
		$data = date('Y-m-d');
		$this->load->model('vendas_model', 'vendas');
		$dados['id_produto'] = $this->input->post('id_produto');
		$dados['qtd'] = $this->input->post('qtd');
		$dados['datasolicitacao'] = $data;
		$this->vendas->addVendas($dados);
		redirect($url);
	}

	public function info($id=NULL)
	{
		$url = base_url('vendas/index');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('vendas_model', 'vendas');
		$query = $this->vendas->getVendaByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$this->load->model('produtos_model', 'produtos');
		$qp = $this->produtos->getProdutoByID($query->id_produto);

		$dados['venda'] = $query;
		$dados['produto'] = $qp;

		$this->load->view('menu');
		$this->load->view('infovenda', $dados);
		$this->load->view('rodape');

	}

	public function cancelar($id=NULL)
	{
		$url = base_url('vendas/index');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('vendas_model', 'vendas');
		$query = $this->vendas->getVendaByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$this->vendas->cancelaVenda($id);
		redirect($url);

	}

	public function aprovarvenda($id=NULL)
	{
		$url = base_url('vendas/index');

		if($id == NULL)
		{
			redirect($url);
		}

		//carrega model vendas
		$this->load->model('vendas_model', 'vendas');
		$query = $this->vendas->getVendaByID($id);

		//se a query é nula, redireciona
		if($query == NULL)
		{
			redirect($url);
		}

		//carrega model produtos
		$this->load->model('produtos_model', 'produtos');
		$qp = $this->produtos->getProdutoByID($query->id_produto);

		//subtrai quantidade para passar por parametro
		$qtd = $qp->qtd - $query->qtd;

		//pega data atual
		$data = date('Y-m-d');

		//pega os elementos para realizar a inserção no historico
		$dados['id_produto'] = $query->id_produto;
		$dados['movimentacao'] = 'Venda';
		$dados['qtd'] = $query->qtd;
		$dados['data'] = $data;

		//método da model vendas para aprovar vendas
		$this->vendas->aprovaVenda($id, $data);
		//carrega model historico
		$this->load->model('historico_model', 'historico');
		//adiciona o historico de acordo com os dados do vetor $dados
		$this->historico->addHistorico($dados);
		//atualiza quantidade do item em estoque
		$this->produtos->atualizarQtd($qp->id, $qtd);
		//redireciona
		redirect($url);
	}

}