<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
        <?php
    include"Db.php";

    if(!isset($_SESSION['email']))
    {
        echo "<script>location.href='login.php'</script>";
    }
    ?>
<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../js/all.js"></script>
<!--slogan-->
<div class="container-fluid">
    <div class="row bg-dark text-white text-center">
        <div class="col-sm-12 col-lg-12 col-md-12">
       Edit and add things here
   </div>
    </div>
</div>
<!--logo-->
<div class="container">
    <div class="row text-center">
        <div class="col-sm-12 col-lg-12 col-md-12">
     <h1>Admin</h1>
        </div>
    </div>
</div>
<!--navbar-->

<div class="container">
    <div class="row text-center">
        
<div class="col-sm-3 col-md-3 col-lg-3">

        </div>
        <div class="col-sm-9 col-lg-9 col-md-9">
        <nav class="navbar text-center navbar-light navbar-expand-sm">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarLinks">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarLinks">
            <ul class="navbar-nav main-navigation">
            <li class="nav-item">
            <nav class="navbar">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#search">
<i class="fas fa-search fa-1x">
    </i>
            </button>
            <div class="collapse navbar-collapse-left" id="search">
            <input type="text" class="form-control">
            <button class="navbar-toggler" type="submit" data-target="#search">
<i class="fas fa-search fa-1x">
    </i>
        </div>
</nav>
</li>
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                            <a href="gallery.php" class="nav-link">Gallery</a>
                        </li>
                        
                    <li class="nav-item">
                            <a href="blog.php" class="nav-link">Stories</a>
                        </li>
                        <li class="nav-item">
                                <a href="about.php" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="test.php" class="nav-link">Testmonials</a>
                            </li>
                            <li class="nav-item">
                                    <a href="contact.php" class="nav-link">contact</a>
                                </li>
                </ul>
            </div>
        </nav>
        </div>
    </div>
</div>
<hr>
</body>
</html>