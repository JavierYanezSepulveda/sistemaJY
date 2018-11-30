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
	
}