<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reposicoes extends CI_Controller
{

	public function index()
	{

		$this->load->model("reposicoes_model", "reposicoes");
		$dados['reposicoes'] = $this->reposicoes->getReposicoes();
		$this->load->model("materiasprima_model", "materias");
		$dados['produtos'] = $this->materias->getConsumos();
		$this->load->model("departamentos_model", "departamentos");
		$dados['departamentos'] = $this->departamentos->getDepartamentos();
		$this->load->view('menu');
		$this->load->view('reposicao/listarreposicoes', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$dados['id_produto'] = $this->input->post('id_produto');
		$dados['id_departamento'] = $this->input->post('depto');
		$dados['qtd'] = $this->input->post('qtd');
		$dados['datasolicitacao'] = date('Y-m-d');
		$this->load->model("reposicoes_model", "reposicoes");
		$this->reposicoes->inserirReposicao($dados);
		redirect('reposicoes/index');		
	}

	public function info($id=NULL)
	{
		if($id == NULL){
			redirect(base_urlL('reposicoes/index'));
		}
		$this->load->model('reposicoes_model', 'reposicoes');
		$dados['reposicao'] = $this->reposicoes->getReposicaoById($id);
		$this->load->model('materiasprima_model', 'materias');
		$dados['produto'] = $this->materias->getMateriaById($dados['reposicao']->id_produto);
		$this->load->view('menu');
		$this->load->view('reposicao/inforeposicao', $dados);
		$this->load->view('rodape');
	}

	public function aprovar($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('reposicoes/index'));
		}
		$this->load->model('reposicoes_model', 'reposicoes');
		$data = date('Y-m-d');
		$query = $this->reposicoes->getReposicaoById($id);
		$this->load->model('materiasprima_model', 'materias');
		$qp = $this->materias->getConsumoById($query->id_produto);
		$qtd = $qp->qtd-$query->qtd;
		$this->materias->atualizarQtd($qp->id, $qtd);
		$this->reposicoes->aprovarReposicao($id, $data);
		//Histórico
        $this->load->model('historico_model', 'historico');
        $dadoshistorico['id_produto'] = $qp->id;
        $dadoshistorico['tipo'] = $qp->tipo == 0 ? 1 : 2;
        $dadoshistorico['qtd'] = $query->qtd;
        $dadoshistorico['valor'] = $query->qtd*$qp->valor;
        $dadoshistorico['tipo_movimentacao'] = 2;
        $dadoshistorico['data'] = date('Y-m-d');
        $this->historico->addHistorico($dadoshistorico);
		redirect(base_url('reposicoes/index'));
	}

	public function cancelar($id=NULL){
		if($id == NULL){
			redirect(base_url('reposicoes/index'));
		}
		$this->load->model('reposicoes_model', 'reposicoes');
		$this->reposicoes->cancelarReposicao($id);
		redirect(base_url('reposicoes/index'));
	}

}