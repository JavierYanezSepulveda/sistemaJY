<?php
               //extendemos CI_Model
// class usuarios_model extends CI_Model{
//     public function __construct() {
//         //llamamos al constructor de la clase padre
//         parent::__construct();
         
//         //cargamos la base de datos
//         $this->load->database();
//     }
     
//     public function create($NOMBRE){
//         $consulta=$this->db->query("SELECT NOMBRE FROM UCC");
//         if($consulta->num_rows()==0){
//             $consulta=$this->db->query("INSERT INTO usuarios VALUES(NULL,'$email','$password','$nombre','$apellido');");
//             if($consulta==true){
//               return true;
//             }else{
//                 return false;
//             }
//         }else{
//             return false;
//         }
//     }
     
//     public function mod($id_usuario,$modificar="NULL",$email="NULL",$password="NULL",$nombre="NULL",$apellido="NULL"){
//         if($modificar=="NULL"){
//             $consulta=$this->db->query("SELECT * FROM usuarios WHERE id_usuario=$id_usuario");
//             return $consulta->result();
//         }else{
//           $consulta=$this->db->query("
//               UPDATE usuarios SET email='$email', password='$password',
//               nombre='$nombre', apellido='$apellido' WHERE id_usuario=$id_usuario;
//                   ");
//           if($consulta==true){
//               return true;
//           }else{
//               return false;
//           }
//         }
//     }
     
//     public function eliminar($id_usuario){
//        $consulta=$this->db->query("DELETE FROM usuarios WHERE id_usuario=$id_usuario");
//        if($consulta==true){
//            return true;
//        }else{
//            return false;
//        }
//     }
 
 
// }
// ?>
