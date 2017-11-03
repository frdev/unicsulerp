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
        $this->session->set_userdata('producao', 'Solicitação de Produção realizada com sucesso.');
        redirect(base_url('producoes/index'));
    }

    public function info($id=NULL){
        if($id == NULL){
            $this->session->set_userdata('producao', 'Informações da Solicitação de Produção não encontradas, selecione novamente.');
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
        $this->session->set_userdata('producao', 'Solicitação de Produção '.$id.' aprovada com sucesso, aguardando recebimento do produto.');
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
        //Histórico
        $this->load->model('historico_model', 'historico');
        $dadoshistorico['id_produto'] = $qp->id;
        $dadoshistorico['id_solicitacao'] = $id;
        $dadoshistorico['tipo'] = 0;
        $dadoshistorico['qtd'] = $query->qtd;
        $dadoshistorico['valor'] = 0;
        $dadoshistorico['tipo_movimentacao'] = 3;
        $dadoshistorico['data'] = date('Y-m-d');
        $this->session->set_userdata('producao', 'Recebida entrega da Solicitação de Produção '.$id.'.');
        redirect(base_url('producoes/index'));
    }

}