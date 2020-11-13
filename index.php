<!-- Login Php -->
<?php
include "init.php";
// Login
if(isset($_SESSION['id'])){
    header('location:home.php');
}

if(isset($_POST['login'])){
    $data = [
        'email' => $_POST['lemail'],
        'password' =>$_POST['lpass'],
        'email_error' => '',
        'password_error' =>''
    ];

    if(empty($data['email'])){
        $data['email_error'] = "Email is required";
    }
    if(empty($data['password'])){
        $data['password_error'] = "Password is required";
    }

    if(empty($data['email_error']) && empty($data['password_error'])){
        if($source->Query("SELECT * FROM user where email = ?",[$data['email']])){
            if($source->CountRows()>0){
                $row = $source->SingleRow();
                $id = $row->id;
                $email = $row->email;
                $db_password = $row->password;
                $name = $row->name;
                if(password_verify($data['password'],$db_password)){
                    $_SESSION['login_success'] = $name;
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    header("location:home.php");
                }else{
                    $data['password_error'] = "Please enter correct password";
                }
            }else{
                $data['email_error'] = "Invalid email";
            }
        }
    }
}


// SignUp
if(isset($_POST['reg'])){
    
    $datas=[
        'name' => $_POST['sname'],
        'email' => $_POST['semail'],
        'password' => $_POST['spass'],
        'phone' => $_POST['phone'],
        'name_error' => '',
        'email_error' => '',
        'password_error' => '',
        'phone_error' => '',
    ];
/* Checking validations-*/
    if(empty($datas['name'])){
        $datas['name_error'] = "*";
    }

    if(empty($datas['email'])){
        $datas['email_error'] = "*"; 
    }else{
        if($source->Query("SELECT * FROM user where email = ?",[$datas['email']])){
            if($source->CountRows()>0){
                $datas['email_error'] = "Sorry, this email already exist";
            }
        }
    }

    if(empty($datas['password'])){
        $datas['password_error'] = "*";
    }else if(strlen($datas['password'])<5){
        $datas['password_error'] = "Password is too short";
    }
    if(empty($datas['phone'])){
        $datas['phone_error'] = "*";
    }
    // else if(strlen($data['phone'])!=11){
    //     $data['phone_error'] = "Enter your valid phone number";
    // }

    // submitting form 
    if(empty($datas['name_error']) && empty($datas['email_error']) && empty($datas['password_error']) && empty($datas['phone_error'])){
        
        $password = password_hash($datas['password'],PASSWORD_DEFAULT);
        if($source->Query("INSERT INTO user (name,email,password,phone) VALUES (?,?,?,?)",
        [$datas['name'],$datas['email'],$password,$datas['phone']]
        )){
            $_SESSION['account_created'] = "Your account created successfully";
            header("location:index.php");
        }
    }else{
        $error = "Something went wrong";
    }
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
<!-- Nav Bar -->
    <div class="container-fluid">
        <div class="row bg-light">
            <h1 class="text-primary col-6 text-center"> AYOJON</h1>
            <div class="col-6 text-center ml-auto mt-2">
                <input onclick="show_login()" type="button" value="Login" class="btn btn-outline-primary mr-2" data-toggle="collapse" data-target="#login">

                <input type="button" value="Register" class="btn btn-outline-primary mr-5"
                data-toggle="collapse" data-target="#signup">
            </div>
        </div>
    </div>



<!-- Login Registration -->
<form action="" method="POST" enctype="multipart/form-data">
     <div id="login" class="form-group collapse">
        <div class="row">
            <input type="email" name="lemail" placeholder="Email" class="form-control col-3">
            <input type="password" name="lpass" placeholder="Password" class="form-control col-3">
        </div>

        <input type="submit" name="login" value="Login" class="btn form-control col-2   btn-outline-info">
     </div>


    

     <div id="signup" class="form-group collapse" >
        <input type="text" name="sname" placeholder="Name" class="form-control b-inline w-25 d-inline">
        <?php if(!empty($datas['password_error'])){echo $datas['name_error'];} ?><br>

        <input type="email" name="semail" placeholder="Email" class="form-control b-inline w-25 d-inline">
        <?php if(!empty($datas['password_error'])){echo $datas['email_error'];} ?><br>

        <input type="password" name="spass" placeholder="Password" class="form-control b-inline w-25 d-inline">
        <?php if(!empty($datas['password_error'])){echo $datas['password_error'];} ?><br>
        
        <input type="phone" name="phone" placeholder="Phone" class="form-control b-inline w-25 d-inline">
        <?php if(!empty($datas['password_error'])){echo $datas['phone_error'];} ?><br>

        <input type="submit" name="reg" value="Register" class="btn form-control b-inline w-25  btn-outline-info ">
     </div>
     
</form>


<!-- mid image -->
    <div class="carousel-inner">
			<div class="carousel-item active">
				<img src="assets/img/fontbg1.jpg" class="">
				<div class="carousel-caption">
					<h1 class="display-2 text-warning">WE PROVIDE</h1>
					<h3 class="text-warning">SOLUTION FOR YOUR EVENT'S!</h3>
                    <input onclick="show_login()" type="button" value="Get Started" class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#login">
				</div>
			</div> 
    </div>
<!-- connect -->
<div class="container-fluid padding mt-5">
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
				<p>Monday: 9am - 1pm</p>
				<p>Saturday: 2pm - 5pm</p>
				<p>Sunday: Closed</p>
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h5>Service Area</h5>
				<hr class="light">
				<p>City, State, 000000</p>
				<p>City, State, 000000</p>
				<p>City, State, 000000</p>
				<p>City, State, 000000</p>
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