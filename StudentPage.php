<?php

include 'connect.php';

if (isset($_POST['submit'])) { // If users submits 

  $Name            =  $_POST['Name'];
  $Email           =  $_POST['Email'];
  $Phone           =  $_POST['Phone'];
  $EmailNumber     =  $_POST['EmailNumber'];
  $DateofAdmission =  $_POST['DateOfAdmission'];

  $sql = " INSERT INTO `students`( `Name`, `Email`, `Phone`, `EmailNumber`, `DateOfAdmission`)
   VALUES ('$Name','$Email',$Phone ,'$EmailNumber','$DateofAdmission')";

  $result = mysqli_query($con, $sql); 

  // $numOfRows =mysqli_num_rows($result);
  // if($numofRows < 1) {
  //   $errorMessage = "You don't have any students yet" ;
  // }

  if (!$result) {
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
  <meta name="description" content="page Student for see Students List and more information about student  ">
  <meta name="keywords" content="Student Students List ">
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/styleX.css">
  <title>Student Page</title>
</head>

<body>
  <div class="d-flex" id="wrapper">


    <?php include 'sidebar.php';
    echo '<!-- Page Content -->
                   <div id="page-content-wrapper" style="background:#FFFFFF">';
    include 'navbar.php';
    ?>

    <!--   Page Content   -->
    <main style="background-color: #e5e5e58f;">
      <div class="container-fluid overflow-auto">
        <div class="py-3 border-bottom border-5 d-flex justify-content-between uC">
          <h2 class="fw-bold">Students List</h2>
          <div>
            <i class="bi bi-chevron-expand fs-4 text-info me-4 col-md-2"></i>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
              ADD NEW STUDENT
            </button>

            <!--             Modal  Start           -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please fill up </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" >
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Entrez Le nom d'étudiant</label>
                        <input type="text" name="Name" placeholder="Nom..." class="form-control" id="exampleFormControlInput1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Entrez L'émail d'étudiant</label>
                        <input type="email" name="Email" value="@gmail.com" class="form-control" id="exampleFormControlInput1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Entrez Le numero de telephone d'étudiant</label>
                        <input type="number" name="Phone" class="form-control" id="exampleFormControlInput1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Entrez Le numero d'email d'étudiant</label>
                        <input type="number" name="EmailNumber" class="form-control" id="exampleFormControlInput1">
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Entrez La Date</label>
                        <input type="date" name="DateOfAdmission" class="form-control" id="exampleFormControlInput1">
                      </div>

                      <div class="mb-3" style="text-align: center;">

                        <button type="submit" class="btn btn-info w-100 " name="submit">Save</button>
                        <p class="error"><?php echo @$error; ?></p>
                        <p class="success"><?php echo @$success; ?></p>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <!--             Modal  End           -->


          </div>
        </div>
        <div class="overflow-auto tableC">
          <table class="table">
            <tbody class="border-top-0">
              <tr>
                <td></td>
                <td class="text-secondary p-3">Name</td>
                <td class="text-secondary p-3">Email</td>
                <td class="text-secondary p-3">Phone</td>
                <td class="text-secondary p-3">Email Number</td>
                <td class="text-secondary p-3" colspan="2">Date of admission</td>

              </tr>
              <tr>
                <td style="display: none;"></td>
              </tr>
              <?php

              $sql = "SELECT * FROM `students` ";

              $result = mysqli_query($con, $sql);

              // count students
              $query_1 = "SELECT COUNT(id) AS 'TotalStudents' FROM `students`";
              $result_1 = mysqli_query($con, $query_1);
              $data_1 = mysqli_fetch_assoc($result_1);
              $TotalStudents = $data_1['TotalStudents'];

              if ($TotalStudents < 1) { // If there is no students it prints message 
                echo "<p>No student found !</p>";
              }


              if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {

                  $id =              $row['id'];
                  $Name =            $row['Name'];
                  $Email =           $row['Email'];
                  $Phone =           $row['Phone'];
                  $EmailNumber =     $row['EmailNumber'];
                  $DateOfAdmission = $row['DateOfAdmission'];


                  echo '
                              
                              <tr class="bg-white t-rows">    
                              <td>
                             <img  src="images/image.jpg" alt="Groupe of Students" width="80"> 
                              </td>
                              <td class="p-3 align-middle">
                              ' . $Name . '
                              </td>
                              <td class="p-3 align-middle">
                              ' . $Email . '
                              </td>
                              <td class="p-3 align-middle">
                              ' . $Phone . '
                              </td>
                              <td class="p-3 align-middle">
                              ' . $EmailNumber . '
                              </td>
                              <td class="p-3 align-middle">
                              ' . $DateOfAdmission . '
                              </td>
                              <td class="p-3 align-middle">
                               <a href="UpdateStudent.php?updateid=' . $id . '"> <i class="bi bi-pencil fs-4 text-info"></i> </a> 
                               
                              </td>
                              <td class="p-3 align-middle" >
                              <a href="DeleteStudent.php?deleteid=' . $id . '" onclick="return confirm(`Are You Sure ?`)"> <i class="bi bi-trash fs-4 ms-4 text-info"></i></a>
                              </td>
                          </tr>
                        <tr>
                            <td></td>
                        </tr>
                              
                              ';
                }
              }

              ?>



            </tbody>
          </table>
        </div>


      </div>
    </main>
  </div>
  </div>

  
  <script src="js/E-classe-Project.js"></script>
  <script src="js/toogleSide.js"></script>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>