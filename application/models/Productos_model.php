<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model{
    public function __construct (){
        
        parent::__construct();
        $this->load->database();
    }

    // Traer lista de productos
    public function get_all_productos(){

        $query = $this->db->get('productos');
        return $query->result();

    }

    public function get_producto_by_id($id){
        $query = $this->db->get_where('productos', ['id' => $id]);
        return $query->row();
    }

    public function delete_productos($id){
        $this->db->where('id', $id);
        return $this->db->delete('productos');
    }

    public function add_new_producto ($producto_data){
        
        $this->db->insert('productos', $producto_data);

    }

    public function update_producto_by_id($id, $producto_data){
        $this->db->update('productos', $producto_data, ['id' => $id]);
    }
    
    public function descontar_stock($producto_id, $cantidad) {
        // Asegúrate de usar el método set para descontar la cantidad
        $this->db->set('cantidad', 'cantidad - ' . (int)$cantidad, FALSE); // FALSE permite que la expresión se ejecute como una operación
        $this->db->where('id', $producto_id);
        $this->db->where('cantidad >=', $cantidad);
        return $this->db->update('productos');
    }
    
    public function obtener_primeros_tres() {
        $this->db->limit(3); // Limita a 3 resultados
        $query = $this->db->get('productos'); 
        return $query->result();
    }

}

