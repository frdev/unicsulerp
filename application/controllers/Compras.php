<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->model('produtos_model', 'produtos');
		$this->load->model('compras_model', 'compras');

		$qp = $this->produtos->getProdutos();
		$query = $this->compras->getCompras();
		$dados['compras'] = $query;
		$dados['produtos'] = $qp;
		$this->load->view('listarcompras', $dados);
		$this->load->view('rodape');
	}

	public function produto($id=NULL)
	{
		$url = base_url('compras/index');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('produtos_model', 'produtos');
		$this->load->model('usuarios_model', 'usuarios');
		$this->load->model('fornecedores_model', 'fornecedores');

		$qp = $this->produtos->getProdutoByID($id);

		if($qp == NULL)
		{
			redirect($url);
		}

		$qu = $this->usuarios->getUsuarios();
		$qf = $this->fornecedores->getFornecedores();

		$dados['produto'] = $qp;
		$dados['fornecedores'] = $qf;
		$dados['usuarios'] = $qu;


		$this->load->view('menu');
		$this->load->view('compraproduto', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$data = date("Y-m-d");
		$url = base_url('compras/index');
		$this->load->model('compras_model', 'compras');
		$dados['id_produto'] = $this->input->post('idproduto');
		$dados['id_fornecedor'] = $this->input->post('fornecedor');
		$dados['id_usuario'] = $this->input->post('usuario');
		$dados['qtd'] = $this->input->post('qtdcomprar');
		$dados['valor'] = $this->input->post('valor');
		$dados['datasolicitacao'] = $data;
		$this->compras->addCompra($dados);
		redirect($url);
	}

	public function info($id=NULL)
	{
		$url = base_url('compras/index');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('produtos_model', 'produtos');
		$this->load->model('fornecedores_model', 'fornecedores');
		$this->load->model('compras_model', 'compras');
		$this->load->model('usuarios_model', 'usuarios');
		$query = $this->compras->getCompraByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$qp = $this->produtos->getProdutos();
		$qf = $this->fornecedores->getFornecedores();
		$qu = $this->usuarios->getUsuarios();

		$dados['compra'] = $query;
		$dados['produtos'] = $qp;
		$dados['fornecedores'] = $qf;
		$dados['usuarios'] = $qu;

		$this->load->view('menu');
		$this->load->view('infocompra', $dados);
		$this->load->view('rodape');
	}

	public function aprovarcompra($id=NULL)
	{

		$url = base_url('compras/index');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('compras_model', 'compras');
		$query = $this->compras->getCompraByID($id);

		if($query == NULL)
		{
			redirect($url);
		}
		$data = date('Y-m-d');
		$this->compras->aprovaCompra($id, $data);
		redirect($url);
	}

	public function aguardarentrega($id=NULL)
	{

		$url = base_url('compras/index');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('compras_model', 'compras');
		$query = $this->compras->getCompraByID($id);

		if($query == NULL)
		{
			redirect($url);
		}
		$data = date('Y-m-d');
		$this->compras->aguardaEntrega($id);
		redirect($url);
	}

	public function receberentrega($id=NULL)
	{

		$url = base_url('compras/index');

		if($id == NULL)
		{
			redirect($url);
		}

		//carrega a model compras
		$this->load->model('compras_model', 'compras');
		//pega o id da compra
		$query = $this->compras->getCompraByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		//carrega a model produtos
		$this->load->model('produtos_model', 'produtos');
		//pega a query do produto pelo id do produto na compra
		$qp = $this->produtos->getProdutoByID($query->id_produto);

		//carrega a model historico
		$this->load->model('historico_model', 'historico');

		//Inicializa uma variável com a quantidade atual
		$qtd = $query->qtd + $qp->qtd;
		//pega data atual
		$data = date('Y-m-d');

		//pega os elementos para realizar a inserção no historico
		$dados['id_produto'] = $query->id_produto;
		$dados['movimentacao'] = 'Compra';
		$dados['qtd'] = $query->qtd;
		$dados['data'] = $data;

		//atualiza o status da compra para entregue com a data atual pelo $id
		$this->compras->recebeEntrega($id, $data);
		//atualiza a quantidade de produtos
		$this->produtos->atualizarQtd($qp->id, $qtd);

		//insere o histórico
		$this->historico->addHistorico($dados);

		//redireciona
		redirect($url);
	}

	public function cancelarcompra($id=NULL)
	{
		$url = base_url('compras/index');

		if($id == NULL)
		{
			redirect($url);
		}

		$this->load->model('compras_model', 'compras');
		$query = $this->compras->getCompraByID($id);

		if($query == NULL)
		{
			redirect($url);
		}

		$this->compras->cancelacompra($id);
		redirect($url);
	}

}