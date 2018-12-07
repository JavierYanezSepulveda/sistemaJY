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
  	public function add_venta($total){
  	    $id_s = $this->session->userdata('ID_SUCURSAL');
        $id_u = $this->session->userdata('RUT');
        $N_BOLETA = $this->input->post('N_BOLETA', true);
        $FECHA_INGRESO = $this->input->post('FECHA_INGRESO', true);
        $TIPO_VENTA = $this->input->post('selectTipo_venta', true);
  
    $data = "INSERT INTO VENTA (ID_Venta,ID_Usuario,N_Boleta,N_Orden, Fecha_ingreso, ID_UCC,ID_Tipo_Venta,Total, Observacion,ID_Sucursal)values (venta_seq.nextval, '$id_u', '$N_BOLETA',null , TO_DATE('$FECHA_INGRESO','YYYY-MM-DD'), 61, '$TIPO_VENTA', '$total', null, '$id_s')";
        $result = $this->db->query($data);
        
  	}

    public function add_venta_producto($n,$m,$ultimo){
    //    $ultimo_id_venta = $this->db->select('ID_VENTA')->from('VENTA')->order_by('ID_VENTA',"desc")->limit(1)->get()->row(); 
    //     $ultimo = $ultimo_id_venta['ID_VENTA'];
    // $ultimo_id_venta = (array) $ultimo_id_venta;
        $data = "INSERT INTO ITEMS_VENTA(ID_ITEMS_VENTA, ID_VENTA, ID_PRODUCTO, CANTIDAD) VALUES (venta_seq.nextval, '$ultimo', '$n', '$m')";
        $result = $this->db->query($data);

    }
    public function total($id_producto){

      $this->load->database('SCA');
      $this->db->select('PRECIO_V');
      $this->db->from('PRODUCTO');
      $this->db->where('ID_PRODUCTO', $id_producto);
      $result = $this->db->get();
      return  $result->result_array();
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