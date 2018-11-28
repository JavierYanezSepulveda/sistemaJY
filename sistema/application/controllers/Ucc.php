<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ucc extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		// $this->load->model("Ucc_model", "ucc");
		$this->load->library("session");
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$result = $this->db->get('UCC');
		$data = array('consulta' => $result);
		$this->load->view('UCC/read_ucc', $data);
		$this->load->view('footer');
	}
	
	public function delete(){
		$v1 = $_POST['variable1'];
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('UCC/delete_ucc', $v1);
		$this->load->view('footer');
	}

	public function update(){
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('UCC/update_ucc');
		$this->load->view('footer');
	}
	public function create(){
		// if($this->input->post("submit")){
         
        //llamo al metodo add
        // $add=$this->ucc->create(
        //         $this->input->UCC("NOMBRE")
        //         );
        // }


		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view("UCC/crear_ucc");
		$this->load->view('footer');



		 // public function add(){
         
   //      //compruebo si se a enviado submit
   //      if($this->input->post("submit")){
         
   //      //llamo al metodo add
   //      $add=$this->usuarios_model->add(
   //              $this->input->post("email"),
   //              $this->input->post("password"),
   //              $this->input->post("nombre"),
   //              $this->input->post("apellido")
   //              );
   //      }
   //      if($add==true){
   //          //Sesion de una sola ejecución
   //          $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
   //      }else{
   //          $this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
   //      }
         
   //      //redirecciono la pagina a la url por defecto
   //      redirect(base_url());
   //  }

	}
}
