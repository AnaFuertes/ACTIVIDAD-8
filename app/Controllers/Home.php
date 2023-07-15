<?php

namespace App\Controllers;
// use App\Models

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    } 
    

    public function prueba ()
    {
        echo 'hola esto es una prueba';
    }

    public function api ()
    {


        $Producto= array (
           
            "id"=> 15,
              "name"=>"Calzado",
              "created_at"=> "2015-07-03 13:03:27 -0300",
              "updated_at"=> "2015-07-03 13:03:27 -0300",
              "permalink"=> "calzado/"        );

              $Productos= array (
                "id"=> 16,
                "parent_id"=> 15,
                "name"=> "Calzado Casual",
                "created_at"=> "2015-07-03 13:14:40 -0300",
                "updated_at"=> "2015-07-03 13:14:40 -0300",
                "permalink"=> "calzado/calzado-casual/"
             );

            
        $Productos1= array (
           
            "id"=> 17,
            "name"=> "Calzado Deportivo",
            "created_at"=> "2015-07-03 13:14:44 -0300",
            "updated_at"=> "2015-07-03 13:14:44 -0300",
            "permalink"=> "calzado/calzado-deportivo/"      );
        
          $Productos2= array (
           
            "id"=>  18,
            "name"=>  "Remeras",
            "created_at"=>  "2015-07-03 13:14:57 -0300",
            "updated_at"=>  "2015-07-03 13:14:57 -0300",
            "permalink"=> "remeras/"   );
        
    
$resultados=array($Producto,$Productos,$Productos1,$Productos2);
return $this->response->setJSON($resultados);
    }

    public function api1 ()
    {


        $datos= array (
           
            "id"=> 120,
            "name"=>"Botas Leñador",
            "description"=> "Confeccionadas en gamuza",
            "created_at"=> "2015-06-25 14:43:51 -0300",
            "updated_at"=> "2015-07-03 17:17:40 -0300",
            "permalink"=> "botas-lenador",
            "meta_keywords"=> "Palabras clave",
            "count_on_hand"=> 10,
            "seller_id"=> 24,
            "currency"=> "ARS"  );
        

return $this->response->setJSON($datos);
    }

    
 

    public function login(){

return view('login');
    
    }


    public function testbd($cedula)
    {

        $this->db=\Config\Database::connect();
        $query=$this->db->query("SELECT idpersonal, cedula, apellido1, apellido2, nombres, genero 
        FROM esq_datos_personales.personal where cedula='$cedula'  ");
        $result=$query->getResult();
        return $this->response->setJSON($result);


        // echo "hola";
    
    }
}
