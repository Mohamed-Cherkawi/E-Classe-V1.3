<?php    
include 'connect.php';
if(isset($_POST['submit'])) {
  

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" payment page to see Payment Details ">
    <meta name="keywords" content="payment Payment Details  ">
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styleX.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Page de Payment</title>
    <style>
          <?php include 'Webkit.php' ; ?>

</style>
   
</head>

<body>

    <div class="d-flex" id="wrapper">

     <?php include 'sidebar.php';
     echo '<!-- Page Content -->
     <div id="page-content-wrapper" style="background: #FFFFFF;">' ;
           include 'navbar.php';
   ?>

    <main>     
     <div class="container-fluid">
         <div class="d-flex justify-content-between py-3  border-bottom border-5">
         <h2 class="fw-bold">Payment Details</h2>
         <i class="bi bi-chevron-expand fs-3 text-info"></i>
        </div>
     <div class="overflow-auto tableC">   
    <table class="table table-hover table-striped overflow-scroll">
        <tbody class="border-top-0">
            <tr>
            <td  class="text-secondary p-3">Name</td>
            <td  class="text-secondary p-3">Payment Schedule</td>
            <td  class="text-secondary p-3">Bill Number</td>
            <td  class="text-secondary p-3">Amount Paid</td>
            <td  class="text-secondary p-3">Balance amount</td>
            <td  class="text-secondary p-3" colspan="2">Date</td>  
          </tr>
          <tr>
              <td class="text-black p-3"></td>
              <td class="text-black p-3"></td>
              <td class="text-black p-3"></td>
              <td class="text-black p-3"></td>
              <td class="text-black p-3"></td>
              <td class="text-black p-3"></td>
              <td class="p-3"><i class="bi bi-eye text-info"></i></td>
          </tr>
          
            
        </tbody>
      </table>
         </div> 
     </div> 
       </main>  
     </div>
     
  </div> 
    
    <script
    src="js/E-classe-Project.js"
   
  ></script>
  <script src="js/toogleSide.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>