<?php
session_start();
if (!isset($_SESSION['admin'])) {
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
    <link rel="stylesheet" href="css/editProfile.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="../css/navStyle.css">

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
                                <a class="nav-link" href="#"><button id='signup' class="sign-up">Logout</button></a>

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
                        <a class="list-group-item " href="adminProfile.php">
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
                            <input class="form-control" type="text" name="customer_ID" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input class="form-control" type="text" name="fullName" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="license">License</label>
                            <input class="form-control" type="text" name="license" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input class="form-control" type="text" name="rating" disabled>
                        </div>
                    </div>




                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input class="form-control" type="number" min=18 max=120 name="age" id="age" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input class="form-control" type="text" name="email" id="email" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input class="form-control" type="text" name="phone" id="phone" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="register_date">Register Date</label>
                            <input class="form-control" type="text" name="register_date" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status_to_show">Status</label>
                            <input class="form-control" type="text" name="status_to_show" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <input class="form-control" type="text" name="payment_method" disabled>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <div class='tabels w-75' style="text-align: center ; margin-left:3%;">
        <div>
            <div style=" text-align: center;">
                <h3 style=" margin :3rem 0;text-align: center; display:flex ; flex-direction: column; justify-content: center;">All Customers</h3>
                <select name="customer" id="customer">
                    <option value="2">All</option>
                    <option value="1">Active</option>
                    <option value="0">Blocked</option>

                </select>
                <div class='update-info'>
                    <div>
                        <button class="btn btn-danger active btn-sm text-justify d-flex flex-row justify-content-end align-items-end align-content-end align-self-end flex-wrap ml-auto" type="button" style="margin-right: 7px;margin-top: 4px;">X</button>
                        <h2 class="d-flex justify-content-center">Update</h2>
                        <div class="row no-gutters d-flex justify-content-center align-content-center flex-wrap">
                            <form action="" method='' class="">
                                <div class="col d-flex justify-content-center group">
                                    <div class="form-group" style="margin: 1rem;"><label>Customer ID:</label><input type="text" name='customer_ID' style="margin: 0;"></div>
                                    <div class="form-group" style="margin: 1rem;"><label>Full Name:</label><input name='full_name' type="text"></div>
                                </div>

                                <div class="col d-flex justify-content-center group">
                                    <div class="form-group" style="margin: 1rem;"><label>License:</label><input name='license' type="text"></div>
                                    <div class="form-group" style="margin: 1rem;"><label>Age:<br></label><input name='age' type="text"></div>
                                </div>
                                <div class="col d-flex justify-content-center group">
                                    <div class="form-group" style="margin: 1rem;"><label>Phone:</label> <input name='phone' type="text"></div>
                                    <div class="form-group" style="margin: 1rem;"><label>E-mail:</label><input name='email' type="text"> </div>
                                </div>
                                <div class="col d-flex justify-content-center group">
                                    <div class="form-group" style="margin: 1rem;"><label>Rating:</label> <input name='ratimg' type="text"></div>
                                    <div class="form-group" style="margin: 1rem;"><label>Payment :</label><input name='paymetn_method' type="text"> </div>
                                </div>

                        </div>
                        <div class="d-flex justify-content-center"><button class="btn btn-success get" onclick="updateCustomerData(this)" type="button" style="margin-top: 1rem;color: var(--light);font-size: 18px;text-align: center;opacity: 1;filter: brightness(112%) saturate(97%);">Update Profile</button></div>
                        </form>
                        <form action="" method="POST" class=''>

                            <div class="row">
                                <div class="col d-flex justify-content-center group" style="margin: 0 1rem;">
                                    <div class="form-group" style="margin: 1rem;"><label>New password :</label><input type="password" name='password'></div>
                                    <div class="form-group" style="margin: 1rem;"><label>confirm password :</label><input type="password">
                                        <span id='equal'> </span>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-center"><button class="btn btn-success" type="button" onclick=changeCustomerPassword(this) style="margin-top: 1rem;">Update Password</button></div>
                    </div>
                </div>
                </form>

                <div class='update-info-car'>
                    <button class="btn btn-danger active btn-sm text-justify d-flex flex-row justify-content-end align-items-end align-content-end align-self-end flex-wrap ml-auto" type="button" style="margin-right: 7px;margin-top: 4px;">X</button>
                    <h2 class="d-flex justify-content-center">Update Car</h2>
                    <div class="row no-gutters d-flex justify-content-center align-content-center flex-wrap">
                        <form action="" method='' class="">
                            <div class="col d-flex justify-content-center group">
                                <div class="form-group" style="margin: 1rem;"><label>Car ID:</label><input type="text" name='car_id' style="margin: 0;"></div>
                                <div class="form-group" style="margin: 1rem;"><label>Manufacturer:</label><input name='manufacturer' type="text"></div>
                            </div>

                            <div class="col d-flex justify-content-center group">
                                <div class="form-group" style="margin: 1rem;"><label>Model:</label><input name='model' type="text"></div>
                                <div class="form-group" style="margin: 1rem;"><label>status:<br></label><input name='status' type="text" disabled></div>
                            </div>
                            <div class="col d-flex justify-content-center group">
                                <div class="form-group" style="margin: 1rem; display: flex; flex-direction: column;"><label>Dealing:</label><input name='dealing-type' type="text" disabled> </div>
                                <div class="form-group" style="margin: 1rem; display: flex; flex-direction: column;"><label>Cost:</label><input name='cost' type="text"> </div>

                            </div>

                            <div class="form-group" style="margin: 1rem; display: flex; flex-direction: column;"><label>Rating:</label> <select name="rating" id="rating">
                                    <option value="0">Common</option>
                                    <option value="1">Rare</option>
                                    <option value="2">Epic</option>
                                    <option value="3">Most wanted</option>
                                </select> </div>


                            <div class="col d-flex justify-content-center group">
                                <textarea name="description" id="Description" cols="30" rows="3">Description</textarea>
                            </div>

                    </div>
                    <div class="d-flex justify-content-center"><button class="btn btn-success" type="button" onclick=updateCarData(this) style="margin-top: 1rem;">Update Car</button></div>
                    </form>
                </div>
            </div>

            <div style="color:aqua; padding: 2rem;">
                <a href="../signUp/signup.php">Add a new customer</a>
            </div>
            <table class="table table-striped table-responsive-md btn-table customer-table">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Full Name </th>
                        <th>License </th>
                        <th>Age </th>
                        <th>Phone </th>
                        <th>E-mail </th>
                        <th>Rating</th>
                        <th>Payment Method </th>
                        <th>Registed Date </th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>block</th>
                        <th>Admin</th>

                    </tr>
                </thead>
                <tbody>
                </tbody>

            </table>


            <div class="nodata" style=" overflow:hidden; margin:0 auto;">

            </div>
        </div>
        <div>
            <div style="display: block; text-align: center;">
                <h3 style=" margin :3rem 0;text-align: center; display:flex ; flex-direction: column; justify-content: center;">All cars</h3>

                <select name="car-select" id="car-select">

                    <option value="1"> All</option>
                    <option value="0"> Disabled</option>
                    <option value="6"> All Avilable</option>
                    <option value="2"> Available for Sell</option>
                    <option value="3"> Available for Rent</option>
                    <option value="4"> Taken as Rent</option>
                    <option value="5"> Taken as as Sell</option>

                </select>
            </div>
            <div style="color:aqua; padding: 2rem;">
                <a href="../signcar/signCar.php">Add a new Car</a>
            </div>
            <table class="table table-striped table-responsive-md btn-table">
                <thead>
                    <tr>
                        <th>car ID</th>
                        <th>Manufacturer </th>
                        <th>Model</th>
                        <th>status </th>
                        <th>Dealing type</th>
                        <th>Cost $</th>
                        <th>Rating </th>
                        <th style="display: none;">Descrption</th>
                        <th>Update</th>
                        <th>delete</th>
                        <th>Toggle dealing</th>
                        <th>Disable</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <div class="nodata" style=" overflow:hidden; margin:0 auto;">

            </div>
        </div>
        <div>
            <div style="display: block; text-align: center;">
                <h3 style=" margin :3rem 0;text-align: center; display:flex ; flex-direction: column; justify-content: center;">All Deals</h3>
                <select name="" id="">
                    <option value="2">All</option>
                    <option value="1">Active</option>
                    <option value="0">Ended</option>

                </select>
            </div>
            <table class="table table-striped table-responsive-md btn-table">
                <thead>
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
                        <th>update</th>
                        <th>Delete</th>
                    </tr>

                </thead>

            </table>

            <div class="nodata" style=" overflow:hidden; margin:0 auto;">

            </div>
        </div>
    </div>

    <script src="js/adminProfile.js"></script>
    <script src="js/clientprofile.js"></script>
    <script src="../ser.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>
</script>
</body>

</html>