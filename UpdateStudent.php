<?php

session_start();    


include 'connect.php'; //Connection database file included 

$id = $_GET['updateid'];// Getting the id from the query String .

// Display The Values already filled on the ADDStudents's Form

$Fquery = "SELECT * FROM `students` WHERE id=$id" ;

/*  The mysql_query() function executes a query on a MySQL database.
        Arguments :  FirstA(Specifies the MySQL connection) || SecondA(Specifies the SQL query to send)
        This function returns the query handle for SELECT queries, TRUE/FALSE for other queries, or FALSE on failure.  */

$Result = mysqli_query($con,$Fquery);


// $Result = { "Name" : "NameValue","Email" : "EmailValue" ,"Phone" : "PhoneValue" ,  "EmailNumber" :"EmailNumber" }
    
  

/* The mysqli_ _assoc() function fetches a result row as an associative array.
Argument : result of the Query
*/
$row = mysqli_fetch_assoc($Result) ;

/*  $row = array(
    'Name' => NameValue
    'Email' => EmailValue
    'Phone' => PhoneValue
    'EmailNumber' => EmailNumber
)
*/

$Name =         $row['Name'];
$Email =        $row['Email'];
$Phone =        $row['Phone'];
$EmailNumber =  $row['EmailNumber'];

/* The isset() function checks whether a variable is set, which means that it has to be 
        declared and is not NULL.  This function returns true if the variable exists and is not NULL, otherwise it returns false.
        Arguments : One variable to check or multiple but it returns true only if they all exist 
        Return Value : TRUE if variable exists and is not NULL, FALSE otherwise 
        Return Type : boolean */

if (isset($_POST['submit'])) {

$Name =         $_POST['Name'];
$Email =        $_POST['Email'];
$Phone =        $_POST['Phone'];
$EmailNumber =  $_POST['EmailNumber'];

  // Updating our values to a new ones using this update query 

$Squery = "UPDATE `students` SET Name='$Name',Email='$Email',Phone='$Phone', EmailNumber='$EmailNumber'
                                                WHERE id=$id";

    $result = mysqli_query($con, $Squery);

    if ($result) {

        header("location: StudentPage.php"); // it redirects back the user automatically if the form are submited Correcrtly

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
        <div class="form-group mb-3">
            <label for="formGroupExampleInput">Entrez Le nom d'étudiant</label>
            <input type="text" name ="Name" class="form-control" id="formGroupExampleInput" placeholder="Nom" value="<?php echo $Name ?>">
        </div>
        <div class="form-grou mb-3">
            <label for="formGroupExampleInput2">Entrez L'émail d'étudiant</label>
            <input type="email" name = "Email" class="form-control" id="formGroupExampleInput2" placeholder="Email" value="<?php echo  $Email ?>">
        </div>
        <div class="form-group mb-3">
            <label for="formGroupExampleInput2">Entrez Le numero d'étudiant</label>
            <input type="text" name="Phone" class="form-control" id="formGroupExampleInput2" placeholder="NumeroEmail" value="<?php echo $Phone ?>">
        </div>
        <div class="form-group mb-3">
            <label for="formGroupExampleInput2">Entrez Le numero d'email d'étudiant</label>
            <input type="number" name="EmailNumber" class="form-control" id="formGroupExampleInput2" placeholder="Email" value="<?php echo $EmailNumber  ?>">
        </div>
        
        <button type="submit" class="btn btn-info w-100 " name="submit">Save</button>


    </form>

    <script src="js/E-classe-Project.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>