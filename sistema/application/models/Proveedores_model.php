<?php
class Proveedores_model extends CI_Model { 
  	public function __construct() {
     parent::__construct();
  	 $this->load->database();
    }

  	public function obtener_todos(){

  		$this->load->database('SCA');
  		$this->db->select('*');
  		$this->db->from('PROVEEDOR');
	    $this->db->order_by('NOMBRE_P', 'asc');
	    $result = $this->db->get();

	    return  $result->result_array();
  	}
  	public function add(){
  	
        $NOMBRE_P = $this->input->post('NOMBRE_P');
         $TELEFONO = $this->input->post('TELEFONO');
         $DIRECCION = $this->input->post('DIRECCION');
        $data = "INSERT INTO PROVEEDOR(ID_PROVEEDOR, NOMBRE_P, TELEFONO, DIRECCION) values(proveedor_seq.nextval, '$NOMBRE_P', '$TELEFONO', '$DIRECCION')";
        $result = $this->db->query($data); 
    
    return $result;
  	}

  	
  	public function delete($id){
  		$this->db->where('ID_PROVEEDOR', $id);
      return $this->db->delete('PROVEEDOR');



  	}
    public function obtener_proveedor($id){
      $this->db->where('ID_PROVEEDOR', $id);
        $query = $this->db->get('PROVEEDOR');
        if ($query->num_rows() > 0){
        return $query;
       }else{
        return FALSE;
       }
    }
    
    public function editar_proveedor($id, $data){
        $this->db->where('ID_PROVEEDOR', $id);
        $this->db->update('PROVEEDOR', $data);

    }
    
 }
?>