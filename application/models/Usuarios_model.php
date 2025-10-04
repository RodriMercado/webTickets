<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
    public function __construct (){
        
        parent::__construct();
        $this->load->database();
    }

    // Traer lista de Clientes
    public function get_all_usuarios(){

        $query = $this->db->get('usuarios');
        return $query->result();

    }


    // Añadir usuario
    public function add_usuario($data)
    {
        $this->db->insert('usuarios', $data);
    }

    // Eliminar Usuario
    public function delete_usuarios($id){
        $this->db->where('id', $id);
        return $this->db->delete('usuarios');
    }

    // Checkear la contraseña 

    public function checkPassword($password, $email)
    {
        // Utiliza consultas preparadas para evitar inyecciones SQL
        $query = $this->db->get_where('usuarios', array('email' => $email));
    
        if ($query->num_rows() > 0) {
            $user = $query->row();
    
            // Verifica la contraseña sin importar el rol
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
    
        return false;
    }
    
}