<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producoes extends CI_Controller
{

    public function index(){
        $this->load->model('produtos_model', 'produtos');
        $dados['produtos'] = $this->produtos->getProdutos();
        $this->load->model('producoes_model', 'producoes');
        $dados['producoes'] = $this->producoes->getProducoes();
        $this->load->view('menu');
        $this->load->view('producao/listarproducoes', $dados);
        $this->load->view('rodape');
    }

    public function salvar(){
        $dados['id_produto'] = $this->input->post('id_produto');
        $dados['qtd'] = $this->input->post('qtd');
        $dados['datasolicitacao'] = date('Y-m-d');
        $this->load->model('producoes_model', 'producoes');
        $this->producoes->addProducao($dados);
        redirect(base_url('producoes/index'));
    }

    public function info($id=NULL){
        if($id == NULL){
            redirect(base_url('producoes/index'));
        }
        $this->load->model('producoes_model', 'producoes');
        $dados['producao'] = $this->producoes->getProducaoById($id);
        $this->load->model('produtos_model', 'produtos');
        $dados['produto'] = $this->produtos->getProdutoByID($dados['producao']->id_produto);    
        $this->load->view('menu');
        $this->load->view('producao/infoproducao', $dados);
        $this->load->view('rodape');
    }

    public function aprovar($id=NULL){
        if($id == NULL){
            redirect(base_url('producoes/index'));
        }
        $this->load->model('producoes_model', 'producoes');
        $data = date('Y-m-d');
        $this->producoes->aprovarProducao($id, $data);
        redirect(base_url('producoes/index'));
    }

    public function receberproducao(){
        $this->load->model('producoes_model', 'producoes');
        $query = $this->producoes->getProducaoById($this->input->post('id'));
        $this->load->model('produtos_model', 'produtos');
        $qp = $this->produtos->getProdutoByID($query->id_produto);
        echo "<pre>";
        $qtd = $qp->qtd - $query->qtd;
        $dados['dataentrega'] = date('Y-m-d');
        $dados['lote'] = $this->input->post('lote');
        $this->producoes->receberProducao($this->input->post('id'), $dados);
        $this->produtos->atualizarQtd($qp->id, $qtd);
        redirect(base_url('producoes/index'));
    }

}