<?php

/**
 *  por Pablo Chirino
 */

class Basicdb extends CI_Model {

   function __construct()
   {
      parent::__construct();
		}
   

    function DB_EXIST($table, $valores)
    {
        $sql = 'SELECT * FROM '.$table;
        $sql .= $this->GET_WHERE($valores);

        $result = $this->db->query($sql);

        if ($result->num_rows() > 0) {
            return true;
        }
        else
            return false;
    }

    function DB_SELECT($table, $valores, $specific = null)
    {

        if ($specific == null) {
            $specific = "*";
        }

        $sql = 'SELECT '.$specific.' FROM '.$table;
        $sql .= $this->GET_WHERE($valores);
        
        $result = $this->db->query($sql);

        if ($result->num_rows() > 0) {
            return $result;
        }
        else
            return false;
    }

    function DB_INSERT($table, $valores, $null_acepted = false)
       {
            $into = "";
            $values = "";
            $count = 0;

            foreach ($valores as $key => $valor) 
            {
                if (($valor != null)||($null_acepted == true))
                {
                    $count++;
                    //Comillo strings
                    if (gettype($valor) == 'string') $com = "'"; else $com = null;
                    //Adapto Booleans
                    if (gettype($valor) == 'boolean')
                    {
                        if ($valor == FALSE) $valor = "FALSE"; else $valor = "TRUE";
                    }       
                    //Preparo cadenas
                    $into = $into.$key;
                    if ($valor === null) {
                       $valor = 'NULL'; $com = null;
                    }
                    $values = $values.$com.$valor.$com; 
                    //Separo con comas
                    if ($count < count($valores)) 
                        {
                            $into = $into.", ";
                            $values = $values.", ";
                        }          
                }
            }
        	$sql_string = "INSERT INTO ".$table."(".$into.") VALUES (".$values.")";
            return $this->db->query($sql_string);

    	}

    function DB_QUERY($consulta, $condiciones=NULL)
    {
        return $this->db->query($consulta.$this->GET_WHERE($condiciones));
    }


    function GET_WHERE($valores)
    {
          $count = 0;
          $result = " WHERE ";

          if (isset($valores))
          {
                foreach ($valores as $key => $valor) 
                {
                    $count++;
                    //Comillo strings
                    if (gettype($valor) == 'string') $com = "'"; else $com = null;
                    //Adapto Booleans
                    if (gettype($valor) == 'boolean')
                    {
                        if ($valor == FALSE) $valor = "FALSE"; else $valor = "TRUE";
                    }       
                    //Preparo cadenas
                    if ($valor === null) {                       
                        $result = $result.$key." IS NULL "; 
                    }
                    else
                    {
                        $result = $result.$key." = ".$com.$valor.$com; 
                    }                    

                    if ($count < count($valores)) 
                        {
                            $result = $result." AND ";
                        }

                }
                return $result;
            }
            else
                return null;
    }
   

       function DB_UPDATE($table, $valores, $condiciones, $null_acepted = false)
       {
            $fquery = "";
            $count = 0;

            foreach ($valores as $key => $valor) 
            {
                if (($valor != null)||($null_acepted == true))
                {
                    $count++;
                    //Comillo strings
                    if (gettype($valor) == 'string') $com = "'"; else $com = null;
                    //Adapto Booleans
                    if (gettype($valor) == 'boolean')
                    {
                        if ($valor == FALSE) $valor = "FALSE"; else $valor = "TRUE";
                    }
                    if ($valor == null) {
                              $com = null; $valor = 'NULL';
                           }       
                    //Preparo cadenas
                    $fquery = $fquery.$key." = ".$com.$valor.$com;
                    //Separo con comas

                    if ($null_acepted) {
                     if ($count < count($valores)) 
                        {
                            $fquery = $fquery.", ";
                        }   
                    }
                    else
                    {
                     if ($count < count(array_filter($valores))) 
                        {
                            $fquery = $fquery.", ";
                        }                         
                    }
        
                }
            }
            
            if (strlen($fquery) > 4) {
                $sql_string = "UPDATE ".$table." SET ".$fquery.$this->GET_WHERE($condiciones);
                $result = $this->db->query($sql_string);
            }
            else $result = FALSE;
           
            return $result;
        }

        function DB_DELETE($table, $conditions)
        {
            $sql = "DELETE FROM ".$table.$this->GET_WHERE($conditions);
            $this->db->query($sql);
        }

        function DB_KEYWHERE($table, $condiciones)
        {
            $sql = "SHOW INDEX FROM ".$table." WHERE Key_name = 'PRIMARY'";
            $result = $this->db->query($sql);

            if ($result->num_rows() > 0) {            
                $row = $result->row_array(); 
                $primary_col = $row['Column_name'];

                $sql = "SELECT ".$primary_col." FROM ".$table.$this->GET_WHERE($condiciones);
                $newres = $this->db->query($sql);

                if ($newres->num_rows() > 0) {
                    $row = $newres->row_array(); 
                    return $row[$primary_col];
                }
                else
                    return 0;
            }
            else
                return false;
            
        }
 }
?>
