<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: http://localhost//CarRentingWebSite/index.html');

    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>edit profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/editProfile.css">    <link rel="stylesheet" href="../css/navStyle.css">

</head>

<body>
<div class="container" style="margin-bottom: 7rem;">
        <nav class="navbar  fixed-top navbar-expand-lg navbar-light bg-white  ">
            <a class="navbar-brand " id="logo" href="#"><strong>Company name</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <div class="bar-item">
                        <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Home </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                    </div>
                    <div class="sign">

                        <li class="active">
                            <form method="POST" action='../api/logout.php'>
                            <a class="nav-link" href="#"><button id='signup'class="sign-up">Logout</button></a>

                            </form>
                        </li>
                    </div>


                </ul>

            </div>
        </nav>

    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->

                <div class="wizard">
                    <nav class="list-group list-group-flush">
                        <a class="list-group-item " href="clientProfile.php">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class=" fe-icon-shopping-bag mr-1 text-muted"></i>
                                    <div class=" d-inline-block font-weight-medium text-uppercase">My Profile</div>
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item " href="editClientProfile.php">Profile Settings</a>


                    </nav>
                </div>
            </div>
            <!-- Profile Settings-->
            <div class="col-lg-8 pb-5">
                <div class="row info ">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_ID-fn">ID</label>
                            <input class="form-control" type="text" name="customer_ID-fn" value="${customer_ID}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input class="form-control" type="text" name="fullName" value="${fullName}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="license">License</label>
                            <input class="form-control" type="text" name="license" value=${license} disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="license">Rating</label>
                            <input class="form-control" type="text" name="rating" value=${rate} disabled>
                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input class="form-control" type="number" min=18 max=120 name="age" id="age" value=${age} disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="text" name="email" id="email" value=${email} disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input class="form-control" type="text" name="phone" id="phone" value=${phone} disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="register_date">Register Date</label>
                            <input class="form-control" type="text" name="register_date" value="${register_date}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status_to_show">Status</label>
                            <input class="form-control" type="text" name="status_to_show" value="${status_to_show}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <input class="form-control" type="text" name="payment_method" value=${payment_method} disabled>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="tabels"></div>
    <table class="table" style="background-color: white ;display:block; margin:0 auto; width :65%">
        <tr>
            <th>Customer ID</th>
            <th>Full Name </th>
            <th>car ID </th>
            <th>Manufacturer </th>
            <th>Model </th>
            <th>Deal Type </th>
            <th>Start Date </th>
            <th>End Date </th>
            <th>Deal Cost </th>
            <th>Deal Status </th>
        </tr>


    </table>

    <div class="nodata" style=" overflow:hidden; margin:0 auto;">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="js/clientprofile.js"></script>
</body>
</script>
</body>

</html>