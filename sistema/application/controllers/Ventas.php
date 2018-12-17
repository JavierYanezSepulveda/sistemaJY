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
	
	public function add(){
		
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

		$x = count($data);
		$cantidad = 'cantidad';
		$total= 0 ;
				
				for($j=1;$j<=($x-2)/2; $j++){
					$n=$data[$j]; //id_producto
					$m=$data[$cantidad.$j]; //cantidad vendida
					$precio = $this->Ventas_model->total($n);
					$precio2= $precio[0];
					$precio_total = $precio2['PRECIO_V']*$m;
					$total=$total+$precio_total; 
				}

		$this->Ventas_model->add_venta($total);
		$ultimo_id_venta = $this->db->select('ID_VENTA')->from('VENTA')->where('N_ORDEN', null)->order_by('ID_VENTA',"desc")->limit(1)->get()->row(); 
        $ultimo_id_venta = (array) $ultimo_id_venta;
        $ultimo=$ultimo_id_venta['ID_VENTA'];
				
				for($j=1;$j<=($x-2)/2; $j++){
					$n=$data[$j];
					$m=$data[$cantidad.$j];
					$this->Ventas_model->add_venta_producto($n,$m,$ultimo);
					$insumo_1 = $this->Ventas_model->insumo($n);
					$insumo = $insumo_1[0]['ID_INSUMO'];
					$stock_1 = $this->Ventas_model->stock($insumo);
					$stock = $stock_1[0]['STOCK'];
					$cantidad_total= $stock - $m;
			  		$this->Ventas_model->descontar($insumo, $cantidad_total);
								
				}		
		
		echo "<script>alert('¡Venta realizada!.');</script>";
 		redirect('Ventas/add', 'refresh');
	}

	public function lista_ventas(){
		$data['Ventas'] = $this->Ventas_model->obtener_ventas();
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('Ventas/read_ventas',$data);
		$this->load->view('footer');


	}

	public function detalle_venta($id){
		$this->load->helper('url');
        $id = $this->uri->segment(3);
        $data['Detalle'] = $this->Ventas_model->detalle_venta($id);
        $this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('Ventas/read_venta_detalle',$data);
		$this->load->view('footer');

	}

	public function desactivar(){

		$this->load->helper('url');
        $id = $this->uri->segment(3);
        $this->Ventas_model->desactivar($id);
        redirect('Ventas/lista_ventas', 'refresh');
	}

	public function activar(){

		$this->load->helper('url');
        $id = $this->uri->segment(3);
        $this->Ventas_model->activar($id);
        redirect('Ventas/lista_ventas', 'refresh');
	}

	
	
}