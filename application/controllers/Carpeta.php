<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once('Personaj.php');

/**
 * Carpeta class.
 *
 * @extends CI_Controller
 */
class Carpeta extends CI_Controller {

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
		$this->load->model('user_model');
		$this->load->model('Carpeta_model');
		$this->load->model('Personaj_model');

	}


	public function index() {
		// $personaj = new Personaj();
		//var_dump($_REQUEST['var1']);
		$variable['vista'] =  $_REQUEST['var1'];
		//$variable['vista'] = $personaj->mostrar();
		$numero = explode("'",$variable['vista']);
		$this->mostrarr($numero[1]);
		$this->load->view('carpeta/carpeta',$variable);


	}

	// funcion para mostrar la persona juridica a la que pertenece la carpeta
	public function mostrarr($id){

		if ($id) {
			echo $id;
			$buscar =(integer)$id;
			$datos = $this->Personaj_model->mostrar($buscar);
			var_dump($datos);
			// echo json_encode($datos);

		}
		else
		{
			show_404();
		}
	}

	public function mostrar_carpeta(){
		// echo "hola";
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post("buscar");
			$datos = $this->Carpeta_model->mostrar($buscar);
			echo json_encode($datos);

		}
		else
		{
			show_404();
		}
	}

}//fin del controlador

function guardar(){
	//El metodo is_ajax_request() de la libreria input permite verificar
	//si se esta accediendo mediante el metodo AJAX
	if ($this->input->is_ajax_request()) {
		$nombres = $this->input->post("nombre");

		$datos = array(
			"nombre_carpeta" => strtoupper($nombres)
			);
		if($this->Carpeta_model->guardar($datos)==true)
			echo "Registro Guardado";
		else
			echo "No se pudo guardar los datos";
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
		$datos = array(
			"nombre_carpeta" => strtoupper($nombres)
			);
		if($this->Carpeta_model->actualizar($idsele,$datos) == true)
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
		if($prueba = ($this->Carpeta_model->eliminar($idsele)) == true)
			echo "Registro Eliminado";
		else
			echo "No se pudo eliminar los datos";

	}
	else
	{
		show_404();
	}
}
