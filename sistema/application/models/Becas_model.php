<?php
class Becas_model extends CI_Model { 
  	public function __construct() {
     parent::__construct();
     $this->load->database();

      
  	}

   public function add_beca(){

  	  $id_s = $this->session->userdata('ID_SUCURSAL');
      $id_u = $this->session->userdata('RUT');
      $N_BECA = $this->input->post('N_BECA', true);
      $FECHA_INGRESO = $this->input->post('FECHA_INGRESO', true);
      $CANTIDAD = $this->input->post('CANTIDAD', true);
      $data = "INSERT INTO BECA (ID_BECA,CANTIDAD,ID_USUARIO, ID_SUCURSAL, N_BECA,FECHA_INGRESO)values (beca_seq.nextval, '$CANTIDAD', '$id_u','$id_s', '$N_BECA', TO_DATE('$FECHA_INGRESO','YY-MM-DD'))";
      $result = $this->db->query($data);
        
  	}

   public function obtener_becas(){
      $id_s = $this->session->userdata('ID_SUCURSAL');
      $this->db->select('*');
      $this->db->from('BECA');
      $this->db->where('ID_SUCURSAL', $id_s);
      $proveedor=$this->db->get();
      return $proveedor->result_array();
    }
    
    
 }
?>