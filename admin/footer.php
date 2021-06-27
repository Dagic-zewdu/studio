<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container-fluid mt-5 bg-dark text-white">
		<div class="row">
			<div class="col-md-12 col-lg-4 text-center">
				<h4 class="text-uppercase text-white">User</h4>
	<form action="index.php" method="post">
<input type="submit" name="su" class="btn bg-dark text-white" value="logout"><br>
<?php
if(isset($_POST['su']))
{
session_unset(); 
echo "you are succesfully loged out";
echo "<script>location.href='index.php'</script>";
}
?>
</form>
<a href="admin.php" class="text-white">Admin Manager</a>
<h4 class="text-uppercase text-white">Quick links</h4>
<a href="Home.php" class="text-white">Home</a>
<a href="gallery.php" class="text-white">Gallery</a>
<a href="blog.php" class="text-white">Blog</a>
<a href="about.php" class="text-white">About</a>
<a href="contact.php" class="text-white">contact</a>
<a href="test.php" class="text-white">Testimonials</a>

			</div>
		</div>
	</div>
</body>
</html>