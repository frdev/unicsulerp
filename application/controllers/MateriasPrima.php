<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MateriasPrima extends CI_Controller
{

	public function listarmaterias()
	{
		$this->load->view('menu');
		$this->load->model('materiasprima_model', 'materiasprima');
		$dados['materias'] = $this->materiasprima->getMaterias();
		$this->load->model('armazens_model', 'armazens');
		$dados['armazens'] = $this->armazens->getArmazemByTipo(1);
		$this->load->view('materiaprima/listarmaterias', $dados);
		$this->load->view('rodape');
	}

	public function salvar()
	{
		$url = base_url('materiasprima/listarmaterias');
		//verifica se os dados passados são vazios
		if($this->input->post('descricao') == NULL){
			echo "DESCRIÇÃO VAZIA";
		} else {
			$this->load->model('materiasprima_model', 'materias');
			$dados['id_armazem'] = $this->input->post('armazem');
			$dados['tipo'] = 0;
			$dados['descricao'] = $this->input->post('descricao');
			$dados['valor'] = $this->input->post('preco');
			$dados['qtd'] = $this->input->post('qtd');
			$dados['qtdmin'] = $this->input->post('qtdmin');
			$dados['qtdmax'] = $this->input->post('qtdmax');
			$dados['acionamento'] = $this->input->post('acionamento');

			if($this->input->post('id') != NULL){
				$this->materias->editMateria($dados, $this->input->post('id'));
				redirect($url);
			} else {
				$this->materias->addMateria($dados);
				redirect($url);
			}
		}
	}

	public function editar($id=NULL){
		if($id == NULL)
		{
			redirect(base_url('materiasprima/listarmaterias'));
		}
		$this->load->model('materiasprima_model', 'materias');
		$dados['materia'] = $this->materias->getMateriaById($id);
		if($dados['materia'] == NULL)
		{
			redirect(base_url('materiasprima/listarmaterias'));
		}
		$this->load->model('armazens_model', 'armazens');
		$dados['armazens'] = $this->armazens->getArmazemByTipo(1);
		$this->load->view('menu');
		$this->load->view('materiaprima/editarmateriaprima', $dados);
		$this->load->view('rodape');
	}

	public function apagar($id=NULL){
		if($id == NULL){
			redirect(base_url('materiasprima/listarmaterias'));
		}
		$this->load->model('materiasprima_model', 'materias');
		$this->materias->deleteMateria($id);
		redirect(base_url('materiasprima/listarmaterias'));
	}

	public function listarconsumos()
	{
		$this->load->view('menu');
		$this->load->model('materiasprima_model', 'materias');
		$dados['consumos'] = $this->materias->getConsumos();
		$this->load->model('armazens_model', 'armazens');
		$dados['armazens'] = $this->armazens->getArmazemByTipo(2);
		$this->load->view('consumo/listarconsumos', $dados);
		$this->load->view('rodape');
	}

	public function salvarconsumo()
	{
		$url = base_url('materiasprima/listarconsumos');
		//verifica se os dados passados são vazios
		if($this->input->post('descricao') == NULL){
			echo "DESCRIÇÃO VAZIA";
		} else {
			$this->load->model('materiasprima_model', 'materiasprima');
			$dados['id_armazem'] = $this->input->post('armazem');
			$dados['tipo'] = 1;
			$dados['descricao'] = $this->input->post('descricao');
			$dados['valor'] = $this->input->post('preco');
			$dados['qtd'] = $this->input->post('qtd');
			$dados['qtdmin'] = $this->input->post('qtdmin');
			$dados['qtdmax'] = $this->input->post('qtdmax');
			$dados['acionamento'] = $this->input->post('acionamento');

			if($this->input->post('id') != NULL){
				$this->materiasprima->updateConsumo($dados, $this->input->post('id'));
				redirect($url);
			} else {
				$this->materiasprima->addConsumo($dados);
				redirect($url);
			}
		}
	}

	public function editarconsumo($id=NULL){
		if($id == NULL){
			redirect(base_url('materiasprima/listarconsumos'));
		}
		$this->load->model('materiasprima_model', 'materias');
		$dados['consumo'] = $this->materias->getConsumoById($id);
		$this->load->model('armazens_model', 'armazens');
		$dados['armazens'] = $this->armazens->getArmazemByTipo(2);
		$this->load->view('menu');
		$this->load->view('consumo/editarconsumo', $dados);
		$this->load->view('rodape');
	}

	public function apagarconsumo($id=NULL){
		if($id == NULL){
			redirect(base_url('materiasprima/listarconsumos'));
		}
		$this->load->model('materiasprima_model', 'materias');
		$this->materias->deleteConsumo($id);
		redirect(base_url('materiasprima/listarconsumos'));
	}

	public function infomateria($id=NULL){
		$url = base_url('materiasprima/listarmaterias');
		if($id==NULL){
			redirect($url);
		}

		$this->load->model('materiasprima_model', 'materias');

		$query = $this->materias->getMateriaByID($id);

		if($query == NULL){
			redirect($url);
		} else {
			$this->load->model('historico_model', 'historico');
			$dados['produto'] = $query;
			$dados['historico'] = $this->historico->getHistoricoByIdTipo($id, 1);
			$this->load->view('menu');
			$this->load->view('consumo/infoconsumo', $dados);
			$this->load->view('rodape');
		}
	}

	public function infoconsumo($id=NULL){
		$url = base_url('materiasprima/listarmaterias');
		if($id==NULL){
			redirect($url);
		}

		$this->load->model('materiasprima_model', 'materias');

		$query = $this->materias->getConsumoById($id);

		if($query == NULL){
			redirect($url);
		} else {
			$this->load->model('historico_model', 'historico');
			$dados['produto'] = $query;
			$dados['historico'] = $this->historico->getHistoricoByIdTipo($id, 2);
			$this->load->view('menu');
			$this->load->view('consumo/infoconsumo', $dados);
			$this->load->view('rodape');
		}
	}

}