<?php

include 'connect.php';
// First Query gives me the total of students using the Count function
$query_1 = "SELECT COUNT(id) AS 'TotalStudents' FROM `students`"; // The count function counts how many line we have on id property
$result_1 = mysqli_query($con, $query_1);
$data_1 = mysqli_fetch_assoc($result_1);
$TotalStudents = $data_1['TotalStudents'];

// Second query gives me the Sum of the Amount Payments using the SUM function
$query_2 = "SELECT SUM(AmountPaid) AS 'TotalPayments' FROM `payments`";// The Sum gives the total of the selected column .
$result_2 = mysqli_query($con, $query_2);
$data_2 = mysqli_fetch_assoc($result_2);
$TotalPayments = $data_2['TotalPayments'];

// Third Query gives me the total of courses using the Count function
$query_3 = "SELECT COUNT(id) AS 'TotalCourses' FROM `course`";
$result_3 = mysqli_query($con, $query_3);
$data_3 = mysqli_fetch_assoc($result_3);
$TotalCourses = $data_3['TotalCourses'];

if (!$result_1 || !$result_2 || !$result_3) {

    die(mysqli_error($con));
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="page dashboard for see number of Users and Students course  ">
    <meta name="keywords" content=" E-classe Home learn course">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styleX.css">
    <title>Home Page</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <?php

        include 'sidebar.php';
        echo '<!-- Page Content -->
         <div id="page-content-wrapper" style="background: #FFFFFF;">';
        include 'navbar.php';
        ?>

        <main>
            <div class="container-fluid px-4">
                <div class="row g-5 my-2">
                    <div class="col-md-6 col-lg-3">
                        <div class=" p-3  shadow-sm rounded" style="background-color: #F0F9FF;">
                            <div>
                                <i class="bi bi-mortarboard fs-1 text-info"></i>
                                <p class="fs-5 mt-2 text-secondary">Students</p>
                                <div class="d-flex justify-content-end">
                                    <h3 class="fs-2 fw-5 "><?php echo  $TotalStudents; ?></h3>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class=" p-3  shadow-sm rounded" style="background-color: #FEF6FB;">
                            <div>
                                <i class="bi bi-bookmark fs-1  p-3 " style="color: #EE95C5;"></i>
                                <p class="fs-5 mt-2 text-secondary">Course</p>
                                <div class="d-flex justify-content-end">
                                    <h3 class="fs-2 fw-5 "><?php echo $TotalCourses; ?></h3>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class=" p-3 shadow-sm rounded payments-c" style="background-color: #FEFBEC;">
                            <div>
                                <i class="bi bi-wallet fs-1  p-3 text-info "></i>
                                <p class="fs-5 mt-2 text-secondary">Payments</p>
                                <div class="d-flex justify-content-end">
                                    <div class="d-flex align-items-center">
                                        <h3 class=" me-1 price h6">DHS</h3>
                                        <h3 class="fs-2 fw-5 price1 h5"><?php echo $TotalPayments; ?></h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class=" p-3 shadow-sm rounded" style=" background: linear-gradient(110.42deg, #00C1FE 18.27%, #FAFFC1 91.84%);">
                            <div>
                                <i class="bi bi-person fs-1  p-3 text-white "></i>
                                <p class="fs-5 mt-2 text-secondary">Users</p>
                                <div class="d-flex justify-content-end">
                                    <h3 class="fs-2 fw-5 ">3</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </main>
    </div>




    </div>
    <script src="js/E-classe-Project.js">

    </script>
    <script src="js/toogleSide.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>