<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>car Profile</title>
    <link rel="stylesheet" href="css/navStyle.css">
    <link rel="stylesheet" href="css/carProfile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
                        <li class="nav-item active">
                            <a class="nav-link" href="Login/Login.html">sign in</a>
                        </li>
                        <li class="active">
                            <a class="nav-link" href="signUp/signup.html"><button class="sign-up">Sign Up</button></a>
                        </li>
                    </div>


                </ul>

            </div>
        </nav>

    </div>





    <div class="wrapper">
        <div class="left">
            <div id="carprofile" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active role">
                        <img class="d-block w-100" src="img/zan-1BWBiUUT-AA-unsplash.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/zan-1BWBiUUT-AA-unsplash.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/zan-1BWBiUUT-AA-unsplash.jpg" alt="First slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carprofile" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carprofile" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>




        <div class="right">
            <h1> <i></i> Car manifacturer</h1>
            <h2>Car model</h2>
            <h3>Car price</h3>
            <h4>Discount</h4>
            <h2>total</h2>
            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nisi, quo quasi, repudiandae quisquam dolore a recusandae sequi error neque accusantium esse explicabo enim debitis provident officiis, dicta rem iste! </p>
            <div class="color">
                <span>green</span>
                <span>yellow</span>
                <span>red</span>
                <span>white</span>
            </div>

            <div class="buttons">
                <button class="buy">Buy</button>
                <button class="rent">Rent</button>
            </div>
        </div>

    </div>

    <main>
        <section class="relatedsec">
            <div class="related-header">
                <h3>Related</h3>
            </div>

            <div id="related" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-deck a w-75 ">
                            <div class="card ">
                                <img class="card-img-top" src="img/zan-1BWBiUUT-AA-unsplash.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="img/zan-1BWBiUUT-AA-unsplash.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                            <div class="card">
                                <img class="card-img-top" src="img/zan-1BWBiUUT-AA-unsplash.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <a class="carousel-control-prev" href="#related" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#related" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="">

        <!-- Footer Elements -->
        <div class="container">

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fab fa-facebook-f"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1">
                        <i class="fab fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1">
                        <i class="fab fa-google-plus-g"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-li mx-1">
                        <i class="fab fa-linkedin-in"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-dribbble mx-1">
                        <i class="fab fa-dribbble"> </i>
                    </a>
                </li>
            </ul>
            <!-- Social buttons -->

        </div>
        <!-- Footer Elements -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href=""> Company</a>
        </div>
        <!-- Copyright -->


        <!-- Footer -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>