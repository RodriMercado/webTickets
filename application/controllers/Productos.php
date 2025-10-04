<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('productos_model');
        $this->load->library('session'); // Cargar la biblioteca de sesiones
        $this->load->library('upload'); // Cargar la biblioteca de subida de archivos
    }

    public function index() {
        $main_data = [
            'title' => "Productos",
            'inner_view_path' => 'productos/index',
            'productos' => $this->productos_model->get_all_productos()
        ];
        $this->load->view('layouts/main', $main_data);
        
    }

    public function show($id) {
        $producto = $this->productos_model->get_producto_by_id($id);
        if ($producto == null) {
            show_404();
        }
        $main_data = [
            'title' => 'Evento #' . $id,
            'inner_view_path' => 'productos/show',
            'producto' => $producto
        ];
        $this->load->view('layouts/main', $main_data);
    }



    public function create() {
        if ($this->session->userdata('UserLoginSession')['rol'] != 'admin') {
            show_404(); // Muestra un error 404 si no es admin
        }
    
        $main_data = [
            'title' => 'Registrar evento',
            'inner_view_path' => 'productos/create'
        ];
        $this->load->view('layouts/main', $main_data);
    }
    



    public function store() {
        if ($this->session->userdata('UserLoginSession')['rol'] != 'admin') {
            show_404(); // Muestra un error 404 si no es admin
        }
    
        // Configuración para la subida de imagen
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048;
        

        $this->upload->initialize($config);
    
        // Manejo de la imagen
        $imagen = '';
        if ($this->upload->do_upload('imagen')) {
            $data = $this->upload->data();
            $imagen = $data['file_name'];
        } else {
            $this->session->set_flashdata('error','No se ha podido completar ya que la imagen supera los 2MB. Intentelo nuevamente');
            redirect('productos/create'); // Redirigir de nuevo al formulario en caso de error
        }

    
        // Datos del nuevo producto
        $producto_data = [
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'cantidad' => $this->input->post('cantidad'),
            'fecha' => $this->input->post('fecha'),
            'imagen' => $imagen // Aquí se guarda el nombre de la imagen
        ];
    
        $this->productos_model->add_new_producto($producto_data);
        redirect('productos/lista');
    }
    


    public function edit($id) {
        if ($this->session->userdata('UserLoginSession')['rol'] != 'admin') {
            show_404(); // Muestra un error 404 si no es admin
        }

        $producto = $this->productos_model->get_producto_by_id($id);
        if ($producto == null) {
            show_404();
        }
        $main_data = [
            'title' => 'Editar Evento #' . $id,
            'inner_view_path' => 'productos/edit',
            'producto' => $producto
        ];
        $this->load->view('layouts/main', $main_data);
    }


    
    public function update($id) {
        if ($this->session->userdata('UserLoginSession')['rol'] != 'admin') {
            show_404(); // Muestra un error 404 si no es admin
        }
    
        // Datos del producto actualizado
        $producto_data = [
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'cantidad' => $this->input->post('cantidad'),
            'fecha' =>$this->input->post('fecha')
        ];
    
        $this->productos_model->update_producto_by_id($id, $producto_data);
        redirect('productos/lista');
    }
    
    public function delete($id) {
        if ($this->session->userdata('UserLoginSession')['rol'] != 'admin') {
            show_404(); 
        }

        if ($this->productos_model->delete_productos($id)) {
            $this->session->set_flashdata('success', 'Evento eliminado correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al eliminar el evento.');
        }
        redirect('productos/lista');
    }

    public function detalles($id) {
        $producto = $this->productos_model->get_producto_by_id($id);
        if (!$producto) {
            show_404();
        }
        $data = [
            'title' => $producto->nombre,
            'producto' => $producto,
            'inner_view_path' => 'productos/detalles'
        ];
        $this->load->view('layouts/main', $data);
    }

    public function lista() {
        if ($this->session->userdata('UserLoginSession')['rol'] != 'admin') {
            show_404(); // Muestra un error 404 si no es admin
        }

        $main_data = [
            'title' => 'Nuestros Eventos',
            'productos' => $this->productos_model->get_all_productos()
        ];
        $this->load->view('layouts/main', ['inner_view_path' => 'productos/productos_view', 'productos' => $main_data['productos']]);
    }

    public function comprar($id) {
        
        $usuario = $this->session->userdata('UserLoginSession');
    
        if (!$usuario || !isset($usuario['id'])) {
            $this->session->set_flashdata('error', 'Debes iniciar sesión para realizar una reserva.');
            redirect('usuarios/login');
        }

        $producto = $this->productos_model->get_producto_by_id($id);

        if (!$producto) {
            show_404();
        }

        $data = [
            'title' => 'Comprar ' . $producto->nombre,
            'producto' => $producto
        ];

        $this->load->view('layouts/main', ['inner_view_path' => 'productos/comprar', 'data' => $data]);
    }
}
