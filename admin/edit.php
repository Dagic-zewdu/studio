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
	$edit=mysqli_query($conn,"select * from blog where id='$id' ");
	$return=mysqli_fetch_assoc($edit);
$protocol=((!empty($server['HTTPS'])&& $_SERVER['HTTPS']!='off')||$_SERVER['SERVER_PORT']==443)?"https://":"http://";
    $url=$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	?>
	<h4 class="text-center text-uppercase">Blog id:<?php echo $return['id']; ?></h4>
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-4">
				<div class="card text-center">
					<img src="../photo/<?php echo $return['photo1']; ?>" height="250" alt="" class="card-img-top">
					<div class="bg-dark d-flex justify-content-around">
            <a href="<?php echo $return['fb']; ?>"><i class="fab fa-facebook fa-2x text-white"></i ></a>
            <a href="<?php echo $return['twitter']; ?>"><i class="fab fa-twitter fa-2x text-primary"></i></a>
            <a href="<?php echo $return['telegram']; ?>"><i class="fab fa-telegram fa-2x text-danger"></i></a>
       <a href="<?php echo $return['instagram']; ?>"><i class="fab fa-instagram fa-2x text-danger"></i></a>
        </div>
                    <h6 class="card-title text-uppercase">
                        <?php echo $return['title']; ?>
                    </h6>
                    <p class="card-text">
   <?php echo $return['highlight']; ?>
                    </p>
				</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<h4 class="text-center">
				Title
			</h4>
			<form action="<?php echo $url ?>" method="post">
			<input type="text" class="form-control" value="<?php echo $return['title'] ?>" name="title">
			<h4 class="text-center">
			Highlight of the blog	
			</h4>
			<textarea name="highlight" id="" cols="25" rows="9" class="form-control">
				<?php echo $return['highlight']; ?>
			</textarea>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-2">
			<div class="card text-center">
				<h4 class="text-center">privacy</h4>
	<?php
				 $p=$return['post'];
if($p=='public')
{
				?>
<select name="privacy" id="choose" class="form-controls py-2">
	<option value="public">public</option>
	<option value="private">private</option>
</select>
<?php }
	elseif($p=='private'){
		?>
		<select name="privacy" id="choose" class="form-controls py-2">
	<option value="private">private</option>
	<option value="public">public</option>
</select>
<?php } ?>
			</div>
			<div class="card text-center py-2">
				<h4 class="text-center">show blog on home page</h4>
				<?php $h=$return['front'];
if($h=='show'){
				?>
								<select name="showi" class="form-control py-2">
					<option value="show">Show</option>
						<option value="Dont">Don't show </option>
				</select>
			<?php } 
elseif($h=='Dont'){
			?>
							<select name="showi" class="form-control pt-3">
					<option value="Dont">Don't show</option>
					<option value="show">Show</option>		
				</select>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="container py-4">
	<div class="row">
		<div class="col-md-12 col-lg-9">
			<div class="card text-center">
				<h4 class="text-center">
					Description
				</h4>
				<textarea name="Describe" id="" cols="30" rows="30" class="form-control">
					<?php echo $return['Description']; ?>
				</textarea>
			</div>
		</div>
		<div class="col-md-12 col-lg-3">
			<div class="card text-center">
				<h4> <i class="fab fa-facebook fa-2x text-primary"></i> facebook link:</h4>
			<br>
    	<input type="text" class="form-control" name="fb" value="<?php echo $return['fb']; ?>">
			</div>
			<div class="card text-center my-2">
				<h4> <i class="fab fa-twitter fa-2x text-primary"></i> twitter link:</h4>
			<br>
    	<input type="text" class="form-control" name="twitter" value="<?php echo $return['twitter']; ?>">
			</div>
			<div class="card text-center mb-2">
				<h4> <i class="fab fa-telegram fa-2x text-primary"></i> telegram link:</h4>
			<br>
    	<input type="text" class="form-control" name="tele" value="<?php echo $return['telegram']; ?>">
			</div>
			<div class="card text-center my-2">
				<h4> <i class="fab fa-instagram fa-2x text-danger"></i> instagram link:</h4>
			<br>
    	<input type="text" class="form-control" name="insta" value="<?php echo $return['instagram']; ?>">
			
			</div>
		</div>
	</div>
</div>
<p class="text-center">
<input type="submit" class="btn py-2 px-4 bg-primary text-center text-white" value="update" name="upd">
</p>
<?php
if(isset($_POST['upd'])){
$fb=isset($_POST['fb'])? $_POST['fb']:null;
$title=isset($_POST['fb'])? $_POST['title']:null;
$high=isset($_POST['highlight'])? $_POST['highlight']:null;
$Describe=isset($_POST['Describe'])? $_POST['Describe']:null;
$privacy=isset($_POST['privacy'])? $_POST['privacy']:null;
$show=isset($_POST['showi'])? $_POST['showi']:null;
$twitter=isset($_POST['twitter'])? $_POST['twitter']:null;
$tele=isset($_POST['tele'])? $_POST['tele']:null;
$insta=isset($_POST['insta'])? $_POST['insta']:null;
if($title==null){
	echo "<script>window.alert('missing title of the blog enter carefully')</script>";
}
elseif($high==null){
	echo "<script>window.alert('missing Highlight of the blog enter carefully')</script>";
}
elseif($Describe==null){
	echo "<script>window.alert('missing Description of the blog enter carefully')</script>";
}
else{
	$insert=mysqli_query($conn,"update blog set title='$title' , highlight='$high', Description='$Describe', post='$privacy',front='$show',fb='$fb' ,twitter='$twitter' ,telegram='$tele' ,instagram='$insta' where id='$id' ");
	if($insert!=0){
		echo "<script>window.alert('Update successfull')</script>";
echo "<script>location.href='$url'</script>";
	}
	else{
		echo "<script>window.alert('update failed try again later')</script>";
	}

}
}
?>
</form>
<h2 class="text-center py-3">Media files</h2>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-lg-4">
			<div class="card text-center">
				<h4 class="text-center">Photo 1</h4>
				<img src="../photo/<?php echo $return['photo1']; ?>" alt="" height="300" class="card-img-top">
				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#p1">Change </button>
<div class="collapse" id="p1">
<p>

<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="photo1">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="bg">
    	<?php
    	if(isset($_POST['bg'])){
  $photo1=$_FILES['photo1']['name'];
if($photo1==null){
	echo"";
}
else{
	$r=$return['photo1'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo1='$photo1' WHERE id='$id' ");
move_uploaded_file($_FILES['photo1']['tmp_name'], "../photo/$photo1");
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
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="card text-center">
				<h4 class="text-center">Photo 2</h4>
				<img src="../photo/<?php echo $return['photo2']; ?>" alt="" height="300" class="card-img-top">
				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#p2">Change </button>
<div class="collapse" id="p2">
<p>

<form  method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="photo2">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="pb">
    	<?php
    	if(isset($_POST['pb'])){
  $photo2=$_FILES['photo2']['name'];
if($photo2==null){
	echo"";
}
else{
	$r=$return['photo2'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo2='$photo2' WHERE id='$id' ");
move_uploaded_file($_FILES['photo2']['tmp_name'], "../photo/$photo2");
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

<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
	<button type="submit" class="btn btn-outline-danger text-uppercase" name="x2" > 
<i class="fa fa-trash text-center"></i>
			</button>
			<?php
			  	if(isset($_POST['x2'])){
$non=" ";
$r=$return['photo2'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo2='$non' WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('Delete failed')</script>";	
}
}
?>
			</form>
			</div>
		</div>
		<div class="col-md-4 col-lg-4">
			<div class="card text-center">
				<h4 class="text-center">Photo 3</h4>
				<img src="../photo/<?php echo $return['photo3']; ?>" alt="" height="300" class="card-img-top">
				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#p3">Change </button>
<div class="collapse" id="p3">
<p>

<form  method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="photo3">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="pc">
    	<?php
    	if(isset($_POST['pc'])){
  $photo3=$_FILES['photo3']['name'];
if($photo3==null){
	echo"";
}
else{
	$r=$return['photo3'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo3='$photo3' WHERE id='$id' ");
move_uploaded_file($_FILES['photo3']['tmp_name'], "../photo/$photo3");
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

<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
	<button type="submit" class="btn btn-outline-danger text-uppercase" name="x3" > 
<i class="fa fa-trash text-center"></i>
			</button>
			<?php
			  	if(isset($_POST['x3'])){
$non=" ";
$r=$return['photo3'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo3='$non' WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('Delete failed')</script>";	
}
}
?>
			</form>
			</div>
		</div>
		<div class="col-md-4 col-lg-4 py-3">
			<div class="card text-center">
				<h4 class="text-center">Photo 4</h4>
				<img src="../photo/<?php echo $return['photo4']; ?>" alt="" height="300" class="card-img-top">
				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#p4">Change </button>
<div class="collapse" id="p4">
<p>

<form  method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="photo4">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="pd">
    	<?php
    	if(isset($_POST['pd'])){
  $photo4=$_FILES['photo4']['name'];
if($photo4==null){
	echo"";
}
else{
	$r=$return['photo4'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo4='$photo4' WHERE id='$id' ");
move_uploaded_file($_FILES['photo4']['tmp_name'], "../photo/$photo4");
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
<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
	<button type="submit" class="btn btn-outline-danger text-uppercase" name="x4" > 
<i class="fa fa-trash text-center"></i>
			</button>
			<?php
			  	if(isset($_POST['x4'])){
$non=" ";
$r=$return['photo4'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo4='$non' WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('Delete failed')</script>";	
}
}
?>
			</form>
			</div>
		</div>
			<div class="col-md-4 col-lg-4 py-3">
			<div class="card text-center">
				<h4 class="text-center">Photo 5</h4>
				<img src="../photo/<?php echo $return['photo5']; ?>" alt="" height="300" class="card-img-top">
				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#p5">Change </button>
<div class="collapse" id="p5">
<p>

<form  method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="photo5">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="pe">
    	<?php
    	if(isset($_POST['pe'])){
  $photo5=$_FILES['photo5']['name'];
if($photo5==null){
	echo"";
}
else{
	$r=$return['photo5'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo5='$photo5' WHERE id='$id' ");
move_uploaded_file($_FILES['photo5']['tmp_name'], "../photo/$photo5");
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
<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
	<button type="submit" class="btn btn-outline-danger text-uppercase" name="x5" > 
<i class="fa fa-trash text-center"></i>
			</button>
			<?php
			  	if(isset($_POST['x5'])){
			  		$r=$return['photo5'];
$q="../photo/$r";
unlink($q);
$non=" ";
$cha=mysqli_query($conn,"update blog set photo5='$non' WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('Delete failed')</script>";	
}
}
?>
			</form>

			</div>
		</div>
		<div class="col-md-4 col-lg-4 py-3">
			<div class="card text-center">
				<h4 class="text-center">Photo 6</h4>
				<img src="../photo/<?php echo $return['photo6']; ?>" alt="" height="300" class="card-img-top">
				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#p6">Change </button>
<div class="collapse" id="p6">
<p>

<form  method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="photo6">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="pf">
    	<?php
    	if(isset($_POST['pf'])){
  $photo6=$_FILES['photo6']['name'];
if($photo6==null){
	echo"";
}
else{
	$r=$return['photo6'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo6='$photo6' WHERE id='$id' ");
move_uploaded_file($_FILES['photo6']['tmp_name'], "../photo/$photo6");
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
<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
	<button type="submit" class="btn btn-outline-danger text-uppercase" name="x6" > 
<i class="fa fa-trash text-center"></i>
			</button>
			<?php
			  	if(isset($_POST['x6'])){
$non=" ";
$r=$return['photo6'];
$q="../photo/$r";
unlink($q);
$cha=mysqli_query($conn,"update blog set photo6='$non' WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";
echo "<script>location.href='$url'</script>";
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
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-3">
		<div class="card text-center">
				<h4> <i class="fab fa-youtube fa-2x text-danger"></i> youtube link:</h4>
			<br>
			<form action="<?php echo $url; ?>" method="post">
    	<input type="text" class="form-control" name="you" value="<?php echo $return['youtube']; ?>">
			<input type="submit" class="btn btn-outline-dark text-uppercase" name="y" value="change">
			<?php
if (isset($_POST['y'])) {

$you=isset($_POST['you'])? $_POST['you']:null;
$cha=mysqli_query($conn,"update blog set youtube='$you' WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Update successfull')</script>";
echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('Update failed')</script>";	
}
}
			?>
			</form>
			</div>
		</div>
		<div class="col-md-12 col-lg-6">
			<div class="card">
				<h4 class="text-center">Video</h4>
					<video controls height="400">
						<source src="../video/<?php echo $return['video']; ?>" >
					</video>
			
				<button class="btn btn-outline-dark text-uppercase d-block" data-toggle="collapse" data-target="#v">Change </button>
<div class="collapse" id="v">
<p>

<form  method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
    	<input type="file" class="form-control" name="video">
    	<input type="submit" class="d-block btn btn-outline-dark text-uppercase" value="change" placeholder="upload photo"  name="vd">
    	<?php
    	if(isset($_POST['vd'])){
  $video=$_FILES['video']['name'];
if($video==null){
	echo"";
}
else{
$cha=mysqli_query($conn,"update blog set video='$video' WHERE id='$id' ");
move_uploaded_file($_FILES['video']['tmp_name'], "../video/$video");
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
<form name="myform" method="post" action="<?php echo $url; ?>" enctype="multipart/form-data">
	<button type="submit" class="btn btn-outline-danger text-uppercase" name="v1" > 
<i class="fa fa-trash text-center"></i>
			</button>
			<?php
			  	if(isset($_POST['v1'])){
$non=" ";
$s=$return['video'];
$q="../video/$s";
unlink($q);
$cha=mysqli_query($conn,"update blog set video='$non' WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";
echo "<script>location.href='$url'</script>";
}
else{
echo "<script>window.alert('Delete failed')</script>";	
}
}
?>
			</form>

			</div>
		</div>
		<div class="col md-4 col-lg-3">
			<div class="card text-center">
				<h4 class="text-center">Delete this blog</h4>
			<button data-toggle="collapse" data-target="#Del"  class="btn btn-outline-danger text-uppercase">
			<i class="fa fa-trash text-center"></i>	
			</button>
			<div class="collapse" id="Del">
				<form action="<?php echo $url?>" method="post">
				Are you sure you want to Delete the whole blog
				<input type="submit" name="dx" class="float-right text-center btn bg-danger text-white" value="Delete" >
				<?php
				if(isset($_POST['dx'])){
					$s=$return['video'];
$q="../video/$s";
unlink($q);
$a1=$return['photo1'];
$aa1="../photo/$a1";
unlink($aa1);
$a2=$return['photo2'];
$aa2="../photo/$a2";
unlink($aa2);
$a3=$return['photo3'];
$aa3="../photo/$a3";
unlink($aa3);
$a4=$return['photo4'];
$aa4="../photo/$a4";
unlink($aa4);
$a5=$return['photo5'];
$aa1="../photo/$a5";
unlink($aa5);
$a6=$return['photo6'];
$aa1="../photo/$a6";
unlink($aa6);
$cha=mysqli_query($conn,"delete from blog WHERE id='$id' ");
if($cha!=0){
	echo "<script>window.alert('Delete successfull')</script>";

echo "<script>location.href='blog.php'</script>";
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
	</div>
</div>
<?php
include "footer.php";
?>
</body>
</html>