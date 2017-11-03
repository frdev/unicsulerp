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
		$dados['tipo_produto'] = $this->input->post('tipo');
		$dados['qtd'] = $this->input->post('qtd');
		if($dados['id_produto'] == NULL || $dados['tipo_produto'] == NULL || $dados['qtd'] == NULL){
			$this->session->set_userdata('compra', 'Erro ao cadastrar solicitação de compra. Os campos não podem estar vazios');
		}
		$dados['datasolicitacao'] = $data;
		$this->session->set_userdata('compra', 'Solicitação de Compra inserida com sucesso.');
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
		$dados['fornecedoresAtivos'] = $this->fornecedores->getFornecedoresAtivos();
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
		if($dados['id_fornecedor'] == NULL || $dados['valor'] == NULL){
			$this->session->set_userdata('compra', 'Erro ao gerar orçamento da Solicitação de Compra ' . $dados['id'] . ': Campos "Fornecedor/Valor" não podem estar vazios.');
			redirect($url);
		}
		$this->session->set_userdata('compra', 'Orçamento da Solicitação de Compra '.$dados['id'].' enviado com sucesso.');
		$this->compras->gerarOrcamento($dados);
		redirect($url);
	}

	public function aprovarorc($id=NULL)
	{
		if($id == NULL)
		{
			$this->session->set_userdata('compra', 'Solicitação de Compra inválida, selecione novamente.');
			redirect(base_url('compras/index'));
		}
		$this->load->model('compras_model', 'compras');
		$data = date('Y-m-d');
		$this->compras->aprovarOrcamento($id, $data);
		$this->session->set_userdata('compra', 'Aprovado Orçamento da Solicitação de Compra '.$dados['id'].', aguardando entrega.');
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
		if($dados['nfcompra'] == NULL){
			$this->session->set_userdata('compra', 'Erro ao receber Produto: Campo "NF" não pode ser vazio..');
			redirect($url);
		}
		//atualiza o status da compra para entregue com a data atual pelo $id
		$this->compras->recebeEntrega($this->input->post('id'), $dados);
		//atualiza a quantidade de produtos
		$this->materias->atualizarQtd($materia->id, $qtd);
		//Histórico
        $this->load->model('historico_model', 'historico');
        $dadoshistorico['id_produto'] = $materia->id;
        $dadoshistorico['id_solicitacao'] = $this->input->post('id');
        $dadoshistorico['tipo'] = $this->input->post('tipo');
        $dadoshistorico['qtd'] = $query->qtd;
        $dadoshistorico['valor'] = $query->valor;
        $dadoshistorico['tipo_movimentacao'] = 0;
        $dadoshistorico['data'] = date('Y-m-d');
        $this->historico->addHistorico($dadoshistorico);
        $this->session->set_userdata('compra', 'Confirmado Recebimento da Entrega da Solicitação de Compra '.$this->input->post('id').'.');
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
		$this->session->set_userdata('compra', 'Cancelada Solicitação de Compra '.$id.'.');
		redirect($url);
	}

}