<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>contacts</title>
</head>
<body>
	<?php
	include "menu.php";
$q=mysqli_query($conn,"select * from contact where id='1' ");
$ans=mysqli_fetch_assoc($q);
$sql=mysqli_query($conn,"select * from customer order by day DESC");

	?>
	<h2 class="text-center text-uppercase py-3">contact links</h2>
<div class="container">
	<div class="row text-center">
		<div class="col-sm-3 col-md-3 col-lg-3">
			<div class="card">
			<h4> <i class="fab fa-google fa-1x text-danger"></i> gmail link:</h4><?php echo $ans['gmail']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#fab">Change </button>
<div class="collapse" id="fab">
<p>
    <form action="contact.php" method="post">
    	<input type="text" class="form-control" name="fb" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$fb=isset($_POST['fb'])? $_POST['fb']:null;
if($fb==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update contact set gmail='$fb' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='contact.php'</script>";
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
			<h4> <i class="fab fa-whatsapp fa-1x text-primary"></i> Whatsapp link:</h4><?php echo $ans['whatsup']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#twit">Change </button>
<div class="collapse" id="twit">
<p>
    <form action="contact.php" method="post">
    	<input type="text" class="form-control" name="twitter" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$twitter=isset($_POST['twitter'])? $_POST['twitter']:null;
if($twitter==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update contact set whatsup='$twitter' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='contact.php'</script>";
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
			<h4> <i class="fab fa-viber fa-1x text-primary"></i> viber link:</h4><?php echo $ans['viber']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#tel">Change </button>
<div class="collapse" id="tel">
<p>
    <form action="contact.php" method="post">
    	<input type="text" class="form-control" name="tele" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$telegram=isset($_POST['tele'])? $_POST['tele']:null;
if($telegram==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update contact set viber='$telegram' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='contact.php'</script>";
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
			<h4> <i class="fab fa-facebook-messenger fa-1x text-info"></i> Messenger link:</h4><?php echo $ans['messenger']; ?>
			<br>
			<button class="btn btn-outline-secondary text-center text-uppercase" data-toggle="collapse" data-target="#in">Change </button>
<div class="collapse" id="in">
<p>
    <form action="contact.php" method="post">
    	<input type="text" class="form-control" name="insta" value="http://">
    	<input type="submit" class="d-block btn btn-outline-secondary text-uppercase" value="change">
    	<?php
$instagram=isset($_POST['insta'])? $_POST['insta']:null;
if($instagram==null){
	echo" ";
}
else{
$change=mysqli_query($conn,"update contact set messenger='$instagram' WHERE id='1'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='contact.php'</script>";
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
<h4 class="text-center py-3">All customer that you should contact</h4>
<div class="container">
	<div class="row">
		<?php
while ($s=mysqli_fetch_assoc($sql)) {
		?>
		<div class="col-md-12 col-lg-12 text-center">
			Name : <?php echo $s['name'];?> <br>
			city : <?php echo $s['city']; ?><br>
            ceremony: <?php echo$s['type']; ?> <br>
            Budget: <?php echo $s['budget']; ?> <br>
            Phone or email: <?php echo $s['phone']; ?> <br>
            <hr color="lightgray">
	<?php } ?>
	</div>
</div>
</div>
<?php 
include"footer.php";
?>
</body>
</html>