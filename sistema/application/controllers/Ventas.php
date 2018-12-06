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
        $tipo_v = $this->Ventas_model->obtener_tipo_v();
		$sucursales = $this->Ventas_model->obtener_sucursales();
		$productos = $this->Ventas_model->obtener_productos(1);
		$data = array(
						"tipo_v" => $tipo_v,
						"sucursales" => $sucursales,
						"productos" => $productos
						// "UCC" => $UCC
						);

        $this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view("Ventas/crear_venta",$data);
		$this->load->view('footer');
		
	
	}
	public function addInsumo(){
		$this->Insumos_model->add();
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['Insumos'] = $this->Insumos_model->obtener_todos();
		$this->load->view('Insumos/read_insumos', $data);
		$this->load->view('footer');
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