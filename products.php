<?php
//start session
session_start();
require_once('./php/CreateDb.php');
require_once('./php/component.php');
//Create a Database Class
$database = new CreateDb("LeafDatabase", "LeafTable");

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('The product is already added in the cart!')</script>";
            echo "<script>window.location = 'products.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'quantity' => $_POST['quantity']);
            $_SESSION['cart'][$count] = $item_array;
        }
    }else{
        $item_array = array(
                'product_id' => $_POST['product_id'],
                'quantity' => $_POST['quantity']
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
        //pre_r($_SESSION);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <link rel="stylesheet" href="css/custom.css" id="site-colour">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Exquisite Foliage</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="corp">

    <!--  *** TOPBAR ***  -->
    <nav class="navbar navbar-expand-lg navigation bar sticky-top">
        <div class="container top-container">
            <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="logo" id="my-logo"></a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <a class="nav-item nav-link " href="index.php">Home<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active" href="products.php">Products</a>
                    <a class="nav-item nav-link" href="about.php">About</a>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <div id="sign-in-text">
                        <p id="sign-in-display">Not signed in</p>
                    </div>
                    <div id="navbar-buttons"></div>
                    <div id="sign-in"><button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" 
                    data-target="#exampleModal" id="main-login-button">Log in</button></div>
                    <div id="basket-overview"><a href="cart.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart">
                    </i><span> Shopping cart 
                    <?php
                    if(isset($_SESSION['cart'])){
                        $count=count($_SESSION['cart']);
                        echo "<span id=\"cart_count\" class=\"text-warning\">$count</span>";
                    } else {
                        echo "<span id=\"cart_count\" class=\"text-warning\">0</span>";
                    }
                    ?>
                    </span></a></div>
                    <button type="button" class="btn btn-primary navbar-btn" id="change-colour-button" onclick="changeTheme('green')">Change Theme</button>
                </form>
            </div>
        </div>
     </nav>
    <!-- *** TOP BAR END ***-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Customer login</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="login-form" method="post" action="index.php" name="loginForm">
                                    <div class="form-group">
                                        <input id="InputEmail" type="text" placeholder="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input id="InputPassword" type="password" placeholder="password" class="form-control">
                                    </div>
                                    <div class="form-group d-flex justify-content-center">
                                        <input type="submit" value="Login" onclick="validate(); return false;" class="btn login_btn" id="modal-login-button">
                                    </div>
                                    <p class="text-center" id="login-message"></p>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reloadPage()" id="modal-close-button">Close</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <img src="img/leaf-pattern.jpg" class="leaf-pattern">
                            </div>
                        </div>
                    </div>
                </div>
    <!-- *** MODAL END ***-->


    <!-- *** PRODUCT HEADER BOX ***-->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 product-header-box">
                <img src="img/small-leaf-left.png" class="small-leaf">
                <h2 class="product-header">Products</h2>
                <img src="img/small-leaf-right.png" class="small-leaf">
            </div>
        </div>
    </div>
    <!-- *** PRODUCT HEADER BOX END *** -->

    <!-- *** PRODUCT BOX *** -->
    <?php
    $result = $database->getData();
    while($row = mysqli_fetch_assoc($result)){
        component($row['product_name'], $row['product_image'], $row['product_price'], $row['id']);
    }
    ?>
    </br>
    <!-- *** PRODUCT BOX END ***-->
    

    <!-- *** FOOTER ***-->
    <div id="footer">
        <div class="container">
            <div class="row footer-content">
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-2 mt-2">Pages</h4>
                    <hr style="background-color: white; opacity: 0.3;">
                    <ul class="list-unstyled">
                        <li><a href="about.php">About us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-2 mt-2">User section</h4>
                    <hr style="background-color: white; opacity: 0.3;">
                    <ul class="list-unstyled">
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal" id="login-footer">Login</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="mb-2 mt-2">Stay in touch</h4>
                    <hr style="background-color: white; opacity: 0.3;">
                    <ul class="list-unstyled">
                        <p class="social"><a href="#" class="facebook external"><i class="fa fa-facebook"></i></a><a href="#" class="twitter external"><i class="fa fa-twitter"></i></a><a href="#" class="instagram external"><i class="fa fa-instagram"></i></a><a href="#"
                                class="gplus external"><i class="fa fa-google-plus"></i></a><a href="#" class="email external"><i class="fa fa-envelope"></i></a></p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- *** FOOTER END ***-->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
    <script src="js/colourTheme.js"></script>
    


</body>

</html>