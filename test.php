<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Testmonials</title>
</head>

	<?php
include"menu.php";
$d=mysqli_query($conn,"select * from review order by day DESC");
	?>
<script>
	var t="t";
</script>
<body onload="changecolor(t)">
	

	<div class="container da">
		<div class="row">
			<?php
			while($t=mysqli_fetch_assoc($d))
			{
			?>
			<div class="col-md-12 col-lg-12">
				<h4 class="text-center"> <?php echo $t['ps']; ?></h4>
			 <p>
			 	<?php echo $t['description']; ?>
			 </p>
				<hr color="lightgray">
			</div>
		<?php } ?>
		</div>
	</div>
	<?php 
	include "footer.php";
	?>
</body>
</html>