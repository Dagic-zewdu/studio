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
$query=mysqli_query($conn,"select * from review where id='$id'");
$u=mysqli_fetch_assoc($query);
$protocol=((!empty($server['HTTPS'])&& $_SERVER['HTTPS']!='off')||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
    $url=$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="card">
				<h4 class="text-center">from</h4>
					<form action="<?php echo $url; ?>" method="post">
				<input type="text" class="form-control" value="<?php echo $u['ps']; ?>" name="title">
					</div>
					<input type="submit" class="btn bg-dark text-white text-uppercase" value="change" placeholder="upload photo"  name="kit">
    	<?php
    	if(isset($_POST['kit'])){
    		$logo=isset($_POST['title'])? $_POST['title']:null;
if($logo==null){
	echo"";
}
else{
$cha=mysqli_query($conn,"update review set ps='$logo' WHERE id='$id'");
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

<button data-toggle="collapse" data-target="#Del"  class="btn btn-outline-danger text-uppercase">
			<i class="fa fa-trash text-center"></i>	
			</button>
			<div class="collapse" id="Del">
				<form  method="post" action="<?php echo $url; ?>">
				Are you sure you want to Delete the whole testmony
				<input type="submit" name="dx" class="float-right text-center btn bg-danger text-white" value="Delete" >
				<?php
				if(isset($_POST['dx']))
				{
$cha=mysqli_query($conn,"delete from review WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='test.php'</script>";
}
else{
echo "<script>window.alert('Delete failed')</script>";	
}
				}
?>
</form>
			</div>
			</div>
			<div class="col-md-12 col-lg-6">
					<div class="card">
					<h4 class="text-center">About Description</h4>
					<form action="<?php echo $url; ?>" method="post">
					<textarea name="Describe" id=""cols="80" rows="15" class="form-control">
						<?php echo $u['description']; ?>
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
$cha=mysqli_query($conn,"update review set description='$logo' WHERE id='$id'");
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
			 	<h4 class="text-center">privacy : <?php echo $u['privacy']; ?></h4>
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
$change=mysqli_query($conn,"update review set privacy='$slogan' WHERE id='$id'");
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
	<?php
include"footer.php";
	?>
</body>
</html>