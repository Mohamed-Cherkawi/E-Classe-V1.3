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
<body>
  <div class="d-flex align-items-center justify-content-center vh-100 bg-primary" style="background : linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%);">

    <div class="card rounded-5" style="width: 25rem; border-radius: 15px;">
  
        <div class="card-body">
        <div class=" border-start border-5 ms-4 " style="border-color: #00C1FE !important;">
            <h5 class="card-title fw-bold ms-2">E-classe</h5>
        </div>
        <div class="d-flex flex-column align-items-center p-3">
            <h6 class="fw-bold">SIGN IN</h6>
            <p class="card-text text-secondary">Enter your credentials to access your account</p>
        </div>   
        <form action="Home.php">
            <div class="mb-3 mt-3">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" placeholder="Enter your email" name="email">
            </div>
            <div class="mb-3">
              <label for="pwd">Password</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="pswd"  maxlength="30">
            
            <div class="form-check mb-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
              </label>
            </div>
            
           <a href="Home.php"><button type="submit" class="btn btn-primary w-100 border-0" style="background-color: #00C1FE ;">SIGN IN</button></a> 
          </form>
          <div class="d-flex justify-content-center pt-3">
          <p class="card-text text-secondary" >Forgot your password?</p>
          <a href=#" style="color:#00C1FE ;">Reset Password</a>
          </div>
        </div>
    </div>
  </div>
  
    <script
      src="js/E-classe-Project.js"
     
    ></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>