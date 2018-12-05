<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Usuarios extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $this->load->helper("url");
      $this->load->model("Usuarios_model");
      $this->load->library("session");
      $this->load->database();
   }
   public function iniciar_sesion() {
      $data = array();
      $this->load->view('header');
      $this->load->view('login', $data);
      $this->load->view('footer');
   }
   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $RUT = $this->input->post('RUT');
         $CLAVE = $this->input->post('CLAVE');
         $this->load->model('Usuarios_model');
         $usuario = $this->Usuarios_model->usuario_por_nombre_contrasena($RUT, $CLAVE);
         if ($usuario) {
            $usuario_data = array(
               'RUT' => $usuario->RUT,
               'NOMBRE' => $usuario->NOMBRE,
               'APELLIDOS' => $usuario->APELLIDOS,
               'ID_SUCURSAL' => $usuario->ID_SUCURSAL,
               'ID_PERFIL' => $usuario->ID_PERFIL,
               'logueado' => TRUE
            );
            $this->session->set_userdata($usuario_data);
            redirect('Usuarios/logueado');
         } else {
            redirect('Usuarios/iniciar_sesion');
         }
      } else {
         $this->iniciar_sesion();
      }
   }
   public function logueado() {
      if($this->session->userdata('logueado')){
         $data = array();
         $data['NOMBRE'] = $this->session->userdata('NOMBRE');
         $this->load->view('header');
         $this->load->view('menu_lateral');
         $this->load->view('inicio', $data);
         $this->load->view('footer');
      }else{
         redirect('usuarios/iniciar_sesion');
      }
   }
   public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
      );
      $this->session->set_userdata($usuario_data);
      redirect('usuarios/iniciar_sesion');
   }
}