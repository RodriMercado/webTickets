<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    
	public function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
	}

	public function index() {


		// Validar si es administrador
		if ($this->session->userdata('UserLoginSession')['rol'] != 'admin') {
			show_404(); // Muestra un error 404 si no es admin
		}

		$main_data = [
			'title' => "Lista de Usuarios",
			'inner_view_path' => 'usuarios/index',
			'usuarios' => $this->usuarios_model->get_all_usuarios()
		];

		
		$this->load->view('layouts/main', $main_data);
    }

	public function show($id){

	}

	public function create(){
		echo("ruta usuarios/create");
	}

	public function store(){
		//
	}

	public function edit($id){
		echo("Ruta usuarios/edit/$id");
	}

	public function update($id, $newData){
		//
	}

	public function delete($id){
		if ($this->usuarios_model->delete_usuarios($id)) {
            $this->session->set_flashdata('success', 'Usuario eliminado correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al eliminar el usuario.');
        }
        redirect('usuarios'); // Redirige a la lista de Usuarios
	}


	// Funciones para el registro y login de usuarios

	public function registro()
	{
		// Cargar la vista del formulario
		$this->load->view('usuarios/registro');
		
		// Validar si la solicitud es POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Reglas de validación
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			// Si la validación es exitosa
			if ($this->form_validation->run() == TRUE) {
				// Recoger los datos del formulario
				$nombre = $this->input->post('nombre');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				
				// Hashear la contraseña
				$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				
				// Datos para insertar
				$data = array(
					'nombre' => $nombre,
					'email' => $email,
					'password' => $hashed_password,  // Hashed password
					'rol' => 'cliente'  // Asignar el rol de cliente por defecto
				);
				
				// Insertar el usuario en la base de datos
				$this->load->model('Usuarios_model');
				$this->Usuarios_model->add_usuario($data);
				
				// Establecer mensaje flash de éxito
				$this->session->set_flashdata('success', 'Usuario creado correctamente');
				
				// Redirigir a la página de inicio de sesión o donde quieras
				redirect(base_url('usuarios/registro'));
			}
		}
	}


	public function login()
	{
		$this->load->view('usuarios/login');

	}

	public function iniciarSesion() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
	
			if ($this->form_validation->run() == TRUE) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
	
				// Verificar la contraseña
				$status = $this->usuarios_model->checkPassword($password, $email);
	
				if ($status != false) {
					$session_data = array(
						'username' => $status->nombre,
						'email' => $status->email,
						'id' => $status->id,  // Asegúrate de incluir el ID del usuario aquí
						'rol' => $status->rol
					);
	
					$this->session->set_userdata('UserLoginSession', $session_data);
					redirect(base_url('productos'));
				} else {
					$this->session->set_flashdata('error', 'Email o contraseña incorrectos');
					redirect(base_url('usuarios/login'));
				}
			} else {
				$this->session->set_flashdata('error', 'Complete todos los campos requeridos');
				redirect(base_url('usuarios/login'));
			}
		}
	}
	

    public function logout() {
        $this->session->unset_userdata('UserLoginSession');
        $this->session->set_flashdata('success', 'Has cerrado sesión correctamente');
        redirect(base_url('usuarios/login'));
    }
}