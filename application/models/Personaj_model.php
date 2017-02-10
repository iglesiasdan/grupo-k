<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Personaj_model class.
 *
 * @extends CI_Model
 */
class Personaj_model extends CI_Model {

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
		$this->db->insert("Entidad",$data);

		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function mostrar($valor){
		$tipo="PERSONA JURIDICA";
		$this->db->select('*');
		$this->db->from('Entidad');
		$this->db->where("tipo", $tipo);
		$this->db->like("nombre",$valor);
		$this->db->or_like('ubicacion', $valor);
		$consulta = $this->db->get();
		return $consulta->result();
	}

	function actualizar($id,$data){
		$this->db->where('id_entidad', $id);
		$this->db->update('Entidad', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

	function eliminar($id){
		$this->db->where('id_entidad', $id);
		$this->db->delete('Entidad');
		if ($this->db->affected_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}

}//fin del modelo
