<?php
    
    include 'conexion.php';
    $con = conexion();
    
    ini_set('display_errors',1);
    error_reporting(E_ALL);
    
    $cat_paquete_titulo = $_REQUEST['cat_paquete_titulo'];
    $cat_paquete_descripcion = $_REQUEST['cat_paquete_descripcion'];
    $cat_paquete_imagen_url = $_REQUEST['cat_paquete_imagen_url'];
    
    $json = new stdClass();
    
    $queryInsertarPaquete = "INSERT INTO cat_paquetes VALUES('',
                                                             '$cat_paquete_descripcion',
                                                             '$cat_paquete_titulo',
                                                             0,
                                                             '$cat_paquete_imagen_url', 
                                                            NULL, 
                                                            1, 
                                                            NULL, 
                                                            NULL)";
    //echo $queryInsertarPaquete;
    $queryExito = mysql_query($queryInsertarPaquete);
    
    if($queryExito == true){
        $json->exito = true;
    }
    else{
        $json->exito = false;
    }
    
    echo json_encode($json);
    