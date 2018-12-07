 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Ventas_model");
		$this->load->library("session");
		$this->load->database();
	}
	public function index()
	{
		
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['Insumos'] = $this->Insumos_model->obtener_todos();
		$this->load->view('Insumos/read_insumos', $data);
		$this->load->view('footer');
	}
	public function add(){
		// $UCC = $this->Ventas_model->obtener_ucc();
		$id_s = $this->session->userdata('ID_SUCURSAL');
        $tipo_v = $this->Ventas_model->obtener_tipo_v();
		$productos = $this->Ventas_model->obtener_productos($id_s);
		$data = array(
						"tipo_v" => $tipo_v,
						"productos" => $productos
						);

        $this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view("Ventas/crear_venta",$data);
		$this->load->view('footer');
		
	
	}
	public function addVenta(){
		$data = $_POST;
		foreach($data as $fila => $valor) {
			$filas[] = $fila;
			$valores[] = $valor;
		}
		$x = count($data)-1;
		$cantidad = 'cantidad';
		$total= 0 ;
		for($j=1;$j<=($x-2)/2; $j++){
			$n=$data[$j];
			$m=$data[$cantidad.$j];
			$precio = $this->Ventas_model->total($n);
			$precio2= $precio[0];
			// print_r($precio[0]);
			$precio_total = $precio2['PRECIO_V']*$m;
			$total=$total+$precio_total; 
		}
		$this->Ventas_model->add_venta($total);
		
		
		$ultimo_id_venta = $this->db->select('ID_VENTA')->from('VENTA')->order_by('ID_VENTA',"desc")->limit(1)->get()->row(); 
        
    $ultimo_id_venta = (array) $ultimo_id_venta;

    $ultimo=$ultimo_id_venta['ID_VENTA'];
	
		for($j=1;$j<=($x-2)/2; $j++){
			$n=$data[$j];
			$m=$data[$cantidad.$j];
			$this->Ventas_model->add_venta_producto($n,$m,$ultimo);
			
		}
		 echo "<script>alert('¡Venta realizada!.');</script>";

 		redirect('Ventas/add', 'refresh');
		
	
	// redirect('Ventas/add');

	}

	public function delete($id){
		$this->load->helper('url');
          $id = $this->uri->segment(3);
          $item = $this->Insumos_model->delete($id);
          $this->load->view('header');
		$this->load->view('menu_lateral');
		$data['Insumos'] = $this->Insumos_model->obtener_todos();
		$this->load->view('Insumos/read_insumos', $data);
		$this->load->view('footer');
	}
	public function editar($id){
		$id = $this->uri->segment(3);
		$obtenerInsumo = $this->Insumos_model->obtener_insumo($id);
		if($obtenerInsumo != FALSE){
			foreach($obtenerInsumo->result() as $row){
				$NOMBRE_I = $row->NOMBRE_I;
				$MARCA = $row->MARCA;
				$PRECIO_C = $row->PRECIO_C;
				$STOCK = $row->STOCK;
				$ID_PROVEEDOR = $row->ID_PROVEEDOR;
				$ID_SUCURSAL = $row->ID_SUCURSAL;
			}
			$data = array(
							'id' => $id, 
							'NOMBRE_I' => $NOMBRE_I,
							'PRECIO_C' => $PRECIO_C,
							'MARCA' => $MARCA,
							'STOCK' => $STOCK,
							'ID_PROVEEDOR' => $ID_PROVEEDOR,
							'ID_SUCURSAL' => $ID_SUCURSAL

						);
			$proveedores = $this->Insumos_model->obtener_proveedores();
			$sucursales = $this->Insumos_model->obtener_sucursales();
			$data['proveedores'] = $proveedores;
			$data['sucursales'] = $sucursales;
			$proveedor = $this->Insumos_model->obtener_proveedor($ID_PROVEEDOR);
			$sucursal = $this->Insumos_model->obtener_sucursal($ID_SUCURSAL);
			$data['proveedor'] = $proveedor;
			$data['sucursal'] = $sucursal;
		}else{
			return FALSE;
		}
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('Insumos/update_insumo', $data);
	}
	public function editarInsumo(){
		$id = $this->uri->segment(3);
		
		$data = array(
						'NOMBRE_I' => $this->input->post('NOMBRE_I', true),
						'PRECIO_C' => $this->input->post('PRECIO_C', true),
						'MARCA' => $this->input->post('MARCA', true),
						'STOCK' => $this->input->post('STOCK', true),
						'ID_PROVEEDOR' => $this->input->post('selectProveedores', true),
						'ID_SUCURSAL' => $this->input->post('selectSucursales', true),

		);

		$this->Insumos_model->editar_insumo($id, $data);	
		
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['Insumos'] = $this->Insumos_model->obtener_todos();
		
		$this->load->view('Insumos/read_insumos', $data);
		$this->load->view('footer');
	}
	
}