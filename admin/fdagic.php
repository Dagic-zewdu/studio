<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../js/all.js"></script>
	<?php 
include"Db.php";
	?>
	<style>
		.ma{
			margin-top : 150px;
		}
	</style>
	<div class="container ma">
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				welcome to admin session you need to  register first before we proceed
			</div>
			<div class="col-sm-6 col-md-16 col-lg-6 ">
				<div class="card">
					<form action="fdagic.php" method="post">
   <p class="text-white text-uppercase bg-dark text-center">
   	Admin Signup
   </p>
   Name
   <input type="text" class="form-control" placeholder="Name" name="name">
   Email
   <input type="email" class="form-control" placeholder="Email" name="email">
   phone
   <input type="text" class="form-control" placeholder="+2519" name="phone">
   password
   <input type="password" class="form-control" placeholder="phone" name="password">						
   <input type="Submit" class="d-block btn btn-outline-dark float-right" name="submit">
   <?php

$name=isset($_POST['name'])? $_POST['name']:null;
$phone=isset($_POST['phone'])? $_POST['phone']:null;
$email=isset($_POST['email'])? $_POST['email']:null;
$pass=isset($_POST['password'])? $_POST['password']:null;
if(isset($_POST['submit'])){
	if($name==null){
  echo"<font=red>";
  echo" "."</font>";
}

elseif($phone==null){
  echo"<font=red>missing phone number</font>";
}
elseif($email==null){
  echo"<font=red>";
  echo"missing Email "."</font>";
}
elseif($pass==null){
  echo"<font=red>missing password</font>";
}
else{
	$sql=mysqli_query($conn,"insert into admin(name,email,phone,password)values('$name','$email','$phone','$pass')");
if ($sql!=0) {
  $_SESSION['email'] = $email;
  echo"<script>window.alert('Welcome ".$name."')</script>";
  $_SESSION['email'] = $email;
echo "<script>location.href='index.php'</script>";
$_SESSION['email'] = $email;

}
else{
	echo"<font color=red>There is previously registered Customer with the same phone or email</font>";
}
}

}
   ?>
</form>
				</div>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3"></div>
		</div>
	</div>
</body>
</html>