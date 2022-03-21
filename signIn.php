<?php
  session_start();    

function setCookies() {

  setcookie('name',       $_SESSION['Name'] ,    time() + 24*3600) ;   // Setting the cookie name  

  setcookie('email',       $_SESSION['Email'] ,    time() + 24*3600) ;  // Setting the cookie email

  setcookie('password' ,   $_SESSION['Password'],  time() + 24*3600) ;  // Setting the cookie Password
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="page Sign-in to e-clase">
    <meta name="keywords" content="Sign-in E-classe learn course">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Login Page</title>
</head>
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background : linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%);
  }
</style>
<body>

  <div>

    <div class="card rounded-5" style="width: 25rem; border-radius: 15px;">
  
        <div class="card-body">
        <div class=" border-start border-5 ms-4 " style="border-color: #00C1FE !important;">
            <h5 class="card-title fw-bold ms-2">E-classe</h5>
        </div>
        <div class="d-flex flex-column align-items-center p-3">
            <h6 class="fw-bold">SIGN IN</h6>
            <p class="card-text text-secondary">Enter your credentials to access your account</p>
        </div>   
        <form  method="POST" > 
        
          
<?php

include 'connect.php' ;  // The connection between the software and the database .

  if(isset($_POST['SignIn'])) { // checks if there is a value SIgnIn exist in the superglobal variable Post or not

    /* Calling the function test input that Removes whitespace from beginning and end of a string
    and removes Slashes And finnaly changes the string to an HTML Entities .

    */
  $Email = test_input($_POST['Email']); // filtering the value that comesback from the superglobal and storing it on Email .

  $Password = test_input($_POST['password']); // filtering the value that comesback from the superglobal and storing it on Password .
  
  $sql = "SELECT * FROM users WHERE Email='$Email' AND password='$Password' "; // Checking the account if it is true .

  $result=mysqli_query($con,$sql) ; //  The query sent to the Database

  $row = mysqli_fetch_assoc($result) ; // Fetch a result row as an associative array

  $count=mysqli_num_rows($result); //  It returns how many rows in our Table .

  if($count == 1){ // it checks if there is one row , THat means that user was found .

  $_SESSION['Name']     =    $row['Name'] ; // We are Storing the name of the user in a SESSION

  $_SESSION['Password'] =    $row['password'] ; // We are Storing the name of the user in a SESSION

  $_SESSION['Email']    =    $row['Email'] ; // We are Storing the name of the user in a SESSION

    if(isset($_POST['remember'])) {  //if users Sayes Remembers Me Create A Cookie for him .
      
      setCookies() ; // Calling the set cookies function .
    }

    // It redirects the user to the Home Page :
   header("location:Home.php");


  }else {
    echo '<div class="alert alert-danger" role="alert">
    The data you entered is false
      </div>' ;
  }
     
  
}
//This function takes a type of data and filter it using this three functions
function test_input($data) {
  $data = trim($data); //Remove characters from both sides of a string !!!!!!!
  $data = stripslashes($data); // Removes if there is some slashes ( / )
  $data = htmlspecialchars($data); // The htmlspecialchars() function converts some predefined characters to HTML entities.

  return $data;
}

?>

            <div class="mb-3 mt-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" value="<?php if(isset($_COOKIE['email']))  echo $_COOKIE['email'] ; ?>" name="Email"> 
            </div>
            <div class="mb-3">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" id="pwd" value="<?php if(isset($_COOKIE['password']))  echo $_COOKIE['password'] ; ?>" name="password"  maxlength="30" >
              </div>
            
            <div class="form-check mb-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> 
                Remember me

              </label>
            </div>
            <input type="submit" name="SignIn" class="btn btn-info w-100 border-0">
          </form>
          <div class="d-flex justify-content-center pt-3">
          <p class="card-text text-secondary" >Forgot your password?</p>
          <a href="#" style="color:#00C1FE ;">Reset Password</a>
          </div>
        </div>
    </div>
  </div>
  
    <script src="js/E-classe-Project.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>