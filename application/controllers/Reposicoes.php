<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reposicoes extends CI_Controller
{

	public function index()
	{
		$this->load->view('menu');
		$this->load->view('listarreposicoes');
		$this->load->view('rodape');
	}

}