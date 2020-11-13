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
if(isset($_POST['contact'])){
  header("location:aboutus.php");
}
if(isset($_POST['getstart'])){
  header("location:createevent.php");
}
if(isset($_POST['viewevent'])){
  header("location:viewevent.php");
}
?>










<html>

<head>
  <title>Create Event</title>
  <meta name="viewpost" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/createevent.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>

<body>
  <!-- Navbar -->
  <div class="container-fluid sticky-top">
    <div class="row bg-light">
      <h1 class="text-primary col-6 text-center"> AYOJON</h1>
      <div class="col-6 text-center ml-auto mt-2">

        <form action="" method="POST">
          <input type="submit" value="Home" name="home" class="btn btn-outline-primary mr-2">

          <input type="submit" value="Create Event" name="createevent" class="btn btn-outline-primary mr-2">

          <input type="submit" value="View Event" name="viewevent" class="btn btn-outline-primary mr-2">

          <input type="submit" value="Services" name="services" class="btn btn-outline-primary mr-2">

          <input type="submit" value="About Us" name="contact" class="btn btn-outline-primary mr-2">
          <a href="logout.php" class="btn btn-outline-primary mr-2">Logout</a>
        </form>
      </div>
    </div>
  </div>
  <div class="conainer text-success">
    <?php if(!empty($_SESSION['delete'])){
      echo $_SESSION['delete'];
    $_SESSION['delete'] = "";
    } ?>
  </div>
  <!-- view events -->
  <div class="container-fluid">
    <div class="container">
      <table class="table table-hover">
        <thead>
          <tr>
          
            <th class="col-1">Title</th>
            <th class="col-1">Date To</th>
            <th class="col-1">Date Form</th>
            <th class="col-1">Time To</th>
            <th class="col-1">Time Form</th>
            <th class="col-1">Decoration</th>
            <th class="col-1">Chair</th>
            <th class="col-1">Food</th>
            <th class="col-1">Food Platter</th>
            <th class="col-1">Address</th>
            <th class="col-1">Mobile</th>
            <th class="col-1">Email</th>
            <th class="col-1">Approval</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = $source->Query("SELECT * FROM event where uid = ?", [$_SESSION['id']]);
            $details = $source->FetchAll();
            $numrow = $source->CountRows();
            if($numrow>0){
              foreach($details as $row):
                
            if($row->approval==='Pending'){
              $app = "<a href='delete.php?delete=".$row->id."' class='btn btn-outline-dark mt-2'> Delete</a>";
              $approval_text="class = text-warning";
            }else{
              $app = "";
              $approval_text="class = text-success text-uppercase";
            }


                echo "
                <tr>
                
                <td>".$row->title."</td>
                <td>".$row->dateto."</td>
                <td>".$row->dateform."</td>
                <td>".$row->timeto."</td>
                <td>".$row->timeform."</td>
                <td>".$row->decoration."</td>
                <td>".$row->chair."</td>
                <td>".$row->food."</td>
                <td>".$row->foodplatter."</td>
                <td>".$row->address."</td>
                <td>".$row->mobile."</td>
                <td>".$row->email."</td>
                <td ".$approval_text.">".$row->approval."</td>
                <td>".$app." </td>
                </tr>";

              endforeach;
              
            }   
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>