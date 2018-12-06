<?php
class Ventas_model extends CI_Model { 
  	public function __construct() {
     parent::__construct();
     $this->load->database();

      
  	}

    public function obtener_todos(){

      $this->load->database('SCA');
      $this->db->select('*');
      $this->db->from('INSUMO');
      $this->db->join('PROVEEDOR', 'PROVEEDOR.ID_PROVEEDOR = INSUMO.ID_PROVEEDOR');
      $this->db->order_by('ID_INSUMO', 'asc');
      $result = $this->db->get();
        // $query = $this->db->get('INSUMO');
      return  $result->result_array();

    }

    public function obtener_tipo_v(){

      $this->load->database('SCA');
      $this->db->select('*');
      $this->db->from('TIPO_VENTA');
      $this->db->order_by('NOMBRE', 'asc');
      $result = $this->db->get();
      return  $result->result_array();

    }
    public function obtener_sucursales(){

      $this->load->database('SCA');
      $this->db->select('*');
      $this->db->from('SUCURSAL');
      $this->db->order_by('NOMBRE_S', 'asc');
      $result = $this->db->get();
      return  $result->result_array();

    }
    // public function obtener_UCC(){

    //   $this->load->database('SCA');
    //   $this->db->select('*');
    //   $this->db->from('UCC');
    //   $this->db->order_by('NOMBRE', 'asc');
    //   $result = $this->db->get();
    //   return  $result->result_array();

    // }
  	public function add(){
  	
        $NOMBRE_I = $this->input->post('NOMBRE_I', true);
        $PRECIO_C = $this->input->post('PRECIO_C', true);
        $MARCA = $this->input->post('MARCA', true);
        $STOCK = $this->input->post('STOCK', true);
        $ID_PROVEEDOR = $this->input->post('selectProveedores', true);
        $ID_SUCURSAL = $this->input->post('selectSucursales', true);
        // $ID_PROVEEDOR = $_POST['selectProveedores'];
        // $ID_SUCURSAL =$_POST['selectSucursales'];
        $data = "INSERT INTO INSUMO(ID_INSUMO, NOMBRE_I, PRECIO_C, MARCA, STOCK, ID_PROVEEDOR, ID_SUCURSAL) values (insumo_seq.nextval, '$NOMBRE_I', '$PRECIO_C', '$MARCA', '$STOCK', '$ID_PROVEEDOR', '$ID_SUCURSAL')";
        $result = $this->db->query($data);
        return $result;
  	}

  	public function obtener_insumo($id){
        $this->db->where('ID_INSUMO', $id);
        $query = $this->db->get('INSUMO');
        if ($query->num_rows() > 0){
        return $query;
       }else{
        return FALSE;
       }
    }

    
    public function obtener_productos($ID_SUCURSAL){
      $this->db->select('*');
      $this->db->from('PRODUCTO');
      $this->db->where('ID_SUCURSAL', $ID_SUCURSAL);
      $proveedor=$this->db->get();
      return $proveedor->result_array();
    }
    
    public function obtener_proveedor($ID_PROVEEDOR){
      $this->db->select('*');
      $this->db->from('PROVEEDOR');
      $this->db->where('ID_PROVEEDOR', $ID_PROVEEDOR);
      $proveedor=$this->db->get();
      return $proveedor->result_array();
    }
    public function obtener_sucursal($ID_SUCURSAL){
      $this->db->select('*');
      $this->db->from('SUCURSAL');
      $this->db->where('ID_SUCURSAL', $ID_SUCURSAL);
      $sucursal=$this->db->get();
      return $sucursal->result_array();
  	}
    public function editar_insumo($id, $data){
        $this->db->where('ID_INSUMO', $id);
        $this->db->update('INSUMO', $data);

    }

  	public function delete($id){
  		$this->db->where('ID_INSUMO', $id);
        return $this->db->delete('INSUMO');



  	}

 }
?>