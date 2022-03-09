<?php
    include 'session.php';

    include 'connect.php' ;

    if(isset($_GET['deleteid'])) { 
        
        $id = $_GET['deleteid'] ;

        $sql = "DELETE FROM `students` where id=$id" ;


        $result = mysqli_query($con,$sql) ;

        if($result) {
            
            header("location:StudentPage.php") ;

        }else {

            die(mysqli_error($con)) ;
        }
    }
?>