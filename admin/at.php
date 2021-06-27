<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit equipments</title>
</head>
<body>
	<?php
	include"menu.php";
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from about where id='$id' ");
$r=mysqli_fetch_assoc($query);
$protocol=((!empty($server['HTTPS'])&& $_SERVER['HTTPS']!='off')||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
    $url=$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	 ?>
	 <div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-6 col-lg-3">
	 			<div class="card">
	 				<img src="../aphoto/<?php echo $r['photo']; ?>" alt="" class="card-img-top">
	 				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#logo">Change </button>
<div class="collapse" id="logo">
<p>

<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="logo">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="sudit">
    	<?php
    	if(isset($_POST['sudit'])){
  $logo=$_FILES['logo']['name'];
if($logo==null){
	echo"";
}
else{

$a1=$r['photo'];
$aa1="../aphoto/$a1";
unlink($aa1);
$cha=mysqli_query($conn,"update about set photo='$logo' WHERE id='$id'");
move_uploaded_file($_FILES['logo']['tmp_name'], "../aphoto/$logo");
if($cha!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
}}
?>
    </form>
</p>
</div>
<button data-toggle="collapse" data-target="#Del"  class="btn btn-outline-danger text-uppercase">
			<i class="fa fa-trash text-center"></i>	
			</button>
			<div class="collapse" id="Del">
				<form  method="post" action="<?php echo $url; ?>">
				Are you sure you want to Delete the whole blog
				<input type="submit" name="dx" class="float-right text-center btn bg-danger text-white" value="Delete" >
				<?php
				if(isset($_POST['dx']))
				{
$a6=$r['photo'];
$aa1="../aphoto/$a6";
unlink($aa1);
$cha=mysqli_query($conn,"delete from about WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='about.php'</script>";
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
	 		<div class="col-md-6 col-lg-6">
	 			<div class="card">
					<h4 class="text-center">Equipment name</h4>
					<form action="<?php echo $url; ?>" method="post">
				<input type="text" class="form-control" value="<?php echo $r['title']; ?>" name="title">
					</div>
					<input type="submit" class="btn bg-dark text-white text-uppercase" value="change" placeholder="upload photo"  name="kit">
    	<?php
    	if(isset($_POST['kit'])){
    		$logo=isset($_POST['title'])? $_POST['title']:null;
if($logo==null){
	echo"";
}
else{
$cha=mysqli_query($conn,"update about set title='$logo' WHERE id='$id'");
if($cha!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
}}
?>
</form>	
	 		<div class="card">
					<h4 class="text-center">About Description</h4>
					<form action="<?php echo $url; ?>" method="post">
					<textarea name="Describe" id=""cols="80" rows="15" class="form-control">
						<?php echo $r['Description']; ?>
					</textarea>
					</div>
					<input type="submit" class="btn bg-dark text-white text-uppercase" value="change" placeholder="upload photo"  name="sit">
    	<?php
    	if(isset($_POST['sit'])){
    		$logo=isset($_POST['Describe'])? $_POST['Describe']:null;
if($logo==null){
	echo"";
}
else{
$cha=mysqli_query($conn,"update about set Description='$logo' WHERE id='$id'");
if($cha!=0){
	echo "<script>window.alert('update successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('update failed')</script>";	
}
}}
?>
</form>	
	 		</div>
	 		<div class="col-md-6 col-lg-3">
	 			<div class="card">
			 	<h4 class="text-center">privacy : <?php echo $r['privacy']; ?></h4>
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
$change=mysqli_query($conn,"update about set privacy='$slogan' WHERE id='$id'");
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
$b=$r['blog'];
if ($b==0) {
	?>
	<p class="text-center text-uppercase">
     	Blog attached id : None
     </p>
  <?php }
else{
     	?>
     <p class="text-center text-uppercase">
     	Blog attached id : <?php echo " ".$r['blog']; } ?>
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
$change=mysqli_query($conn,"update about set blog='$slogan' WHERE id='$id'");
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
	 	</div>
	 </div>
		<?php
include"footer.php";
?>
</body>
</html>