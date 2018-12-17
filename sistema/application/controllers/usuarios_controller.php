<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_controller extends CI_Controller {

	function _construct(){
		parent::_construct();
		$this->load->helper('url','form');
		$this->load->model('usuarios_model');


	}

	public function index()
	{   
		$this->load->view('header');
		$this->load->view('view_inicio');
		//$this->load->view('crear_ucc');
		$this->load->view('menu_lateral');
		$this->load->view('footer');
		
	}

	

	public function modulousuario()
	{   


		$this->load->model('usuarios_model');
		$data['usuarios'] = $this->usuarios_model->obtener_todos();
		$this->load->view('view_modulousuario', $data);


		
	}
	

       


		//funciona
	    public function eliminar($id){
	    	$this->load->model('usuarios_model');
           $id = $this->uri->segment(3);
     	  $this->load->helper('url');
          $item=$this->usuarios_model->delete_news($id);
          
         //$data['productos'] = $this->productos_model->obtener_todos();
         return $this->load->view('registroeliminado');
      

}

public function detalle(){
	    	$this->load->model('usuarios_model');
           $id = $this->uri->segment(3);
     	  $this->load->helper('url');
     	  $data['item']=$this->usuarios_model->detalles($id);
         $this->load->view('view_detalle_usuario', $data);
      

}

public function add()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('usuarios_model');
    $usuarios = $this->usuarios_model->obtener_perfiles();
    $data = array("usuarios" => $usuarios);
    //$this->load->view('add_usuario',$data);   
    $this->form_validation->set_rules('NOMBRE', 'NOMBRE', 'required');
    $this->form_validation->set_rules('APELLIDOS', 'APELLIDOS', 'required');
    $this->form_validation->set_rules('NOMBRE', 'NOMBRE', 'required');
    $this->form_validation->set_rules('CARGO', 'CARGO', 'required');
    $this->form_validation->set_rules('RUT', 'RUT', 'required','unique');
    $this->form_validation->set_rules('CLAVE', 'CLAVE', 'required');
   
    if ($this->form_validation->run() === FALSE)
    {
        var_dump($usuarios);
       $this->load->view('add_usuario',$data);   

    }
    else
    {	//var_dump($data);
    	 $this->load->model('usuarios_model');
        $this->usuarios_model->add();
        //$data['productos'] = $this->productos_model->obtener_todos();
		  return $this->load->view('registro');

    
    }
}


 public function edit()
    {
     		
        
            $this->load->model('productos_model');
         
            $id = $this->input->get('RUT');
            var_dump($id);

        
            $data['item']  = $this->productos_model->detalles($id);
            $nombre = $this->input->post('NOMBRE');
            $data['NOMBRE'] = $nombre;

            $precio = $this->input->post('PRECIO_V');
            $data['PRECIO_V'] = $precio;
     
     			
                $this->load->view('view_editarproducto', $data);
         
                $this->load->library('form_validation');
                $this->form_validation->set_rules('NOMBRE', 'NOMBRE', 'required');
                $this->form_validation->set_rules('PRECIO_V', 'PRECIO_V', 'required');
                if ($this->form_validation->run() === FALSE)
                {
                
                 $this->load->view('view_editarproducto');
              

                }
                else
                {
                    $id = $this->input->post('ID_PRODUCTO');
                    $this->productos_model->update($id, $nombre,$precio);
		                return $this->load->view('view_sucess');
                } 

            }
    
}