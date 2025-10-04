<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reservas_model');
    }
    
    public function lista() {
        $data['reservas'] = $this->reservas_model->obtener_reservas();
        $this->load->view('ventas/lista_view', $data);
    }
}
