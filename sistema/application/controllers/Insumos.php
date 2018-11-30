<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insumos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Insumos_model");
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
		
        $proveedores = $this->Insumos_model->obtener_proveedores();
		$sucursales = $this->Insumos_model->obtener_sucursales();
		$data = array("proveedores" => $proveedores,
						"sucursales" => $sucursales);

        $this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view("Insumos/crear_insumo",$data);
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
		$obtenerInsumo = $this->Insumos_model->obtenerInsumo($id);
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
						'ID_PROVEEDOR' => $this->input->post('ID_PROVEEDOR', true),
						'ID_SUCURSAL' => $this->input->post('ID_SUCURSAL', true)
		);
		$this->Insumos_model->editarInsumo($id, $data);	
		
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['Insumos'] = $this->Insumos_model->obtener_todos();
		$this->load->view('Insumos/read_insumos', $data);
		$this->load->view('footer');
	}
	
}