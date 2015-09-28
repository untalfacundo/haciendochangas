<?php


class Usuarios extends CI_Model {

   function __construct()
   {
      parent::__construct();
		}
   

    function nuevoUsuario($user_data)
    {
        $this->basicdb->DB_INSERT('usuarios', $user_data);
        return true;
    }

    function eliminarUsuario()
    {
        return false;
    }
 }
?>
