<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core extends CI_Controller {

	public function index()
	{
		exit();
	}

	/*
	public function iniciarSesion()
	{
		$this->users_library->OnlyForUnLogged();
		$user = $this->facebook->getUser();
        
        if ($user) 
        {
            try 
            {
                $data['user_profile'] = $this->facebook->api('/me');
            } 
            catch (FacebookApiException $e) 
            {
                $user = null;
            }
        }
        else 
        {
            $this->facebook->destroySession();
        }

        if ($user) 
        {
        	# Si esta logueado...
        	redirect('micuenta');
        } 
        else 
        {
        	# Si no esta logeuado por face..
            $data['login_url'] = $this->facebook->getLoginUrl(array(
														                'redirect_uri' => base_url().'/core/facebook_sesion',
														                'scope' => array("email") // permissions here
														            ));

            # mostramos pantalla de login
			if (($this->form_validation->run() == FALSE)||(!isset($_POST)))
			{
				$data = null;
				# Cargamos la vista de login con errores
				# O devolvemos un error para ajax.
				$this->load->view('contents/login', $data);
			}
			else
			{
				# Procesamos el login
				$input_email = $this->input->post('user_email');
				$input_password = $this->input->post('user_password');

				# LLamamos a metodo de Ususarios, para comprobar si el usuario con tal email y pass existe.
				# $uiser_id = COMPLETAR
				if ($user_id > 0) {

					// Inicializamos los datos de la session.
					$ses_data = array(
					                   'email'     => $input_email,
					                   'logged_in' => TRUE,
					                   'user_id' => $user_id
					               );

					$this->session->set_userdata($ses_data);
					
					# Redirigimos a app logueada.				
					redirect('/micuenta');
				}
				else
				{
					# Mostramos errores de logueo
					# O devolvemos un error para ajax.
					$data = null;
					$this->load->view('contents/login', $data);
				}

			}
        }
	}
	*/

	public function facebook_sesion()
	{
		$user = $this->facebook->getUser();
        
        if ($user) 
        {
            try 
            {
                $data['user_profile'] = $this->facebook->api('/me');
            } 
            catch (FacebookApiException $e) 
            {
                $user = null;
            }
        }
        else 
        {
            $this->cerrar_sesion();
        }


        # Analizo si el usuario ya esta registrado en el sitio.
        $user_email = $data['user_profile']['email'];
        $user_face_id = $user;

        if ($this->usuarios->user_exist($user_email)) {
        	
        	$loging_user = array('email' => $user_email);
        	$user_id = $this->dbcom_model->DB_KEYWHERE('users', $loging_user);

			// Inicializamos los datos de la session.
			$ses_data = array(
			                   'email' => $user_email,
			                   'logged_in' => TRUE,
			                   'user_id' => $user_id
			               );

			$this->session->set_userdata($ses_data);

			redirect('/micuenta');
        }
        else
        {
        		# Registrar nuevo usuario
				$newuser = array(
									'username' => $data['user_profile']['username'],
									'first_name' => $data['user_profile']['first_name'],
									'last_name' => $data['user_profile']['last_name'],,
									'genero' => $data['user_profile']['gender'],
									'email' => $data['user_profile']['email']
									);

				$this->usuarios->nuevoUsuario($newuser);
				$new_user_id = $this->dbcom_model->DB_KEYWHERE('users', $newuser);
				
				# Intento asignarle el mismo nombre que tiene en facebook.

				# Inicio La session.
				$ses_data = array(
				                   'email'     => $data['user_profile']['email'],
				                   'logged_in' => TRUE,
				                   'user_id' => $new_user_id
				               );

				$this->session->set_userdata($ses_data);

				redirect('/inicio');
        	}
        }
	}

	public function cerrar_sesion()
	{
		$this->session->sess_destroy();
        $this->facebook->destroySession();
        #$this->facebook->setSession(null);
		redirect('/inicio');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */