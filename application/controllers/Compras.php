<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->model('materiasprima_model', 'materias');
		$this->load->model('compras_model', 'compras');
		$query = $this->compras->getCompras();
		$dados['compras'] = $query;
		$dados['materias'] = $this->materias->getMaterias();
		$dados['consumos'] = $this->materias->getConsumos();
		$dados['todos'] = $this->materias->getAll();
		$this->load->view('compra/listarcompras', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$data = date("Y-m-d");
		$url = base_url('compras/index');
		$this->load->model('compras_model', 'compras');
		$dados['id_produto'] = $this->input->post('id_produto');
		$dados['qtd'] = $this->input->post('qtd');
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

		$this->load->model('materiasprima_model', 'materia');
		$this->load->model('fornecedores_model', 'fornecedores');
		$this->load->model('compras_model', 'compras');
		$this->load->model('usuarios_model', 'usuarios');
		$query = $this->compras->getCompraByID($id);
		if($query == NULL)
		{
			redirect($url);
		}
		$dados['compra'] = $query;
		$dados['produtos'] = $this->materia->getAll();
		$dados['fornecedores'] = $this->fornecedores->getFornecedores();
		$dados['usuarios'] = $this->usuarios->getUsuarios();
		$this->load->view('menu');
		$this->load->view('compra/infocompra', $dados);
		$this->load->view('rodape');
	}

	public function gerarorc()
	{
		$url = base_url('compras/index');
		$this->load->model('compras_model', 'compras');
		$dados['id'] = $this->input->post('id');
		$dados['id_fornecedor'] = $this->input->post('fornecedor');
		$dados['valor'] = $this->input->post('valor');
		$this->compras->gerarOrcamento($dados);
		redirect($url);
	}

	public function aprovarorc($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('compras/index'));
		}
		$this->load->model('compras_model', 'compras');
		$data = date('Y-m-d');
		$this->compras->aprovarOrcamento($id, $data);
		redirect(base_url('compras/index'));
	}

	public function receberentrega()
	{
		$url = base_url('compras/index');
		//carrega a model compras
		$this->load->model('compras_model', 'compras');
		//pega a query da compra
		$query = $this->compras->getCompraByID($this->input->post('id'));
		//carrega a model produtos
		$this->load->model('materiasprima_model', 'materias');
		//pega a query do produto pelo id do produto na compra
		$materia = $this->materias->getMateriaById($query->id_produto);
		//Inicializa uma variável com a quantidade atual
		$qtd = $query->qtd + $materia->qtd;
		//pega data atual
		$dados['data'] = date('Y-m-d');
		$dados['nfcompra'] = $this->input->post('nf');
		//atualiza o status da compra para entregue com a data atual pelo $id
		$this->compras->recebeEntrega($this->input->post('id'), $dados);
		//atualiza a quantidade de produtos
		$this->materias->atualizarQtd($materia->id, $qtd);
		//Histórico
        $this->load->model('historico_model', 'historico');
        $dadoshistorico['id_produto'] = $materia->id;
        $dadoshistorico['tipo'] = $materia->tipo == 0 ? 1 : 2;
        $dadoshistorico['qtd'] = $query->qtd;
        $dadoshistorico['valor'] = $query->qtd*$materia->valor;
        $dadoshistorico['tipo_movimentacao'] = 2;
        $dadoshistorico['data'] = date('Y-m-d');
        $this->historico->addHistorico($dadoshistorico);
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