
<?php

include 'connect.php' ;

if(isset($_POST['submit'])) {

  $Name =       $_POST['Name'] ;
  $Type =       $_POST['Type'] ;
  $Language =   $_POST['Language'] ;
  $Price =      $_POST['Price'] ;
  $Duration =   $_POST['Duration'] ;

  $sql = "INSERT INTO `course`( `Name`, `Type`, `Language`, `Price`, `Duration`)
   VALUES ('  $Name','$Type','$Language' ,'$Price','$Duration')"  ;

  $result = mysqli_query($con,$sql) ;

  if(!$result) {

    die(mysqli_error($con)) ;
    
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
                   <div id="page-content-wrapper" style="background:#FFFFFF">' ;
                 include 'navbar.php';
         ?>
      
                  <!--   Page Content   -->
                <main  style="background-color: #e5e5e58f;"> 
                  <div class="container-fluid overflow-auto">
                      <div class="py-3 border-bottom border-5 d-flex justify-content-between uC">
                      <h2 class="fw-bold">Courses</h2>
                      <div>
                      <i class="bi bi-chevron-expand fs-4 text-info me-4 col-md-2"></i>
                      <!-- Button trigger modal -->
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
       ADD NEW COURSE
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
            <form   method="POST" >
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez Le nom du cours</label>
            <input type="text" name="Name" placeholder="Nom..." class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez Le Type</label>
            <input type="text" name="Type" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez Le Language du cours</label>
            <input type="text" name="Language" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez Le Prix du cours</label>
            <input type="number" name="Price" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez La Durée du cours</label>
            <input type="text" name="Duration" class="form-control" id="exampleFormControlInput1">
          </div>
      
          <div class="mb-3" style="text-align: center;" >
      
            <button type="submit" class="btn btn-info w-100 " name="submit" >Save</button>
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
      </div>
             </div>
            <!--             Modal  End           --> 
                      
                    <div class="overflow-auto tableC">
                     <table class="table">
                      <tbody class="border-top-0">
                          <tr>
                          <td  class="text-secondary p-3">Name</td>
                          <td  class="text-secondary p-3">Type</td>
                          <td  class="text-secondary p-3">Language</td>
                          <td  class="text-secondary p-3">Price</td>
                          <td  class="text-secondary p-3">Duration</td>                           
                          </tr>
                          <tr>
                              <td style="display: none;"></td>
                          </tr>
                          <?php

                          $sql = "SELECT * from `course` " ;
                          $result = mysqli_query($con,$sql);
                          if($result){
                            while($row=mysqli_fetch_assoc($result)) {


                              $id =         $row['id'] ;
                              $Name =       $row['Name'] ;
                              $Type =       $row['Type'] ;
                              $Language =   $row['Language'] ;
                              $Price =      $row['Price'] ;
                              $Duration =   $row['Duration'] ; 
                              echo '
                              
                              <tr class="bg-white t-rows">    
                              <td class="p-3 align-middle">
                              '. $Name .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $Type .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $Language .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $Price .'
                              </td>
                              <td class="p-3 align-middle">
                              '.$Duration .'
                              </td>
                              <td class="p-3 align-middle">
                              <a href="UpdateCourse.php?updateid='.$id.'"> <i class="bi bi-pencil fs-4 text-info"></i> </a> 
                              
                             </td>
                             <td class="p-3 align-middle" >
                             <a href="deleteCourse.php?deleteid='.$id .'" > <i class="bi bi-trash fs-4 ms-4 text-info"></i></a>
                             </td>
                          </tr>
                       
                              
                              ' ; 
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
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>