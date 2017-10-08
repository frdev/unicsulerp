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
		$this->load->view('venda/listarvendas', $dados);
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
		$this->load->view('venda/infovenda', $dados);
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

	public function aprovarvenda()
	{
		$url = base_url('vendas/index');
		$this->load->model('vendas_model', 'vendas');
		$query = $this->vendas->getVendaByID($this->input->post('id'));
		$this->load->model('produtos_model', 'produtos');
		$qp = $this->produtos->getProdutoById($query->id_produto);
		$qtd = $qp->qtd - $query->qtd;
		$dados['data'] = date('Y-m-d');
		$dados['nfvenda'] = $this->input->post('nf');
		$this->vendas->aprovaVenda($this->input->post('id'), $dados);
		$this->produtos->atualizarQtd($qp->id, $qtd);
		//Histórico
        $this->load->model('historico_model', 'historico');
        $dadoshistorico['id_produto'] = $qp->id;
        $dadoshistorico['tipo'] = 0;
        $dadoshistorico['qtd'] = $query->qtd;
        $dadoshistorico['valor'] = $query->qtd*$qp->valor;
        $dadoshistorico['tipo_movimentacao'] = 1;
        $dadoshistorico['data'] = date('Y-m-d');
        $this->historico->addHistorico($dadoshistorico);
		redirect($url);
	}

}