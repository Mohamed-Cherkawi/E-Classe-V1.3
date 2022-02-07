<?php

include 'connect.php';
$id = $_GET['updateid'];
if (isset($_POST['submit'])) {

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone =  $_POST['Phone'];
    $EmailNumber = $_POST['EmailNumber'];
    $sql = "update `students` set id=$id,Name='$Name',Email='$Email',Phone='$Phone',
  EmailNumber='$EmailNumber'
  where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("location: StudentPage.php");
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
    <title>Update Student Page</title>
</head>

<body>
    <form method="POST" class="container mt-5">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group mb-3">
            <label for="formGroupExampleInput">Entrez Le nom d'étudiant</label>
            <input type="text" name ="Name" class="form-control" id="formGroupExampleInput" placeholder="Nom">
        </div>
        <div class="form-grou mb-3">
            <label for="formGroupExampleInput2">Entrez L'émail d'étudiant</label>
            <input type="email" name = "Email" class="form-control" id="formGroupExampleInput2" placeholder="Email">
        </div>
        <div class="form-group mb-3">
            <label for="formGroupExampleInput2">Entrez Le numero d'étudiant</label>
            <input type="text" name="Phone" class="form-control" id="formGroupExampleInput2" placeholder="NumeroEmail">
        </div>
        <div class="form-group mb-3">
            <label for="formGroupExampleInput2">Entrez Le numero d'email d'étudiant</label>
            <input type="number" name="EmailNumber" class="form-control" id="formGroupExampleInput2" placeholder="Email">
        </div>
        
        <button type="submit" class="btn btn-info w-100 " name="submit">Submit</button>


    </form>

    <script src="js/E-classe-Project.js"></script>
    <script src="js/toogleSide.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>