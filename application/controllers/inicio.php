<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{

		$this->load->view('commons/header');		
		$this->load->view('inicio');
		$this->load->view('commons/footer');
	}

	public function listado()
	{
		$this->load->view('commons/header');		
		$this->load->view('publicaciones/listado');
		$this->load->view('commons/footer');
	}

	public function publicacion()
	{
		$this->load->view('commons/header');		
		$this->load->view('publicaciones/publicacion');
		$this->load->view('commons/footer');
	}

	public function nueva()
	{
		$this->load->view('commons/header');		
		$this->load->view('publicaciones/nueva');
		$this->load->view('commons/footer');
	}

	public function perfil()
	{
		$this->load->view('commons/header');		
		$this->load->view('usuarios/perfil');
		$this->load->view('commons/footer');
	}

	public function pedidos()
	{
		$this->load->view('commons/header');		
		$this->load->view('usuarios/pedidos');
		$this->load->view('commons/footer');
	}

	public function postulaciones()
	{
		$this->load->view('commons/header');		
		$this->load->view('usuarios/postulaciones');
		$this->load->view('commons/footer');

	}

	public function  contacto()
	{
		$this->load->view('commons/header');		
		$this->load->view('contacto');
		$this->load->view('commons/footer');

	}



	public function test()
	{
				$arrayName = array(
							'nombre' => "pablochirino",
							'first_name' => "pablo",
							'last_name' => "chirino",
							'genero' => "male",
							'email' => "pablo.chirino",
							'username' => "peybol"
							);

		$this->basicdb->DB_INSERT('usuarios', $arrayName);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */