
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busqueda extends CI_Controller {
	function __construct(){
 		 parent::__construct();  
 		$this->load->helper('url');
 		$this->load->helper('form');
 		$this->load->library('form_validation');
 		$this->load->model('gene_inst_model') or die("error");
 	}

function obtenerInstrumento(){
		$opcion = $this->input->post('menu1');
		$data['instrumentos'] = $this->gene_inst_model->obtener_instrumentos();
		$data['generos'] = $this->gene_inst_model->obtener_generos();
		$data['usuarios'] = $this->gene_inst_model->instrumento($opcion);
		$data['artefactos'] = $this->gene_inst_model->instrumentos_tocar();
		$data['tipos_generos'] = $this->gene_inst_model->generos_gustar();
		$this->load->view('welcome_message',$data);
}
function obtenerGenders(){
		$opcion = $this->input->post('menu2');
		$data['artefactos'] = $this->gene_inst_model->instrumentos_tocar();
		$data['tipos_generos'] = $this->gene_inst_model->generos_gustar();
		$data['instrumentos'] = $this->gene_inst_model->obtener_instrumentos();
		$data['generos'] = $this->gene_inst_model->obtener_generos();
		$data['search_genders'] = $this->gene_inst_model->generos($opcion);
		$this->load->view('welcome_message',$data);
}
}