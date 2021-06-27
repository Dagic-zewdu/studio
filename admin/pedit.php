<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
</head>
<body>
	<?php
	include"menu.php";
$id=$_GET['id'];
$edit=mysqli_query($conn,"select * from gallery where id='$id' ");
	$return=mysqli_fetch_assoc($edit);
	$protocol=((!empty($server['HTTPS'])&& $_SERVER['HTTPS']!='off')||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
    $url=$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	?>
	<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-4">
				<div class="card text-center">
					<img src="../gphoto/<?php echo $return['name']; ?>" height="250" alt="" class="card-img-top">
					<button data-toggle="collapse" data-target="#Del"  class="btn btn-outline-danger text-uppercase">
			<i class="fa fa-trash text-center"></i>	
			</button>
			<div class="collapse" id="Del">
				<form  method="post" action="<?php echo $url; ?>">
				Are you sure you want to Delete this photo
				<input type="submit" name="dx" class="float-right text-center btn bg-danger text-white" value="Delete" >
				<?php
				if(isset($_POST['dx']))
				{
$a6=$return['name'];
$aa1="../gphoto/$a6";
unlink($aa1);
$cha=mysqli_query($conn,"delete from gallery WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='gallery.php'</script>";
}
else{
echo "<script>window.alert('Delete failed')</script>";	
}
				}
?>
</form>
			</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-5">
			<div class="card">
			 	<h4 class="text-center">privacy : <?php echo $return['privacy']; ?></h4>
			 	<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#buy">Change </button>
<div class="collapse" id="buy">
<p>
    <form action="<?php echo $url ?>" method="post">
    	<select name="name" id="" class="form-control">
							<option value="public">public</option>
							<option value="private">private</option>
						</select>
						<input type="submit" name="d" class="btn bg-danger text-white float-right" value="Change">
    	<?php
    	if(isset($_POST['d'])){
$slogan=isset($_POST['name'])? $_POST['name']:null;
$change=mysqli_query($conn,"update gallery set privacy='$slogan' WHERE id='$id'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			 </div> 
			 <div class="card my-3">
			 	<h4 class="text-center">Show on homepage : <?php echo $return['home']; ?></h4>
			 	<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#bu">Change </button>
<div class="collapse" id="bu">
<p>
    <form action="<?php echo $url ?>" method="post">
						<select name="show" id="" class="form-control">
							<option value="show">show</option>
							<option value="Dont">Don't show</option>
						</select>
						<input type="submit" name="da" class="btn bg-danger text-white float-right" value="Change">
    	<?php
    	if(isset($_POST['da'])){
$slogan=isset($_POST['show'])? $_POST['show']:null;
$change=mysqli_query($conn,"update gallery set home='$slogan' WHERE id='$id'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}}

    	?>
    </form>
</p>
</div>
			 </div>
			 <div class="card my-3">
			 	<?php
$b=$return['blog'];
if ($b==0) {
	?>
	<p class="text-center text-uppercase">
     	Blog attached id : None
     </p>
  <?php }
else{
     	?>
     <p class="text-center text-uppercase">
     	Blog attached id : <?php echo " ".$return['blog']; } ?>
     </p>

			 	<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#bua">Change </button>
<div class="collapse" id="bua">
<p>
    <form action="<?php echo $url ?>" method="post">
								<select name="blog" class="form-control">
							<option value="0">none</option>
			<?php
$sql=mysqli_query($conn,"select id from blog");
if($sql!=0){
	while($r=mysqli_fetch_assoc($sql))
	{
	echo"<option>".$r['id']."</option";
	echo "</select>";
}}
?>

						<input type="submit" name="dag" class="btn bg-danger text-white float-right" value="Change">
    	<?php
    	if(isset($_POST['dag'])){
$slogan=isset($_POST['blog'])? $_POST['blog']:null;
$change=mysqli_query($conn,"update gallery set blog='$slogan' WHERE id='$id'");
if($change!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='$url'</script>";
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
	<div class="col-md-12 col-lg-3">
		<form action="<?php echo $url ?>" method="post">
			<div class="card text-center">
				<h4> <i class="fab fa-facebook fa-1x text-primary"></i> facebook link:</h4>
			<br>
    	<input type="text" class="form-control" name="fb" value="<?php echo $return['fb']; ?>">
			</div>
			<div class="card text-center my-2">
				<h4> <i class="fab fa-twitter fa-1x text-primary"></i> twitter link:</h4>
			<br>
    	<input type="text" class="form-control" name="twitter" value="<?php echo $return['twitter']; ?>">
			</div>
			<div class="card text-center mb-2">
				<h4> <i class="fab fa-telegram fa-1x text-primary"></i> telegram link:</h4>
			<br>
    	<input type="text" class="form-control" name="tele" value="<?php echo $return['telegram']; ?>">
			</div>
			<div class="card text-center my-2">
				<h4> <i class="fab fa-instagram fa-1x text-danger"></i> instagram link:</h4>
			<br>
    	<input type="text" class="form-control" name="insta" value="<?php echo $return['instagram']; ?>">
			<input type="submit" name="dagic" value="change" class="btn bg-primary text-white my-2 d-block float-right">
			<?php
if(isset($_POST['dagic'])){
$fb=isset($_POST['fb'])? $_POST['fb']:null;
$twitter=isset($_POST['twitter'])? $_POST['twitter']:null;
$tele=isset($_POST['tele'])? $_POST['tele']:null;
$insta=isset($_POST['insta'])? $_POST['insta']:null;
$insert=mysqli_query($conn,"update gallery set fb='$fb' ,twitter='$twitter' ,telegram='$tele' ,instagram='$insta' where id='$id' ");
	if($insert!=0){
		echo "<script>window.alert('Update successfull')</script>";
echo "<script>location.href='$url'</script>";
	}
	else{
		echo "<script>window.alert('update failed try again later')</script>";
	}
}?>
		</form>
			</div>
		</div>
	</div>
</div>
<?php 
include"footer.php";
?>
</body>
</html>