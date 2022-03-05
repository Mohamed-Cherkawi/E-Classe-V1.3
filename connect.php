<?php 
 
 
$con= new mysqli('localhost' , 'root' , '' , 'e_classe_db') ; // Database Connection

if(!$con) {

    die(mysqli_error($con)) ;
    
}
?>