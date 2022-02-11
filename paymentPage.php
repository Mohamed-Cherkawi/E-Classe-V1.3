<?php

include 'connect.php' ;

if(isset($_POST['submit'])) { // If users submits 
  $Name =             $_POST['Name'] ;
  $PaymentSchedule =  $_POST['PaymentSchedule'] ; 
  $BillNumber =       $_POST['BillNumber'] ;
  $AmountPaid =       $_POST['AmountPaid'] ;
  $BalanceAmount =    $_POST['BalanceAmount'] ;
  $Date =             $_POST['Date'];

  $sql = " INSERT INTO `payments`( `Name`, `PaymentSchedule`, `BillNumber`, `AmountPaid`, `BalanceAmount`,`Date`)
   VALUES ('$Name','$PaymentSchedule','$BillNumber' ,'$AmountPaid','$BalanceAmount','$Date')"  ;

  $result = mysqli_query($con,$sql) ; //

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
          <!-- Button trigger modal -->
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
       ADD NEW PAYMENT
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
            <label for="exampleFormControlInput1" class="form-label">Entrez Le nom</label>
            <input type="text" name="Name" placeholder="Nom..." class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez le Calendrier de paiement</label>
            <input type="text" name="PaymentSchedule" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez Le  Numéro de facture</label>
            <input type="number" name="BillNumber" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez Le Le montant payé</label>
            <input type="number" name="AmountPaid" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez Le Montant du solde</label>
            <input type="number" name="BalanceAmount" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Entrez La date d'affectation</label>
            <input type="date" name="Date" class="form-control" id="exampleFormControlInput1">
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

            <!--             Modal  End           -->
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
            <?php
            // Displaying Only  All The Data Stored In Payments Table In MySql
          $sql = "SELECT * from `payments` " ;

                          $result = mysqli_query($con,$sql);

                          if($result){

                          while($row=mysqli_fetch_assoc($result)) {

                             $Name =               $row['Name'] ;
                             $PaymentSchedule =    $row['PaymentSchedule'] ;
                             $BillNumber =         $row['BillNumber'] ;
                             $AmountPaid =         $row['AmountPaid'] ;
                             $BalanceAmount =      $row['BalanceAmount'] ; 
                             $Date =               $row['Date'];

                              echo '
                              
                              <tr class="bg-white t-rows">    
                              
                              <td class="p-3 align-middle">
                              '. $Name .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $PaymentSchedule .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $BillNumber .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $AmountPaid .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $BalanceAmount .'
                              </td>
                              <td class="p-3 align-middle">
                              '. $Date .'
                              </td>
                              <td class="p-3"><i class="bi bi-eye text-info"></i></td>
                          </tr>
                      
                              
                              ' ; 
                            }
                          }
                          ?>
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