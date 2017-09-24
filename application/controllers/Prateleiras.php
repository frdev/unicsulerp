<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prateleiras extends CI_Controller
{

	public function tabela($id=NULL)
	{
		if($id == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$this->load->model('prateleiras_model', 'prateleiras');
		$dados['prateleira'] = $this->prateleiras->getPrateleiraById($id);
		if($dados['prateleira'] == NULL)
		{
			redirect(base_url('armazens/index'));
		}
		$this->load->view('menu');
		$this->load->view('prateleira/tabelaprateleira', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		if($this->input->post('id_setor') != "" && $this->input->post('id_armazem') != "" && $this->input->post('id') != "")
		{
			$dados['id_setor'] = $this->input->post('id_setor');
			$dados['id_armazem'] = $this->input->post('id_armazem');
			$dados['id'] = $this->input->post('id');
			$dados['posicoesx'] = $this->input->post('dx');
			$dados['posicoesy'] = $this->input->post('dy');
			$this->load->model('prateleiras_model', 'prateleiras');
			$result = $this->prateleiras->getPrateleiraById($dados['id']);
			if($result != NULL)
			{
				redirect(base_url('armazens/index'));
			} else 
			{
				$this->prateleiras->addPrateleira($dados);
				redirect(base_url('setores/info/' . $dados['id_setor'] . '/' . $dados['id_armazem']));
			}
		} else 
		{
			redirect(base_url('armazens/index'));
		}
	}

}