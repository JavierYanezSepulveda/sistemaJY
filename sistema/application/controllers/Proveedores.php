<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Proveedores_model");
		$this->load->library("session");
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['Proveedores'] = $this->Proveedores_model->obtener_todos();
		$this->load->view('Proveedores/read_proveedores', $data);
		$this->load->view('footer');
	}
	
	

	
	public function add(){
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view("Proveedores/crear_proveedor");
		$this->load->view('footer');
	}
	public function addProveedor(){
		$this->Proveedores_model->add();
		echo "<script>alert('¡Proveedor agregado!.');</script>";
        redirect('Proveedores/index', 'refresh');
	}

	public function delete($id){
		
          $this->load->helper('url');
          $id = $this->uri->segment(3);
     	  
          $item=$this->Proveedores_model->delete($id);
          
         
		echo "<script>alert('¡Proveedor eliminado!.');</script>";
        redirect('Proveedores/index', 'refresh');
	}

	public function editar($id){
		$id = $this->uri->segment(3);
		$obtenerProveedor = $this->Proveedores_model->obtener_proveedor($id);
		if($obtenerProveedor != FALSE){
			foreach($obtenerProveedor->result() as $row){
				$RUT_PROVEEDOR = $row->RUT_PROVEEDOR;
				$NOMBRE_P = $row->NOMBRE_P;
				$TELEFONO = $row->TELEFONO;
				$DIRECCION = $row->DIRECCION;
			}
			$data = array(
							'RUT_PROVEEDOR' => $RUT_PROVEEDOR, 
							'NOMBRE_P' => $NOMBRE_P,
							'TELEFONO' => $TELEFONO,
							'DIRECCION' => $DIRECCION

						);
		}else{
				return FALSE;
		}
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('Proveedores/update_proveedor', $data);
	}

	public function editarProveedor(){
		$id = $this->uri->segment(3);
		
		$data = array(
						'NOMBRE_P' => $this->input->post('NOMBRE_P', true),
						'TELEFONO' => $this->input->post('TELEFONO', true),
						'DIRECCION' => $this->input->post('DIRECCION', true),
						
		);

		$this->Proveedores_model->editar_proveedor($RUT_PROVEEDOR, $data);	
		echo "<script>alert('¡Proveedor modificado!.');</script>";
        redirect('Proveedores/index', 'refresh');


	}
}
