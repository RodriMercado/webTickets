<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Guardar los detalles de la reserva
    public function guardar_reserva($data) {
        // Verifica que la variable $data esté definida y no esté vacía
        if (empty($data)) {
            return false; // O lanza un error apropiado
        }

        // Inserta la reserva en la base de datos
        return $this->db->insert('reservas', $data);
    }
    // Obtener las reservas (para la lista de ventas)
    public function obtener_reservas() {
        $this->db->select('reservas.*, usuarios.nombre as usuario, productos.nombre as producto');
        $this->db->from('reservas');
        $this->db->join('usuarios', 'reservas.usuario_id = usuarios.id');
        $this->db->join('productos', 'reservas.producto_id = productos.id');
        $query = $this->db->get();

        return $query->result_array();
    }
}

    