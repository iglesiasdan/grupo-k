<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Persona Natural class.
 * 
 * @extends CI_Controller
 */
class Personan extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('Personan_model');
		$this->load->model('user_model');
		
	}
	
	
	public function index() {
		
		$this->load->view('personan/header');
		$this->load->view('personan/personan');
		$this->load->view('footer');
		
	}

	function guardar(){
		//El metodo is_ajax_request() de la libreria input permite verificar
		//si se esta accediendo mediante el metodo AJAX 
		if ($this->input->is_ajax_request()) {
			$nombres = $this->input->post("nombre");
			$apellidos = $this->input->post("ubicacion");

			$datos = array(
				"nombre" => strtoupper($nombres),
				"ubicacion" => strtoupper($apellidos),
				"tipo" => "PERSONA NATURAL"
				);
			if($this->Personan_model->guardar($datos)==true)
				echo "Registro Guardado";
			else
				echo "No se pudo guardar los datos";
		}
		else
		{
			show_404();
		}


	}

	function mostrar(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");
			$datos = $this->Personan_model->mostrar($buscar);
			echo json_encode($datos);
			
		}
		else
		{
			show_404();
		}
	}

	function actualizar(){
		if ($this->input->is_ajax_request()) {
			$idsele = $this->input->post("idsele");
			$nombres = $this->input->post("nombresele");
			$apellidos = $this->input->post("ubicacionsele");
			$datos = array(
				"nombre" => strtoupper($nombres),
				"ubicacion" => strtoupper($apellidos)
				);
			if($this->Personan_model->actualizar($idsele,$datos) == true)
				echo "Registro Actualizado";
			else
				echo "No se pudo actualizar los datos";
			
		}
		else
		{
			show_404();
		}
	}


	function eliminar(){
		if ($this->input->is_ajax_request()) {
			$idsele = (integer)$_POST['id'];
			if($prueba = ($this->Personan_model->eliminar($idsele)) == true)
				echo "Registro Eliminado";
			else
				echo "No se pudo eliminar los datos";
			
		}
		else
		{
			show_404();
		}
	}

}//fin del controlador