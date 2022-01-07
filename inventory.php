<?php
require 'db.php';


 
    function list_products() {
        global $connection;

        $categoria = $_GET["categoria"];
        $subcategoria = $_GET["subcategoria"];
        if($subcategoria === '') {
              $query = "SELECT *
                    FROM inventario
                    WHERE categoria= '{$categoria}'
                    ORDER BY id ASC"
                    ;
        }
        else{
            //sql query
             $query = "SELECT *
                        FROM inventario
                        WHERE categoria= '{$categoria}'
                        AND
                        subcategoria= '{$subcategoria}'
                        ORDER BY id ASC"
                        ;
                       // WHERE usuario =? "; //  avoid this nombre = '{$userName}'
        }
     
        $result = mysqli_query($connection, $query);
        $arrayProducts= array();
        
        if($result){
            //if the query is correct

            // iterate through each table row
         while($created_products = mysqli_fetch_assoc($result)){
                array_push($arrayProducts,$created_products); //this function  always receives 2 arguments
            }   
            ///200
            header("HTTP/1.1 200 OK");
            echo 'ok';
            
            echo json_encode($arrayProducts);
            //json_encode() trnsforma los datos a formato json
        }   
        else{
            //500
           header("HTTP/1.1 500 Internal Server Error");
            echo 'error';
        }
        return  $arrayProducts;
    }

    
//  function create_product() {
      
//     //variable to store the data  json encoded
//      $product_decoded = json_decode(file_get_contents('php://input'),true);
       

//         global $connection;
//         //sql query
//         $insert_query = "INSERT INTO inventario (nombre,precio,cantidad)
//                          VALUES(?,?,?)";
//         //stmt = statement
//         $stmt = $connection->prepare($insert_query); 
//         //accesing to an associative array returned by json_Decode()
//         $stmt->bind_param( 'sdd', $product_decoded["nombre"],
//                                      $product_decoded["precio"],
//                                      $product_decoded["cantidad"]
                                   
//         );
//         //storing the result for that query using a method from the $smtp object
//         $insert_result =  $stmt->execute(); 
//         /*  *** OJO ***
//         ESTO CAMBIA
//         ya no ponemos  
//         $stmt->execute();
//         //storing the result for that query using a method from the $smtp object
//         $insert_result =  $stmt->get_result();

//         # si lo hacemos como antes recibiremos en el status de la respuesta un status 500
//         */

//         //control request status
//         if($insert_result){
//             ///200
//             header("HTTP/1.1 200 OK");
//             header("Access-Control-Allow-Origin: *");
//             echo 'OK'; //this will appear on the postman as response and on the app if we print the curl_exec()
//         }   
//         else{
//             //500
//            header("HTTP/1.1 500 Internal Server Error"); 
//            echo 'error'; //this will appear on the postman as response and on the app if we print the curl_exec()
//         }
//     }

//     //DELETE PRODUCTS
    
//     function delete_product() {
//         global $connection;

//         $id = $_GET["id"]; // select de parameter id from the url
//         $delete_query = "DELETE FROM inventario 
//                         WHERE id = ?";
//         //stmt = statement
//         $stmt = $connection->prepare($delete_query); 
//         $stmt->bind_param( 'd',$id); // "d" is used to relate to a number
        
//         //storing the result for that query using a method from the $smtp object
//         $delete_result =  $stmt->execute();
//         //control request status
//         if($delete_result){
//             ///200
//             header("HTTP/1.1 200 OK");
//             //header("Access-Control-Allow-Origin: *");
//              echo 'OK';
//         }   
//         else{
//             //500
//            header("HTTP/1.1 500 Internal Server Error"); 
//             echo 'error';
//         }
//     }

//     //PUT

//      function put_product() {

//         global $connection;

//         $id = $_GET["id"]; // select the parameter id from the url
//         $product_decoded = json_decode(file_get_contents('php://input'),true);

//          $update_query = "UPDATE inventario 
//                         SET nombre = ?,
//                             precio = ?,
//                             cantidad = ?,
//                         WHERE id = ? ";
//         //stmt = statement
//         $stmt = $connection->prepare($update_query); 
//         //accesing to an associative array returned by json_Decode()
//         $stmt->bind_param('sddd', $product_decoded["nombre"],
//                                 $product_decoded["precio"],
//                                 $product_decoded["cantidad"],
//                                 $id 
//         );
//         //storing the result for that query using a method from the $smtp object
//         $insert_result =  $stmt->execute(); 
//         //control request status
//         if($insert_result){
//             ///200
//             header("HTTP/1.1 200 OK");
//             //header("Access-Control-Allow-Origin: *");
//              echo 'OK';
//         }   
//         else{
//             //500
//            header("HTTP/1.1 500 Internal Server Error"); 
//              echo 'error';
//         }
//       
?>