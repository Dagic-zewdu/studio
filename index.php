<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
 <title id="title">Home</title>   
</head>
<?php
 include"menu.php";
        echo $ans['title']."-".$ans['slogan'];
        echo '</body></html>';
    $sql=mysqli_query($conn,"select * from gallery where id!=1 and privacy='public' and  home='show' and type!='c' order by day DESC");
    ?>
    <script type="text/javascript">
        var i="i";
    </script>
<body onload="changecolor(i)" onload="getitle()">
    
    <!--banner-->
    <div id="banner">
    <h1 class="d" id="titl"><?php echo$ans['title']?></h1>
    <h3 class="da" id="slogan"><?php echo $ans['slogan'];?></h3>
</div>
    <!--Contact  form-->
    <script>
        function getitle(){
        var t=document.getElementById('titl');
      document.getElementById("title").innerHTML="t";
    }
    </script>
<!--Blog-->
        <div class="container my-4">
        <div class="row">
            <?php 
            $i=0;
            while ($return=mysqli_fetch_assoc($request)) {
            if($i<8) { 
            ?>
            <div class="col-sm-4 col-md-6 col-lg-3 my-2 mx-auto">
                <div class="card text-center">
                    <img src="photo/<?php echo $return['photo1']; ?>" height="165" alt="" class="card-img-top">
                    <div class="dar d-flex justify-content-around">
            <a href="<?php echo $return['fb']; ?>"><i class="fab fa-facebook fa-1x text-white"></i ></a>
            <a href="<?php echo $return['twitter']; ?>"><i class="fab fa-twitter fa-1x text-primary"></i></a>
            <a href="<?php echo $return['telegram']; ?>"><i class="fab fa-telegram fa-1x text-warning"></i></a>
       <a href="<?php echo $return['instagram']; ?>"><i class="fab fa-instagram fa-1x text-danger"></i></a>
        </div>
                    <h6 class="card-title text-uppercase">
                        <?php echo $return['title']; ?>
                    </h6>
                    <p class="card-text i text-center">
   <?php echo $return['highlight']; ?>
                    </p>
                    <a href="sblog.php?id=<?php echo $return['id']; ?>" class="btn bo btn-outline-dark d-block text-uppercase">See-more</a>
       
                </div>
                </div>
            <?php $i++; }} ?>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 py-3 col-md-12 col-lg-12">
                <div class="card bo text-uppercase">
                    <h6>
          <p class="i text-center" >
            <?php
          echo $ans['description'];
          ?>  
      </p>        
                <p class="text-center text-uppercase i">
for more info visit my <a href="about.php">About us</a>
</p>
</h6>
</div>
            </div>
        </div>
    </div>
    <!--jcs-->
    <!---dfs-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6 class="text-uppercase text-center py-3">
                    For awesome photos visit our <a href="gallery.php" class="text-dark">gallery</a>
                </h6>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row no-gutter">
            <?php
            $i=0;
             while($j=mysqli_fetch_assoc($sql)){ 
if($i<4
){
                ?>
            <div class="col-md-6 col-lg-3 text-center mx-auto">
                <a href="sg.php?id=<?php echo $j['id']; ?>">
                <div class="card">
                <img src="gphoto/<?php echo $j['name']; ?>" height="260" alt="" class="card-img-top">
            </div>
            </a>
            </div>
            <?php 
$i++;
             }} ?>
        </div>
    </div>
    <?php
include"footer.php";
    ?>

</body>
</html>