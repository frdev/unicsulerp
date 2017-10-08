<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico extends CI_Controller{

    public function index(){
        $this->load->model('produtos_model', 'produtos');
        $this->load->model('materiasprima_model', 'materias');
        $this->load->model('historico_model', 'historico');
        $dados['historico'] = $this->historico->getHistorico();
        $dados['produtos'] = $this->produtos->getProdutos();
        $dados['materias'] = $this->materias->getAll();
        $this->load->view('menu');
        $this->load->view('historico/listarhistorico', $dados);
        $this->load->view('rodape');
    }

}