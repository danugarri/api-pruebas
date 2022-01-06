<?php
//conennection to data base
// put @ in front of mysqli_connect to avoid warninng if the conexion fails
$connection =  @mysqli_connect('localhost','id17072695_admin','Boomerang.zaida91','id17072695_sinag');
$connection_error = 'Error en la conexión';
 //if connection is not successful
 if(!$connection){
    die( $connection_error);
 }
 //else{echo "conexion correcta";}


 //otra forma de hacerlo
 /*
 if( $connection -> connect_errno) {
     printf("Error de conexión a la base de datos: %s\n", $connection-> connect_errno);
     exit();
 }
 */

?>