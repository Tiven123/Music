<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model('gene_inst_model');
		$data['instrumentos'] = $this->gene_inst_model->obtener_instrumentos();
		$data['generos'] = $this->gene_inst_model->obtener_generos();
		$this->load->view('welcome_message',$data);

	}
}
