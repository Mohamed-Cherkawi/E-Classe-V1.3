<?php

include 'connect.php';
$id = $_GET['updateid'];

// Display The Values already filled on form

$Fquery = "Select * from `course` where id=$id" ;

$Result = mysqli_query($con,$Fquery);
$row = mysqli_fetch_assoc($Result) ;

$Name =         $row['Name'];
$Type =         $row['Type'] ;
$Language =     $row['Language'] ;
$Price =        $row['Price'] ;
$Duration =     $row['Duration'] ;

if (isset($_POST['submit'])) {

    $Name =      $_POST['Name'];
    $Type =      $_POST['Type'] ;
    $Language =  $_POST['Language'] ;
    $Price =     $_POST['Price'] ;
    $Duration =  $_POST['Duration'] ;
    // Updated Query
    $Squery = "update `course` set id=$id,Name='$Name',Type='$Type',Language='$Language', Price='$Price' ,Duration='$Duration'
                                                        where id=$id";

    $result = mysqli_query($con, $Squery);

    if ($result) {

        header("location:course.php") ;

    } else {

        die(mysqli_error($con));

    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="page dashboard for see number of Users and Students course  ">
    <meta name="keywords" content=" E-classe Update Pagee">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styleX.css">
    <title>Update Courses Page</title>
</head>

<body>
    <form method="POST" class="container mt-5">
        <div class="form-group mb-3">
            <label for="formGroupExampleInput">Entrez Le Nom du Cours</label>
            <input type="text" name ="Name" class="form-control" id="formGroupExampleInput" placeholder="Nom" value="<?php echo $Name ?>">
        </div>
        <div class="form-grou mb-3">
            <label for="formGroupExampleInput2">Entrez Le Type du cours</label>
            <input type="text" name = "Type" class="form-control" id="formGroupExampleInput2" placeholder="Email" value="<?php echo  $Type ?>">
        </div>
        <div class="form-group mb-3">
            <label for="formGroupExampleInput2">Entrez Le Language du cours</label>
            <input type="text" name="Language" class="form-control" id="formGroupExampleInput2" placeholder="NumeroEmail" value="<?php echo $Language  ?>">
        </div>
        <div class="form-group mb-3">
            <label for="formGroupExampleInput2">Entrez Le Prix du Cours</label>
            <input type="number" name="Price" class="form-control" id="formGroupExampleInput2" placeholder="Email" value="<?php echo $Price  ?>">
        </div>
        <div class="form-group mb-3">
            <label for="formGroupExampleInput2">Entrez La Durée du cours</label>
            <input type="text" name="Duration" class="form-control" id="formGroupExampleInput2" placeholder="Email" value="<?php echo $Duration  ?>">
        </div>
        
        <button type="submit" class="btn btn-info w-100 " name="submit">Save</button>


    </form>

    <script src="js/E-classe-Project.js"></script>
    <script src="js/toogleSide.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>