<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends CI_Controller
{

	public function index(){
		$this->load->view('menu');
		$this->load->view('index');
		$this->load->view('rodape');
	}


}

?>