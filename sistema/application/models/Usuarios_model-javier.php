<?php
class Usuarios_model extends CI_Model { 
   public function __construct() {
     parent::__construct();
     $this->load->database();
   }

   public function usuario_por_nombre_contrasena($RUT, $CLAVE){
      $this->db->select('RUT, NOMBRE, APELLIDOS, ID_PERFIL, ID_SUCURSAL');
      $this->db->from('USUARIO');
      $this->db->where('RUT', $RUT);
      $this->db->where('CLAVE', $CLAVE);
      $consulta = $this->db->get();
      $resultado = $consulta->row();
      return $resultado;
   }
}