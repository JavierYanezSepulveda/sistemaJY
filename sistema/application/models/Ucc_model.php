<?php
class Ucc_model extends CI_Model { 
  	public function __construct() {
     parent::__construct();
  	 $this->load->database();
    }

  	public function obtener_todos(){

  		$this->load->database('SCA');
  		$this->db->select('*');
  		$this->db->from('UCC');
	    $this->db->order_by('NOMBRE', 'asc');
	    $result = $this->db->get();

	    return  $result->result_array();
  	}
  	public function add(){
  	
        $NOMBRE = $this->input->post('NOMBRE');
         $NUMERO_UCC = $this->input->post('NUMERO_UCC');
         $ANEXO = $this->input->post('ANEXO');
        $data = "INSERT INTO UCC(ID_UCC, NUMERO_UCC, NOMBRE, ANEXO) values(ucc_seq.nextval, '$NUMERO_UCC', '$NOMBRE', '$ANEXO')";
        $result = $this->db->query($data); 
    
    return $result;
  	}

  	
  	public function delete($id){
  		$this->db->where('ID_UCC', $id);
        return $this->db->delete('UCC');



  	}

    function obtenerUCC($id){
       $this->db->where('ID_UCC', $id);
       $query = $this->db->get('UCC');
       if ($query->num_rows() > 0){
        return $query;
       }else{
        return FALSE;
       }

    }
    function editarUCC($id, $data){
      $this->db->where('ID_UCC', $id);
      $this->db->update('UCC', $data);

    }
 }
?>