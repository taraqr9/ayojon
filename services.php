<?php 
    include "init.php"; 
    if(empty($_SESSION['login_success'])){
        header("location:index.php");
    }
    if(isset($_POST['home'])){
        header("location:home.php");
    }
    if(isset($_POST['createevent'])){
        header("location:createevent.php");
    }
    if(isset($_POST['services'])){
        header("location:services.php");
    }
    if(isset($_POST['aboutus'])){
        header("location:aboutus.php");
    }
    if(isset($_POST['viewevent'])){
        header("location:viewevent.php");
      }
?>


<html>
<head>
    <title>Home</title>
    <meta name="viewpost" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/createevent.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body>

</body>
<body>
    <div class="container-fluid sticky-top">
        <div class="row bg-light">
            <h1 class="text-primary col-6 text-center"> AYOJON</h1>
            <div class="col-6 text-center ml-auto mt-2">
                
                <form action="" method="POST">
                    <input type="submit" value="Home" name="home" class="btn btn-outline-primary mr-2">

                    <input type="submit" value="Create Event" name="createevent" class="btn btn-outline-primary mr-2">

                    <input type="submit" value="View Event" name="viewevent" class="btn btn-outline-primary mr-2">

                    <input type="submit" value="Services" name="services" class="btn btn-outline-primary mr-2">

                    <input type="submit" value="About Us" name="aboutus" class="btn btn-outline-primary mr-2">
                    <a href="logout.php" class="btn btn-outline-primary mr-2">Logout</a>
                    </form>
            </div>
        </div>
    </div>
    <div class = "content container"><!--body content holder-->
        <div class = "container">
            <div class = "col-md-12"><!--body content title holder with 12 grid columns-->
                <h1>What we organize</h1><!--body content title-->
            </div>
        </div>
        
        <div class="container">
        <div class="col-md-12">
        <hr>
        </div>
        </div>
        
        <div class="row"><!--wedding content-->
            <section>
                <div class="container">
                    <div class="col-md-6"><!--image holder with 6 grid columns-->
                        <img src="assets/img/wedding2.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6"><!--Text holder with 6 column grid-->
                        <h1>Wedding</h1><!--title-->
                        <p><!--content-->
                        The most important day in a couple's life.
                        Guaranteeing personalized solutions and flawless execution, our venues provide the perfect
                        location for your special day.
                        </p>
                        <hr class="customline"><!--css modified horizontal line-->
                        <button type="button" class="btn btn-default btn-lg"><!--view event button (no function implemented)-->
                        View Events  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><!--arrow right glyphicon-->
                        </button>
                    </div><!--subcontent div-->
                </div><!--container div-->
            </section>
        </div><!--row div-->
        
        <div class="container">
        <div class="col-md-12">
        <hr>
        </div>
        </div>

        <div class="row">
            <section>
                <div class="container">
                    <div class="col-md-6"><!--image holder with 6 grid columns-->
                        <img src="assets/img/birthday2.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6"><!--Text holder with 6 column grid-->
                        <h1>Birthday</h1><!--title-->
                        <p><!--content-->
                        Whether an all-day or the ultimate extravaganza that
                        lasts well into the wee hours, our Urban Events team is here to make sure all your birthday
                        party wishes come true so you can kick back, drink up and enjoy your special day!
                        </p>
                        <hr class="customline"><!--css modified horizontal line-->
                        <button type="button" class="btn btn-default btn-lg"><!--view event button (no function implemented)-->
                        View Events  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><!--arrow right glyphicon-->
                        </button>
                    </div><!--subcontent div-->
                </div><!--container div-->
            </section>
        </div><!--row div-->
        
        <div class="container">
        <div class="col-md-12">
        <hr>
        </div>
        </div>

        <div class="row">
            <section>
                <div class="container">
                    <div class="col-md-6"><!--image holder with 6 grid columns-->
                        <img src="assets/img/fashion2.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6"><!--Text holder with 6 column grid-->
                        <h1>Fashion</h1><!--title-->
                        <p><!--content-->
                        Fast becoming to go-to location for fashion events, PR gatherings and product launches, 
                        The Urban Purveyor Group venues provide you with choice and quality in premium locations 
                        for all your event needs.
                        </p>
                        <hr class="customline"><!--css modified horizontal line-->
                        <button type="button" class="btn btn-default btn-lg"><!--view event button (no function implemented)-->
                        View Events  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><!--arrow right glyphicon-->
                        </button> 
                    </div><!--subcontent div-->
                </div><!--container div-->
            </section>
        </div><!--row div-->
        
        <div class="container">
        <div class="col-md-12">
            <hr>
        </div>
        </div>

        <div class="row">
            <section>
                <div class="container">
                    <div class="col-md-6"><!--image holder with 6 grid columns-->
                        <img src="assets/img/meeting2.jpg" class="img-responsive">
                    </div>
                    <div class="subcontent col-md-6"><!--Text holder with 6 column grid-->
                        <h1>Meeting</h1><!--title-->
                        <p><!--content-->
                        From formal, to not-so-formal, our flexible event
                        spaces can cater to your every need for meetings and conferences large or small, and our
                        dedicated event team can assist with all aspects of your event planning.
                        </p>
                        <hr class="customline"><!--css modified horizontal line-->
                        <button type="button" class="btn btn-default btn-lg"><!--view event button (no function implemented)-->
                        View Events  <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span><!--arrow right glyphicon--> 
                        </button> 
                    </div><!--subcontent div-->
                </div><!--container div-->
            </section>
        </div><!--row div-->
    </div><!--body content div-->
    <footer>
        <div class="bg-secondary h-25">
            <h1 class="ayojon text-light text-center mt-5">AYOJON</h1>
        </div>
    </footer>
</body>
</html>