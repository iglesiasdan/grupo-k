<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Carpeta_model class.
 *
 * @extends CI_Model
 */
class Carpeta_model extends CI_Model {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();
		$this->load->database();

	}

	/**
	 * create_user function.
	 *
	 * @access public
	 * @param mixed $username
	 * @param mixed $email
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */

	function guardar($data){
		$this->db->insert("",$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

function mostrar($valor,$id){
		$this->db->select('*');
		$this->db->from('Carpeta a');
		$this->db->join('Entidad b','b.id_entidad=a.id_entidad','left')
		$this->db->where('b.id_entidad',$id)
		$this->db->like("nombre_carpeta",$valor);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	function actualizar($id,$data){
		$this->db->where('id_carpeta', $id);
		$this->db->update('Carpeta', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function eliminar($id){
		$this->db->where('id_carpeta', $id);
		$this->db->delete('Carpeta');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}



}//fin del modelo
