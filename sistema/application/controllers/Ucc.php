<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ucc extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model("Ucc_model");
		$this->load->library("session");
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['UCC'] = $this->Ucc_model->obtener_todos();
		$this->load->view('UCC/read_ucc', $data);
		$this->load->view('footer');
	}
	
	public function delete($id){
		
           $this->load->helper('url');
          $id = $this->uri->segment(3);
     	  
          $item=$this->Ucc_model->delete($id);
          
         
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['UCC'] = $this->Ucc_model->obtener_todos();
		$this->load->view('UCC/read_ucc', $data);
		$this->load->view('footer');
	}

	public function editar(){
		$id = $this->uri->segment(3);
		$obtenerEnlace = $this->Ucc_model->obtenerEnlace($id);
		if($obtenerEnlace != FALSE){
			foreach($obtenerEnlace->result() as $row){
				$NOMBRE = $row->NOMBRE;
				$NUMERO_UCC = $row->NUMERO_UCC;
				$ANEXO = $row->ANEXO;
			}
			$data = array(
							'id' => $id, 
							'NOMBRE' => $NOMBRE,
							'NUMERO_UCC' => $NUMERO_UCC,
							'ANEXO' => $ANEXO
						);
		}else{
			return FALSE;
		}
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view('UCC/update_ucc', $data);


	}
	public function editarUCC(){
		$id = $this->uri->segment(3);
		$data = array(
						'NOMBRE' => $this->input->post('NOMBRE', true),
						'NUMERO_UCC' => $this->input->post('NUMERO_UCC', true),
						'ANEXO' => $this->input->post('ANEXO', true)
		);

		$this->Ucc_model->editarUCC($id, $data);
		$this->load->view('header');
		$this->load->view('menu_lateral');
		$data['UCC'] = $this->Ucc_model->obtener_todos();
		$this->load->view('UCC/read_ucc', $data);
		$this->load->view('footer');

	}

	public function add(){
		$this->load->helper('form');
    $this->load->library('form_validation');
	$this->form_validation->set_rules('NOMBRE', 'NOMBRE', 'required');
	$this->form_validation->set_rules('NUMERO_UCC', 'NUMERO_UCC', 'required');
	$this->form_validation->set_rules('ANEXO', 'ANEXO', 'required');
    if ($this->form_validation->run() == FALSE)
    {
        
        $this->load->view('header');
		$this->load->view('menu_lateral');
		$this->load->view("UCC/crear_ucc");
		$this->load->view('footer');

    }
    else
    {	
    	$this->load->view('header');
		$this->load->view('menu_lateral');
        $this->Ucc_model->add();
        $data['UCC'] = $this->Ucc_model->obtener_todos();
		$this->load->view('UCC/read_ucc', $data);
		$this->load->view('footer');
    
    }


		



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
