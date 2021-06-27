<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>login</title>
</head>
<body>

<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../js/all.js"></script>
 <style>
        .ma{
            margin-top : 150px;
        }
    </style>
        <div class="container ma">
        <div class="row">
            <div class="col-md-6 my-3">
                <div class="card card-body bg-dark">
                    <div class="card-title text-center text-white">
                        <h4 class="text-capitalize bg-primary">
                              Admin login
                              </h4>

                    </div>
                    <form name="myform" method="post" action="login.php" enctype="multipart/form-data">
    <label class="text-white display-6" for="usr">Email:</label>
    <div class="form-group mt-2"><input type="email" class="form-control form-control-sm" placeholder="phone"  name="email"></div>
    <label class="text-white display-6" for="usr">password:</label>
    <div class="form-group mt-2"><input type="password" class="form-control form-control-sm" placeholder="password" name="pass"></div>
    <div class="form-group mt-2 d"><input type="submit" class="btn bg-danger text-white float-right" name="submit" value="login"></div>
    <?php
     include"Db.php";
$email=isset($_POST['email'])? $_POST['email']:null;
$pass=isset($_POST['pass'])? $_POST['pass']:null;
if ($pass==null&&$email==null) {
	echo" ";
}
else{
$sql=mysqli_query($conn,"select * from admin where email='$email' and password='$pass'");
$r=mysqli_fetch_assoc($sql);
if($r!=0)
{
		$_SESSION['email'] = $email;
		echo"<script>window.alert('Welcome ".$r['name']."')</script>";
        $_SESSION['email'] = $email;
		echo "<script>location.href='index.php'</script>";
	}
	else{
		echo"<script>window.alert('incorrect password and phone number')</script>";
		echo "<script>location.href='login.php'</script>";
	}
}
		?>
</form>
</body>
</html>