<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		//carrega model historico
		$this->load->model('historico_model', 'historico');

		//carrega model produtos
		$this->load->model('produtos_model', 'produtos');

		//armazena a query do historico no array dados
		$dados['historico'] = $this->historico->getHistorico();
		//armazena a query dos produtos no array dados
		$dados['produtos'] = $this->produtos->getProdutos();

		//chama a view listarhistorico passando os dados do array pro parametro
		$this->load->view('listarhistorico', $dados);
		$this->load->view('rodape');
	}



}