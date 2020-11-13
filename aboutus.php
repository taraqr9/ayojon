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
    if(isset($_POST['home'])){
        header("location:home.php");
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
    <title>Login</title>
    <meta name="viewpost" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/login.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
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
					<a href="logout.php" class="btn btn-outline-primary mr-2">Logout</a>
                    </form>
            </div>
        </div>
    </div>
<div class="container-fluid">
    <!-- ava -->
<div class="container padding mt-5 bg-light">
	<div class="row padding">
		<div class="col-lg-6 mt-5">
			<h2>Afia Mahmuda Ava</h2>
			<p>
			I am Afia Mahmuda Ava. 
			</p>
			<p>
			Basically, I am working on web designing and handling the database management of this site.
			</p>
			<a href="#" class="btn btn-primary">
				Learn More
			</a>
		</div>
		<div class="col-lg-6">
			<img src="assets/img/ava.jpg" class="img-fluid">
		</div>
	</div>
</div>
<!-- Taraq -->
<div class="container padding mt-5 bg-light">
	<div class="row padding">
        <div class="col-lg-6">
			<img src="assets/img/taraq.jpg" class="img-fluid w-75">
		</div>
		<div class="col-lg-6 mt-5">
			<h2>MD. Taraq Rahman</h2>
			<p>
			I am Md. Taraq Rahman.
			</p>
			<p>
			I am working on frontend and backend programmer of this site.
			</p>
			<a href="#" class="btn btn-primary">
				Learn More
			</a>
		</div>
		
	</div>
</div>
<!-- Nishu -->
<div class="container padding mt-5 bg-light">
	<div class="row padding">
		<div class="col-lg-6 mt-5">
			<h2>Farah Tasnim Nishu</h2>
			<p>
			I am Farah Tasnim Nishu. 
			</p>
			<p>
			I am working on organizing the decoration, food and data management of this site.
			</p>
			<a href="#" class="btn btn-primary">
				Learn More
			</a>
		</div>
		<div class="col-lg-6">
			<img src="assets/img/nishu.jpg " class="img-fluid w-75">
		</div>
	</div>
</div>
</div>

</body>
</html>