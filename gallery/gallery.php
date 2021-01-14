<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Gallery</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navStyle.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="../css/font.css">

</head>

<body>
    <div class="container">
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
                            <a class="nav-link" href="../Login/Login.php"><button id='signin' class="sign-up" style="background: silver;">Sign in</button></a>
                        </li>
                        <li class="active">
                            <a class="nav-link" href="../signUp/signup.php"><button id='signup' class="sign-up">Sign Up</button></a>
                        </li>
                    </div>


                </ul>

            </div>
        </nav>

    </div>

    </div>

    <div class="wrapper ">
        <div class="filter ">
            <h1> </h1>

            <div class="filter-types">
                <form action="#" >
                    <div class="brand">
                        <label for="Select">Brand</label>
                        <select name="brand" id="Select-brand">
<option value=""></option>
                        </select>
                    </div>


                    <div id="price">
                        <label for="">Price</label>
                        <div class="fromto">

                            <input type="number" name="from" id="from" min="4000">
                            <label for="to">to</label>
                            <input type="number" name="to" id="to" min="0" max="1000000">
                        </div>
                    </div>
                    <div class="color">
                        <label>Color :</label>
                        <select name="color" id="color">
                        <option value=""></option>

                        </select>
                    </div>

                    <div class='button-section'>
                        <button class='filter-button' onclick="filter()" type="button">Filter</button>

                    </div>
                </form>
            </div>
        </div>


        <div class="container">
            <div class="card-columns" style="margin-top: 7rem;">

            </div>
        </div>




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="gallery.js"></script>
        <script src="../mainPage.js"></script>
        <script src="../ser.js"></script>
</body>

</html>