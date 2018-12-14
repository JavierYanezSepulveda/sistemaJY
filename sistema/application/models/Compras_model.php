<?php
class Compras_model extends CI_Model { 
  	public function __construct() {
     parent::__construct();
     $this->load->database();

      
  	}

   public function add_compra($subtotal,$total){

  	  $id_s = $this->session->userdata('ID_SUCURSAL');
      $id_u = $this->session->userdata('RUT');
      $N_FACTURA = $this->input->post('N_FACTURA', true);
      $FECHA_INGRESO = $this->input->post('FECHA_INGRESO', true);
      $data = "INSERT INTO COMPRA (ID_Compra,ID_Usuario,N_Factura, Fecha_ingreso, ID_UCC,Subtotal,IVA,Total, Observacion,ID_Sucursal)values (compra_seq.nextval, '$id_u', '$N_FACTURA', TO_DATE('$FECHA_INGRESO','YY-MM-DD'), 61, '$subtotal',null,'$total', null, '$id_s')";
      $result = $this->db->query($data);
        
  	}

    public function add_compra_producto($n,$m,$ultimo){

        $data = "INSERT INTO ITEMS_COMPRA(ID_ITEMS_COMPRA, ID_COMPRA, ID_INSUMO, CANTIDAD) VALUES (compra_seq.nextval, '$ultimo', '$n', '$m')";
        $result = $this->db->query($data);

    }
    public function total($id_insumo){

      $this->load->database('SCA');
      $this->db->select('PRECIO_C');
      $this->db->from('INSUMO');
      $this->db->where('ID_INSUMO', $id_insumo);
      $result = $this->db->get();
      return  $result->result_array();

    }

    
    
    // public function obtener_productos($ID_SUCURSAL){
      
    //   $this->db->select('*');
    //   $this->db->from('PRODUCTO');
    //   $this->db->where('ID_SUCURSAL', $ID_SUCURSAL);
    //   $proveedor=$this->db->get();
    //   return $proveedor->result_array();
    // }
    
    // public function insumo($id_producto){
      
    //   $this->load->database('SCA');
    //   $this->db->select('ID_INSUMO');
    //   $this->db->from('PRODUCTO');
    //   $this->db->where('ID_PRODUCTO', $id_producto);
    //   $result = $this->db->get();
    //   return  $result->result_array();
    // }

    // public function stock($insumo){
      
    //   $this->load->database('SCA');
    //   $this->db->select('STOCK');
    //   $this->db->from('INSUMO');
    //   $this->db->where('ID_INSUMO', $insumo);
    //   $result = $this->db->get();
    //   return $result->result_array();
    // }

    public function sumar($insumo, $cantidad_total){
      
      $this->load->database('SCA');
      $this->db->set('STOCK', $cantidad_total, FALSE);
      $this->db->where('ID_INSUMO', $insumo);
      $this->db->update('INSUMO');

    }
    public function obtener_compras(){

      $this->load->database('SCA');
      $this->db->select('*');
      $this->db->from('COMPRA');
      $this->db->order_by('FECHA_INGRESO', 'asc');
      $result = $this->db->get();
      return  $result->result_array();

    }

    public function detalle_compra($id){

      $this->load->database('SCA');
      $this->db->select('*');
      $this->db->from('ITEMS_COMPRA');
      $this->db->where('ID_COMPRA', $id);
      $result = $this->db->get();
      return  $result->result_array();

    }
 }
?>