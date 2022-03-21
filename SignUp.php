<?php
include 'connect.php';
// include 'session.php';
if (isset($_POST['SignUp'])) {
    $FirstName =     $_POST['FirstName'];
    $LastName  =     $_POST['LastName'];
    $Email     =     $_POST['Email'];
    $password  =     $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];



    if (empty($FirstName) && empty($LastName) && empty($Email) && empty( $password) && empty($confirmpassword )) {
        $error= '<div class="alert alert-danger" role="alert">
        fill all input 
        </div>';
      } else{
        $sql = "  INSERT INTO `users`(`FirstName`,`LastName`, `Email`, `password`, `confirmpassword`)
        VALUES ('$FirstName','$LastName','$Email',' $password','$confirmpassword')";

       $res = mysqli_query($con, $sql);
       if ($res) {
           header('location:SignIn.php');
       } else {
           die(mysqli_error($con));
       }
      }
   
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Sign Up</title>
    <style>
        body {
            background : linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%);

        }
        .r {
            color: red;
        }
        
    </style>
</head>

<body class="body">
    <div class="d-flex justify-content-center align-items-center vh-100 ">
        <div class="card " style="width:25rem; border-radius: 15px;">
            <div class="card-body">
                <h3 class="border-start border-4 border-primary ms-5 ps-2">E-classe</h3>
                <h6 class="d-flex justify-content-center text-uppercase ">Sign Up</h6>
                <P class="d-flex justify-content-center mt-2 text-secondary">Enter your information </P>
                   <?php 
                   echo @$error;
                   ?>
                <form method="POST" name="f">
                    <div class="form-group">
                        <label>FirstName <span class="r">*</span></label> <span id="EFN"></span>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Enter you FirstName ">

                    </div>
                    <div class="form-group mt-2">
                        <label>LastName <span class="r">*</span></label> <span id="ELN"></span>
                        <input type="text" class="form-control" name="LastName" placeholder="Enter you LastName ">
                    </div>
                    <div class="form-group">
                        <label>Email <span class="r">*</span></label><span id="EEM"></span>
                        <input type="text" class="form-control" id="usrEmail" name="Email" placeholder="Enter you Email ">
                    </div>
                    <div class="form-group mt-2">
                        <label>Password <span class="r">*</span></label><span id="EPASS"></span>
                        <input type="password" class="form-control" id="userPassword" name="password" placeholder="Enter you password ">
                    </div>
                    <div class="form-group mt-2">
                        <label>confirm password <span class="r">*</span></label><span id="ECPASS"></span>
                        <input type="password" class="form-control" id="userPassword" name="confirmpassword" placeholder="confirm password ">
                    </div>

                    <button type="submit" class="text-decoration-none btn btn-info container-fluid mt-2  text-uppercase" name="SignUp">Sign In</button>

                    <div class="d-flex justify-content-center mt-2">
                        <p class="text-secondary">if you have acount?<span> <a href="signIn.php">log in </a> </span> </p>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/E-classe-Project.js"></script>
    <script>
        let FirstName = document.querySelector("input[name='FirstName']");
        let LastName = document.querySelector("input[name='LastName']");
        let Email = document.querySelector("input[name='Email']");
        let password = document.querySelector("input[name='password']");
        let confirmpassword = document.querySelector("input[name='confirmpassword']");
        
        let EFN = document.getElementById("EFN");
        let ELN = document.getElementById("ELN");
        let EEM = document.getElementById("EEM");
        let EPASS = document.getElementById("EPASS");
        let ECPASS = document.getElementById("ECPASS");


        //############################# start function  for LastName ###########################
        LastName.onblur = function() {
            validateLastName();
        };

        function validateLastName() {
            if (LastName.value != "") {
                ELN.innerHTML = "";
                if (!LastName.value.match(/^[a-zA-Z]{5,}$/)) {
        
                    ELN.innerHTML = "Invalid FirstName";
                }
            } else {
                ELN.innerHTML = "FirstName is required";
            }
        }
        //###########################end function  for LastName##################################

        //############################# start function  for FirstName ###########################
        FirstName.onblur = function() {
            validateFirstName();
      
        };

        function validateFirstName() {
            if (FirstName.value != "") {
                EFN.innerHTML = "";
                if (!FirstName.value.match(/^[a-zA-Z]{5,}$/)) {
                    EFN.innerHTML = "Invalid FirstName";
                }
            } else {
                EFN.innerHTML = "FirstName is required";
            }
        }
        //###########################end function  for FirstName##################################

        //############################# start function  for validateEmail ###########################
        Email.onblur = function() {
            validateEmail();
        };

        function validateEmail() {
            if (Email.value != "") {
                EEM.innerHTML = "";
                if (!Email.value.match(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/)) {
                    EEM.innerHTML = "Invalid email format";
                }
            } else {
                EEM.innerHTML = "email adresse is required";
            }
        }
        //###########################end function  for validateEmail###########################

        //############################# start function  for validatepassword ###########################
        password.onblur = function() {
            validatepassword();
        };

        function validatepassword() {
            if (password.value != "") {
                EPASS.innerHTML = "";
                if (!password.value.match(/^[a-zA-Z0-9]{7,}$/)) {
                    EPASS.innerHTML = "Invalid password format";
                }
            } else {
                EPASS.innerHTML = "password is required";
            }
        }
        //###########################End function  for validatepassword###########################
        
        //############################# start function  for confirmpassword ###########################
        confirmpassword.onblur = function() {
            conpassword();

        };
        function conpassword() {
            if (confirmpassword.value == password.value) {
                ECPASS.innerHTML = "Password Succesfuly match";
            } else {
                ECPASS.innerHTML = "password error";
            }
        }
        //###########################end function  for confirmpasswordpassword###########################


        // preventdefault
        // FirstName.onblur = function() {
        //     mouseOut()
        // };

        // function mouseOut() {
        //     alert(FirstName.value);
        // }
    </script>
</body>

</html>