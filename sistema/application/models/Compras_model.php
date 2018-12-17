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
      $RUT_PROVEEDOR = $this->input->post('RUT_PROVEEDOR', true);
      $data = "INSERT INTO COMPRA (ID_Compra,ID_Usuario,N_Factura, Fecha_ingreso, ID_UCC,Subtotal,IVA,Total, RUT_PROVEEDOR,ID_Sucursal, ESTADO)values (compra_seq.nextval, '$id_u', '$N_FACTURA', TO_DATE('$FECHA_INGRESO','YY-MM-DD'), 61, '$subtotal',null,'$total', '$RUT_PROVEEDOR', '$id_s', 1)";
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
      $this->db->join('INSUMO', 'INSUMO.ID_INSUMO = ITEMS_COMPRA.ID_INSUMO');
      $result = $this->db->get();
      return  $result->result_array();
      
    }

    public function desactivar($id){
      $this->db->where('ID_COMPRA', $id);
      $this->db->set('ESTADO', 0);
      return $this->db->update('COMPRA');
    }
    public function activar($id){
      $this->db->where('ID_COMPRA', $id);
      $this->db->set('ESTADO', 1);
      return $this->db->update('COMPRA');
    }
 }
?>