<?php


class Publicaciones extends CI_Model {

   function __construct()
   {
      parent::__construct();
		}
   

    function nuevaPublicacion($tarea, $cuando, $precio)
    {
        $user_id = $this->session->get_userdata('user_id');

        $datos_publicacion = array( 'id_user' => $user_id,
                                    'tarea' => $tarea,
                                    'cuando' => $cuando,
                                    'precio' => $precio
                                    );

        $this->basicdb->DB_INSERT('publicaciones', $datos_publicacion);
        return true;

    }

    function eliminarPublicacion()
    {
        return false;
    }

    function abrirPublicacion()
    {
        return false;
    }

    function postularsePara()
    {
        return false;
    }
 }
?>
