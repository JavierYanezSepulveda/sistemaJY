 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Becas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Ordenes_model");
		$this->load->model("Ventas_model");
		$this->load->model("Becas_model");
		$this->load->model("Compras_model");
		$this->load->model("Insumos_model");
		$this->load->library("session");
		$this->load->database();
	}
	
	public function add(){
		$id_s = $this->session->userdata('ID_SUCURSAL');
        $this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('Becas/crear_beca');
		$this->load->view('footer');
		
	
	}
	public function addBeca(){
			
		$CANTIDAD= $this->input->post('CANTIDAD', true);
		$this->Becas_model->add_beca();
		$stock_1 = $this->Ventas_model->stock(145);
		$stock = $stock_1[0]['STOCK'];
		$cantidad_total= $stock - $CANTIDAD;
		$this->Ordenes_model->descontar(145, $cantidad_total);
		
		echo "<script>alert('¡Beca ingresada!.');</script>";
 		redirect('Becas/add', 'refresh');
	}

	public function lista_becas(){
		$data['Becas'] = $this->Becas_model->obtener_becas();
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('Becas/read_becas',$data);
		$this->load->view('footer');


	}

		
}