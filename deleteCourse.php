<?php
    include 'connect.php' ;

    if(isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'] ;

        $sql = "delete from `course` where id=$id" ;
        $result = mysqli_query($con,$sql) ;
        if($result) {

            header("location: course.php") ;

        }else {
            die(mysqli_error($con)) ;
        }


    }

?>