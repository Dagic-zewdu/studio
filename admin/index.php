<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home edit</title>
</head>
<body>
	<?php 
include"menu.php";
		$query=mysqli_query($conn,"select * from home where id='1'");
		$ans=mysqli_fetch_assoc($query);
	?>
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="card">
			<h4>Slogan of the site:
			</h4>
			<?php echo $ans['slogan'];?>
			<br>
			<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#buy">Change </button>
<div class="collapse" id="buy">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="name">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change">
    	<?php
$slogan=isset($_POST['name'])? $_POST['name']:null;
if($slogan==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set slogan='$slogan' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
				<h4>Title of the site:
			</h4>
			<?php echo $ans['title'];?>
			<br>
			<button class="btn btn-outline-dark text-uppercase" data-toggle="collapse" data-target="#title">Change </button>
<div class="collapse" id="title">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="title">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change">
    	<?php
$title=isset($_POST['title'])? $_POST['title']:null;
if($title==null){
	echo" ";
}
else{
$chang=mysqli_query($conn,"update home set title='$title' WHERE id='1'");
if($chang!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>	
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-6 col lg-6">
			<div class="card">
		<h4>Decsription</h4><br>
		<p>
			<?php
echo $ans['description'];
			?>
			<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#describe">Change </button>
		</p>

<div class="collapse" id="describe">
<form action="index.php" method="post">	
<textarea class="form-control" name="describe" rows="10" cols="30">
		<?php
echo $ans['description'];
			?>
</textarea>
<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change">
<?php
$describe=isset($_POST['describe'])? $_POST['describe']:null;
if($describe==null){
	echo" ";
}
else{
$chan=mysqli_query($conn,"update home set description='$describe' WHERE id='1'");
if($chan!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}
?>
</form>
</div>	
			</div>
		</div>
	</div>
</div>
<!--photos-->
	<h1 class="text-center">Photos</h1>
	<!--logo-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4">
			<h3>logo image:</h3>
			<div class="card">
			<img src="../Homephoto/<?php echo $ans['photo1'] ?>" alt="" class="card-img-top" height="250">
	<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#logo">Change </button>
<div class="collapse" id="logo">
<p>

<form name="myform" method="post" action="index.php" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="logo">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="sumit">
    	<?php
    	if(isset($_POST['sumit'])){
  $logo=$_FILES['logo']['name'];
if($logo==null){
	echo"";
}
else{

$a1=$ans['photo1'];
$aa1="../Homephoto/$a1";
unlink($aa1);
$cha=mysqli_query($conn,"update home set photo1='$logo' WHERE id='1'");
move_uploaded_file($_FILES['logo']['tmp_name'], "../Homephoto/$logo");
if($cha!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
}}
?>
    </form>
</p>
</div>
			</div>
			</div>
			<!--Background iamges-->
			<div class="col-sm-4 col-md-4 col-lg-4">
			<h3>Back ground image:</h3>
			<div class="card">
			<img src="../Homephoto/<?php echo $ans['photo2'] ?>" alt="" class="card-img-top" height="250">
	<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#bgi">Change </button>
<div class="collapse" id="bgi">
<p>

<form name="myform" method="post" action="index.php" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="bgc">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="bg">
    	<?php
    	if(isset($_POST['bg'])){
  $bgc=$_FILES['bgc']['name'];
if($bgc==null){
	echo"";
}
else{

$a1=$ans['photo2'];
$aa1="../Homephoto/$a1";
unlink($aa1);
$cha=mysqli_query($conn,"update home set photo2='$bgc' WHERE id='1'");
move_uploaded_file($_FILES['bgc']['tmp_name'], "../Homephoto/$bgc");
if($cha!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
}}
?>
    </form>
</p>
</div>
			</div>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4">
				<div class="card text-center ">
					<h4 class="text-uppercase py-2">font</h4>
					current font:- <?php echo $ans['font']; ?>
					<form action="index.php" method="post">
					<select name="font" id="">
						<option value="roboto" class="form-control">Roboto condensed+ Roboto slab</option>
							<option value="open" class="form-control">open sans</option>
						<option value="mont" class="form-control">montserrat</option>
						<option value="lato" class="form-control">Lato</option>
						<option value="metal" class="form-control">Metal</option>
						<option value="Kurale" class="form-control">Kurale</option>
					</select>
<input type="submit" class="btn btn-outline-dark text-uppercase" value="change" name="f">
    	<?php
    	if (isset($_POST['f'])) {
$font=isset($_POST['font'])? $_POST['font']:null;

$chang=mysqli_query($conn,"update home set font='$font' WHERE id='1'");
if($chang!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
	}
    	?>
</form>
				</div>
			</div>
		</div>
	</div>
	<!--links-->
<h2 class="text-center text-uppercase py-3">General social media links</h2>
<div class="container">
	<div class="row text-center">
		<div class="col-sm-3 col-md-3 col-lg-3">
			<div class="card">
			<h4> <i class="fab fa-facebook fa-1x text-primary"></i> facebook link:</h4><?php echo $ans['fb']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#fab">Change </button>
<div class="collapse" id="fab">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="fb" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$fb=isset($_POST['fb'])? $_POST['fb']:null;
if($fb==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set fb='$fb' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-2">
			<div class="card">
			<h4> <i class="fab fa-twitter fa-1x text-primary"></i> twitter link:</h4><?php echo $ans['twitter']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#twit">Change </button>
<div class="collapse" id="twit">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="twitter" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$twitter=isset($_POST['twitter'])? $_POST['twitter']:null;
if($twitter==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set twitter='$twitter' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-2">
			<div class="card">
			<h4> <i class="fab fa-telegram fa-1x text-primary"></i> Telegram link:</h4><?php echo $ans['telegram']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#tel">Change </button>
<div class="collapse" id="tel">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="tele" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$telegram=isset($_POST['tele'])? $_POST['tele']:null;
if($telegram==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set telegram='$telegram' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			</div>
		</div>
			<div class="col-sm-3 col-md-3 col-lg-2">
			<div class="card">
			<h4> <i class="fab fa-instagram fa-1x text-danger"></i> Instagram link:</h4><?php echo $ans['instagram']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#in">Change </button>
<div class="collapse" id="in">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="insta" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$instagram=isset($_POST['insta'])? $_POST['insta']:null;
if($instagram==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set instagram='$instagram' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3">
			<div class="card">
			<h4> <i class="fab fa-youtube fa-1x text-danger"></i> youtube:</h4><?php echo $ans['youtube']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#y">Change </button>
<div class="collapse" id="y">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="you" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$you=isset($_POST['you'])? $_POST['you']:null;
if($you==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set youtube='$you' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			</div>
		</div>
	</div>
</div>
<!--Adress-->
<h2 class="text-center py-3">Adresses</h2>
<div class="container">
	<div class="row">
		<div class="col-sm-3 col-md-6 col-lg-4">
			<div class="card text-center">
				<h4 class="text-center">phone 1 <i class="fa fa-phone fa-1x text-warning"></i></h4><?php echo $ans['phone1'];?>
				<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#ph">Change </button>
<div class="collapse" id="ph">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="phon" value="+2519">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$phon=isset($_POST['phon'])? $_POST['phon']:null;
if($phon==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set phone1='$phon' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-6 col-lg-4">
			<div class="card text-center">
				<h4 class="text-center">phone 2 <i class="fa fa-phone fa-1x text-danger"></i></h4><?php echo $ans['phone2'];?>
				<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#ph2">Change </button>
<div class="collapse" id="ph2">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="phon2" value="+2519">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$phon2=isset($_POST['phon2'])? $_POST['phon2']:null;
if($phon2==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set phone2='$phon2' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-6 col-lg-4">
			<div class="card text-center">
				<h4 class="text-center">office <i class="fas fa-building fa-1x text-secondary"></i></h4><?php echo $ans['office'];?>
				<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#off">Change </button>
<div class="collapse" id="off">
<p>
    <form action="index.php" method="post">
    	<input type="text" class="form-control" name="office">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$office=isset($_POST['office'])? $_POST['office']:null;
if($office==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update home set office='$office' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='index.php'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}
    	?>
    </form>
</p>
</div>
			</div>
		</div>
	</div>
</div>
<?php
include "footer.php";
?>
</body>
</html>