<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reservas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reservas_model'); // Cargar el modelo de reservas
        $this->load->model('productos_model'); // Cargar el modelo de productos
    }

    public function reservar($producto_id) {
        $usuario = $this->session->userdata('UserLoginSession');
    
        $producto = $this->productos_model->get_producto_by_id($producto_id);
    
        if (!$producto) {
            show_404();
        }
    
        // Obtén la cantidad solicitada desde el formulario de reserva
        $cantidad = (int) $this->input->post('cantidad'); // Asegúrate de que 'cantidad' esté en el formulario
        if ($cantidad <= 0) {
            $this->session->set_flashdata('error', 'La cantidad debe ser mayor a cero.');
            redirect('productos/comprar/' . $producto_id);
        }
    
        // Verificar si hay suficiente stock
        if ($producto->cantidad < $cantidad) {
            $this->session->set_flashdata('error', 'No hay suficiente stock disponible.');
            redirect('productos/comprar/' . $producto_id);
        }
    
        $reserva = [
            'producto_id' => $producto_id,
            'usuario_id' => $usuario['id'],
            'cantidad' => $cantidad, 
            'fecha_reserva' => date('Y-m-d H:i:s')
        ];
    
        if ($this->reservas_model->guardar_reserva($reserva)) {
            if ($this->productos_model->descontar_stock($producto_id, $cantidad)) {
                $this->session->set_flashdata('message', 'Reserva realizada con éxito.');
            } else {
                $this->session->set_flashdata('error', 'Error al actualizar el stock.');
            }
        } else {
            $this->session->set_flashdata('error', 'Hubo un problema con tu reserva.');
        }
    
        redirect('productos/comprar/' . $producto_id);
    }
    
}
