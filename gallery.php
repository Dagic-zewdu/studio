<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gallery</title>
</head>
<?php 
  include "menu.php";
  $real=mysqli_query($conn,"select * from gallery where id!=1 and privacy='public' and type!='c' order by day DESC");

$g=mysqli_query($conn,"select * from gallery where type='c' order by day DESC ");
$k=mysqli_query($conn,"select * from gallery where type='c' order by day DESC ");
  ?>
  <script>
    var g="g";
  </script>
<body onload="changecolor(g)">
	
	<!--carousel-->
	<div class="container-fluid tar">
		<div class="row">
			<div class="col-md-12 col-lg-12">
 
				<div id="example" class="carousel slide text-center" data-ride='carousel'>     
     <div class="carousel-inner">
 <ul class="carousel-indicators ta">
 	   		<?php
$j=0;
     			while($cc=mysqli_fetch_assoc($k))
			{
				if ($j==0) {
?>
    <li data-target="#example" data-slide-to="<?php echo $j; ?>" class="active"></li>
<?php }
else{
 ?>
    <li data-target="#example" data-slide-to="<?php echo $j; ?>"></li>
  
 <?php }
 $j++;
}
 ?>
 </ul> 
     		<?php
$i=0;
     			while($result=mysqli_fetch_assoc($g))
			{
				if ($i==0) {
?>   		
     <div class="carousel-item active">
        <img src="gphoto/<?php echo $result['name']; ?>"  alt="<?php echo $result['name'];?>" class="card-img-top cd my-auto">
    </div>
<?php } 
else{
?>
<div class="carousel-item">
        <img src="gphoto/<?php echo $result['name']; ?>" alt="<?php echo $result['name'];?>" class="card-img-top my-auto cd">
    </div>
<?php
 }
 $i++;
 } 
 ?>
      </div>   
     <a href="#example" class="carousel-control-prev" data-slide="prev">
         <span class="carousel-control-prev-icon text-danger"></span>
     </a>
     <a href="#example" class="carousel-control-next" data-slide="next">
         <span class="carousel-control-next-icon text-danger"></span>
     </a>
         </div>

			</div>
		</div>
	</div>
<!--gallery-->
<div class="gallery" id="gallery">

          <!-- Grid column -->
          <?php while($t=mysqli_fetch_assoc($real)){ ?>
          <div class="mb-3 pics animation all 2">
  <a href="sg.php?id=<?php echo$t['id'];?>">
          	<img class="img-fluid" data-toggle="modal" data-target="#modal" type="button"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  tabindex="-1" src="gphoto/<?php echo$t['name'];?>" alt="<?php echo$t['name'];?>">
</a>
    	      </div>

          <!-- Grid column -->
<?php } ?>
        </div>
    
<?php
include"footer.php";
?>	
<style>
	.gallery {
-webkit-column-count: 3;
-moz-column-count: 3;
column-count: 3;
-webkit-column-width: 33%;
-moz-column-width: 33%;
column-width: 33%; 
}
.gallery .pics {
-webkit-transition: all 350ms ease;
transition: all 350ms ease; }
.gallery .animation {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1); }
@media (max-width: 450px) {
.gallery {
-webkit-column-count: 1;
-moz-column-count: 1;
column-count: 1;
-webkit-column-width: 100%;
-moz-column-width: 100%;
column-width: 100%;
}
}

@media (max-width: 400px) {
.btn.filter {
padding-left: 1.1rem;
padding-right: 1.1rem;
}
}
.dag{
	background: #111;
}
</style>
<script>
	$(function() {
var selectedClass = "";
$(".filter").click(function(){
selectedClass = $(this).attr("data-rel");
$("#gallery").fadeTo(100, 0.1);
$("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
setTimeout(function() {
$("."+selectedClass).fadeIn().addClass('animation');
$("#gallery").fadeTo(300, 1);
}, 300);
});
});

</script>
</body>
</html>
