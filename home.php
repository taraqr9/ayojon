<?php 
    include "init.php";

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
    if(isset($_POST['getstart'])){
        header("location:createevent.php");
    }
    if(isset($_POST['viewevent'])){
        header("location:viewevent.php");
    }
    if(empty($_SESSION['login_success'])){
        header("location:index.php");
    }
?>

<html>
    <head>
        <title>Home</title>
        <meta name="viewpost" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/home.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    </head>
    </head>
    <body>
<!-- navbar -->
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

                    <!-- <input type="submit" value="Logout" name="logout" class="btn btn-outline-primary mr-2"> -->
                    <a href="logout.php" class="btn btn-outline-primary mr-2">Logout</a>
                 </form>
                
            </div>
        </div>
    </div>

    <!-- mid image -->
    <div class="carousel-inner">
			<div class="carousel-item active">
				<img src="assets/img/fontbg1.jpg" class="">
				<div class="carousel-caption">
					<h1 class="display-2 text-warning">WE PROVIDE</h1>
					<h3 class="text-warning">SOLUTION FOR YOUR EVENT'S!</h3>
					
                        <a href="createevent.php"><input type="submit" name="getstart" value="Get Started" class="btn btn-primary btn-lg"></a>
				</div>
			</div> 
    </div>
<!-- connect -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Connect</h2>
		</div>
		<div class="col-12 social padding">
			<a href="#" ><i class="fab fa-facebook"></i></a>
			<a href="#" ><i class="fab fa-twitter"></i></a>
			<a href="#"><i class="fab fa-google-plus-g"></i></a>
			<a href="#"><i class="fab fa-instagram"></i></a>
			<a href="#"><i class="fab fa-youtube"></i></a>
		</div>
	</div>
</div>
<!--- Footer -->
<footer class="bg-dark text-light pt-4">
	<div class="conatainer-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<h1>AYOJON</h1>
				<hr class="light">
				<p>444-444-444</p>
				<p>ayojon@gmail.com</p>
				<p>Mirpur, Dhaka, Bangladesh</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Our Hours</h5>
				<hr class="light">
				<p>Everyday</p>
				<p>At : 10AM - 10PM</p>
				<p>NOpen Everyday Only For Our Customers</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Service Area</h5>
				<hr class="light">
				<p>Every Where Inside Dhaka</p>
			</div>

			<div class="col-12">
				<hr class="light-100">
				<h5>&copy; Thank you For Visit</h5>
			</div>
		</div>
	</div>
</footer>
    </body>
</html>