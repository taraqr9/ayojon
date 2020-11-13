<?php include "init.php"; 
if(empty($_SESSION['login_success'])){
    header("location:index.php");
}
?>
<?php
if (isset($_POST['home'])) {
    header("location:home.php");
}
if (isset($_POST['createevent'])) {
    header("location:createevent.php");
}
if (isset($_POST['services'])) {
    header("location:services.php");
}
if (isset($_POST['contact'])) {
    header("location:aboutus.php");
}

if(isset($_POST['viewevent'])){
    header("location:viewevent.php");
}

// Order Now
if (isset($_POST['order'])) {
    $approval = "Pending";
    $data = [
        'title' => $_POST['title'],
        'dateto' => $_POST['dateto'],
        'dateform' => $_POST['dateform'],
        'timeto' => $_POST['timeto'],
        'timeform' => $_POST['timeform'],
        'address' => $_POST['caddress'],
        'phone' => $_POST['cphone'],
        'email' => $_POST['cemail'],
        'platters' => $_POST['platters'],
        'approval' => 'Pending',
        'title_error' => '',
        'date_error' => '',
        'time_error' => '',
        'chair_error' => '',
        'platters_error' => '',
        'phone_error' => '',
        'address_error' => '',
        'email_error' => ''
    ];
    // entertainment
    if (!empty($_POST['ent'])) {
        $ent = $_POST['ent'];
        $entt = "";
        foreach ($ent as $en) {
            $entt .= $en . ",";
        }
    }

    // food
    if (!empty($_POST['food'])) {
        $food = $_POST['food'];
        $food1 = "";
        foreach ($food as $fo) {
            $food1 .= $fo . ",";
        }
    }

    /* ------------------------------------Checking validations-------------------------- */
    if (empty($data['title'])) {
        $data['title_error'] = "Enter Title";
    }
    if (empty($data['dateto'])) {
        $data['date_error'] = "Enter date please";
    }
    if (empty($data['dateform'])) {
        $data['date_error'] = "Enter date please";
    }
    if (empty($data['timeto'])) {
        $data['time_error'] = "Enter Time please";
    }
    if (empty($data['timeform'])) {
        $data['time_error'] = "Enter Time please";
    }

    if (!empty($_POST['chair']) && empty($_POST['nochair']) || empty($_POST['chair']) && !empty($_POST['nochair'])) {
        $data['chair_error'] = " Please Enter the number of chair you need.";
    }
    if (!empty($_POST['food']) && empty($_POST['platters']) || empty($_POST['food']) && !empty($_POST['platters'])) {
        $data['platters_error'] = " Please mark the food box or enter the number of platters you need.";
    }

    if (empty($data['phone'])) {
        $data['phone_error'] = "Please enter your phone number";
    } else if (strlen($data['phone']) != 11) {
        $data['phone_error'] = "Enter your valid phone number";
    }

    if (empty($data['address'])) {
        $data['address_error'] = "Enter your address";
    }
    if (empty($data['email'])) {
        $data['email_error'] = "Your Email id please";
    }


    if (!empty($_POST['ent'])) {
        foreach ($_POST['ent'] as $ent) {
            // value
        }
    }
    if (!empty($_POST['food'])) {
        foreach ($_POST['food'] as $food) {
            // value
        }
    }


    /* --------------------------------------------submitting form -----------------------------*/
    if (
        empty($data['title_error']) && empty($data['date_error']) && empty($data['time_error'])
        && empty($data['chair_error']) && empty($data['platters_error']) && empty($data['phone_error']) && empty($data['address_error']) && empty($data['email_error'])
    ) {

        if (empty($food1) && !empty($_POST['chair']) && !empty($_POST['ent'])) {
            if ($source->Query(
                "INSERT INTO event (uid,title,dateto,dateform,timeto,timeform,decoration,chair,address,mobile,email,approval) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)",
                [$_SESSION['id'], $data['title'], $data['dateto'], $data['dateform'], $data['timeto'], $data['timeform'], $entt, $_POST['nochair'], $data['address'], $data['phone'], $data['email'],$approval]
            )) {
                $created = " Event Created Success fully ";
            } else {
                $error = "Something went wrong";
            }

        } else if (!empty($food1) && empty($_POST['chair']) && !empty($_POST['ent'])) {
            if ($source->Query(
                "INSERT INTO event (uid,title,dateto,dateform,timeto,timeform,decoration,food,foodplatter,address,mobile,email,approval) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",
                [$_SESSION['id'], $data['title'], $data['dateto'], $data['dateform'], $data['timeto'], $data['timeform'], $entt, $food1, $_POST['platters'], $data['address'], $data['phone'], $data['email'],$approval]
            )) {
                $created = " Event Created Success fully ";
            }else {
                $error = "Something went wrong";
            }

        }else if (!empty($food1) && !empty($_POST['chair'] && empty($_POST['ent']))) {
            if ($source->Query(
                "INSERT INTO event (uid,title,dateto,dateform,timeto,timeform,chair,food,foodplatter,address,mobile,email,approval) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)",
                [$_SESSION['id'], $data['title'], $data['dateto'], $data['dateform'], $data['timeto'], $data['timeform'], $_POST['nochair'], $food1, $_POST['platters'], $data['address'], $data['phone'], $data['email'],$approval]
            )) {
                $created = " Event Created Success fully ";
            }else {
                $error = "Something went wrong";
            }

        }
        else if(empty($food1) && empty($_POST['chair']) && empty($_POST['ent'])){
            if ($source->Query(
                "INSERT INTO event (uid,title,dateto,dateform,timeto,timeform,address,mobile,email,approval) VALUES (?,?,?,?,?,?,?,?,?,?)",
                [$_SESSION['id'], $data['title'], $data['dateto'], $data['dateform'], $data['timeto'], $data['timeform'],$data['address'], $data['phone'], $data['email'],$approval]
            )) {
                $created = " Event Created Success fully ";
            }else {
                $error = "Something went wrong";
            }
        }
        else {

            if ($source->Query(
                "INSERT INTO event (uid,title,dateto,dateform,timeto,timeform,decoration,chair,food,foodplatter,address,mobile,email,approval) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                [$_SESSION['id'], $data['title'], $data['dateto'], $data['dateform'], $data['timeto'], $data['timeform'], $entt, $_POST['nochair'], $food1, $_POST['platters'], $data['address'], $data['phone'], $data['email'],$approval]
            )) {
                $created = " Event Created Success fully ";
            }else {
                $error = "Something went wrong";
            }
        }
    }


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
    <div class="text-warning">
    <?php
    if (!empty($error)) {
        echo $error;
    }
    ?>
    </div>

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
    <!-- Create Event -->
    <div class="text-success">
    <?php if (!empty($created)) {
        echo $created;
    } ?>
    </div>
    <form action="" method="POST">
        <div class="text-center h-25">
            <h1 class="text-info pt-5"> Create Event</h1><br>
            <h3 class="text-secondary">Minimum Booking Amount 1000 Tk</h3>
            <hr>
        </div>
        <div class="form-group m-auto w-75 bg-light">
            <label for="title" class="h5">Title</label>
            <input type="text" class="form-control" name="title" placeholder="The event you need us to organize. Example: Birthday event">
            <div class="error"><?php if (!empty($data['title_error'])) {
                                    echo $data['title_error'];
                                } ?></div>
            <div class="row">
                <div class="col-6">
                    <h5>Date To :</h5>
                    <input type="date" name="dateto">
                </div>
                <div class="col-6">
                    <h5>Date Form :</h5>
                    <input type="date" name="dateform">
                </div>

            </div>

            <div class="error"><?php if (!empty($data['date_error'])) {
                                    echo $data['date_error'];
                                } ?></div>

            <div class="row">
                <div class="col-6">
                    <h5>Time To :</h5>
                    <input type="time" name="timeto">
                </div>
                <div class="col-6">
                    <h5>Time Form :</h5>
                    <input type="time" name="timeform">
                </div>
            </div>

            <div class="error"><?php if (!empty($data['time_error'])) {
                                    echo $data['time_error'];
                                } ?></div>
            <!-- Entertainments -->
            <h5>Entertainments : </h5>
            <hr class="bg-primary">
            <div class="entertaiment">
                <input type="checkbox" name="ent[]" value="DJ"> DJ (5000tK)<br>
                <input type="checkbox" name="ent[]" value="Sound System"> Sound System (5000tk)<br>
                <input type="checkbox" name="ent[]" value Dance> Dance ( Per song 500Tk)<br>

            </div>

            <!-- Decoration -->
            <h5>Decoration : </h5>
            <hr class="bg-primary">
            <div class="entertaiment">
                <input type="checkbox" name="ent[]" value="Light"> Light <br>
                <input type="checkbox" name="ent[]" value="Stage"> Stage <br>
                <input type="checkbox" name="ent[]" value="Flowers"> Flowers <br>
                <input type="checkbox" name="chair" value="Chair"> Chair (Per chair 30tk)
                <input type="number" name="nochair" placeholder="Number Of Chairs" class="w-25 ml-2"> <br>
                <div class="error"><?php if (!empty($data['chair_error'])) {
                                        echo $data['chair_error'];
                                    } ?></div>
                <hr class="bg-primary">
            </div>


            <!-- Food -->
            <h5>Food : </h5>
            <hr class="bg-primary">
            <h6 class="text-success"> * Select the number of platters you want and write down in the box the number of platters you want.</h6>
            <div class="entertaiment">
                <input type="checkbox" name="food[]" value="food1"> 1. Fried rice+ chicken Fry+Vegitable+Col Drinks+Water <span class="text-danger">(170tk)</span> <br>
                <input type="checkbox" name="food[]" value="food2"> 2. Muttan Teheri(Beef/Muttan)+Salad+Kabab+Firni/Jorda+Borhani+Misti+Water <span class="text-danger">(270tk)</span><br>
                <input type="checkbox" name="food[]" value="food3"> 3. Morog Polao+Salad+Kabab+Firni/Jorda+Borhani+Misti+Water <span class="text-danger">(300tk)</span><br>
                <input type="checkbox" name="food[]" value="food4"> 4. Polao+Roast+Salad+Kabab+Firni/Jorda+Borhani+Misti+Water <span class="text-danger">(500tk)</span><br>
                <input type="checkbox" name="food[]" value="food5"> 5. Polao+Beef Resala+Salad+Kabab+Firni/Jorda+Borhani+Misti+Water <span class="text-danger">(530tk)</span><br>
                <input type="checkbox" name="food[]" value="food6"> 6. Kacchi+Roast+Salad+Kabab+Firni/Jorda+Borhani+Water <span class="text-danger">(570tk)</span><br>
                <input type="checkbox" name="food[]" value="food7"> 7. Kacchi+Beef Resala+Salad+Kabab+Firni/Jorda+Borhani+Misti+Water <span class="text-danger">(620tk)</span><br>


                <input type="text" name="platters" class="form-control" placeholder="Number of food = Number of platters. Example: 1 = 10 , 2 = 15 add more if you want.">

                <div class="error">
                    <?php if (!empty($data['platters_error'])) {
                        echo $data['platters_error'];
                    } ?>
                </div>

                <hr class="bg-primary">


            </div>

            <!-- Other Details -->

            <label for="address" class="h5 mt-3">Address</label>
            <hr class="bg-primary">
            <input type="text" class="form-control" placeholder="Adress" name="caddress">
            <div class="error"><?php if (!empty($data['address_error'])) {
                                    echo $data['address_error'];
                                } ?></div>
            <label for="mobile" class="h5 mt-3">Mobile</label>
            <hr class="bg-primary">
            <input type="number" class="form-control" placeholder="Mobile Number" name="cphone">
            <div class="error"><?php if (!empty($data['phone_error'])) {
                                    echo $data['phone_error'];
                                } ?></div>
            <label for="email" class="h5 mt-3">Email</label>
            <hr class="bg-primary">
            <input type="email" class="form-control" placeholder="Email" name="cemail">
            <div class="error"><?php if (!empty($data['email_error'])) {
                                    echo $data['email_error'];
                                } ?></div>
            <div class="container-fluid text-center">
                <input type="submit" value="Order Now" class="btn btn-outline-primary mt-4 mb-4" name="order">
            </div>

        </div>
    </form>
    <!-- footer -->
    <footer>
        <div class="bg-secondary h-25">
            <h1 class="ayojon text-light text-center">AYOJON</h1>
        </div>
    </footer>
</body>

</html>