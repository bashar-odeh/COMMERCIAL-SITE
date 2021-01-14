<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Sign car</title>

    <!-- Icons font CSS-->
    <link rel="stylesheet" href="../css/font.css">

    <!-- Font special for pages-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/navStyle.css">
    <!--Boot strap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>

<body>



    <nav class="navbar  fixed navbar-expand-lg navbar-light bg-white ">
        <a class="navbar-brand " id="logo" href="#"><strong>Company name</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">

                <div class="bar-item">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                </div>

                <div class="sign">
                    <?php
                    if (isset($_SESSION["id"]) && !isset($_SESSION['admin'])) {

                        echo ' <li class="active">
                               <a class="nav-link" href="../clientProfile/clientProfile.php"><button class="sign-up">Profile</button></a>
                               </li>';
                    } else  if (isset($_SESSION['admin'])) {
                        echo  ' <li class="active">
                                                     <a class="nav-link" href="../clientProfile/adminProfile.php"><button class="sign-up">Admin Profile </button></a>
                                 </li>';
                    } else {

                        echo '<li class="active">
                       <a class="nav-link" href="../Login/Login.php"><button class="sign-up">Sign In</button></a>
                   </li>';
                    }
                    ?>
                </div>


            </ul>

        </div>
    </nav>



    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Customer ID" name="customer_ID" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Full Name" name="full_name" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="License" name="license" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Age" name="age" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="phone" name="phone" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="E-mail" name="email" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="password" name="password" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="confirm password" name="confirm" required>
                            <span style="color:red; " id='equal'></span>

                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Payment Method" name="payment" required>
                        </div>
                        <?php
                        if (isset($_SESSION['admin'])) {
                            echo '
                            <div style="padding : 1rem" class="row row-space">
    
                                <div class="col-2">
                                    <select  name ="rating"style="padding-left:5px ;" name="Gender" id="Select">
                                       
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    
    
                                    </select>
                                </div>
                            </div>';
                        }

                        ?>

                        <div class="p-t-20 " style="padding : 1rem ; width :100% ;">
                            <button class="sign-up" style="width :100%;" type="submit" id='ajax'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <script src="js/sendForm.js"></script>
    <script src="../ser.js"></script>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->