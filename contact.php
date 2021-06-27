<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact</title>
</head>

	<?php
include"menu.php";
$sql=mysqli_query($conn,"select * from contact where id='1' ");
$f=mysqli_fetch_assoc($sql);
	?>
	<script>
		var a="c";
	</script>
<body onload="changecolor(a)">
	<h6 class="text-center text-uppercse da pb-3">
		Tell me about you
	</h6>
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-md-12 col-lg-7 text-center">
				<div class="card">
<form action="contact.php" method="post" onsubmit="handlesubmit(this)">
				<p class="text-uppercase">
					hi, my name is
				</p>
				<p>
					<input type="text" class="form-control" placeholder="name" name="name">
				</p>
				<p class="text-uppercase">
					i am from
				</p>
				<p><input type="text" class="form-control" placeholder="city" name="city"></p>
				<p class="text-uppercase">i am planning</p>
				<p><input type="text" class="form-control" placeholder="ceremony type" name="type"></p>
								<p class="text-uppercase">with budget for phothography</p>
				<p><input type="number" class="form-control" min="100" placeholder="4000" name="money" value="4000"></p>
			<p class="text-uppercase">
				OK,give your number number or Email
			</p>
   <p><input type="text" class="form-control" placeholder="Email or phone" name="phone"></p>
   <button class="btn bg-warning text-white d-block float-right" type="submit" name="sy" >submit </button>
   <?php
if (isset($_POST['sy'])) {

$name=isset($_POST['name'])? $_POST['name']:null;
$city=isset($_POST['city'])? $_POST['city']:null;
$type=isset($_POST['type'])? $_POST['type']:null;
$money=isset($_POST['money'])? $_POST['money']:null;
$phone=isset($_POST['phone'])? $_POST['phone']:null;
if ($name==null) {
	# code...
	echo "<font color=red>please tell me your name </font>";
}
elseif ($city==null) {
	# code...
	echo "<font color=red>please tell me your city </font>";
}
elseif ($type==null) {
	# code...
	echo "<font color=red>please tell me what type of ceremony you planned </font>";
}
elseif ($phone==null) {
	# code...
	echo "<font color=red>please give me your phone or email </font>";
}
else{
	$insert=mysqli_query($conn,"insert into customer(name,city,type,budget,phone) values ('$name','$city','$type','$money','$phone')");
	if($insert!=0){
		echo "<script>window.alert('Thank you for being friend i will contact you soon')</script>";
echo "<script>location.href='contact.php'</script>";
	}
	else{
			 echo "Error: " . $insert . "<br>" . $conn->error;
	}
}
}
   ?>
   </form>
			</div>
			</div>
		</div>
	</div>
	<h4 class="text-center text-uppercase my-3"> Or contact me</h4>
	<div class="container">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-md-12 col-lg-7 text-center justify-content-around">
				<a href="<?php echo $f['gmail']; ?>"><i class="fab fa-google fa-2x text-danger my-2"></i> Gmail </a><br>
				<a href="<?php echo $f['whatsup']; ?>"><i class="fab fa-whatsapp fa-2x text-success my-2"></i> Whatsapp</a><br>
				<a href="<?php echo $f['messenger']?>"><i class="fab fa-facebook-messenger fa-2x text-primary my-2"></i> Messenger</a><br>
				<a href="<?php echo $f['viber']; ?>"><i class="fab fa-viber fa-2x text-primary my-2"></i>Viber</a>
			</div>
		</div>
	</div>
	<script>
		function handlesubmit(e){
			e.preventDefault();
		}
	</script>
	<?php
include"footer.php";
	?>
</body>
</html>