<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <?php 
include"style.php";
$real=mysqli_query($conn,"select * from gallery where id!=1 and privacy='public' order by day DESC");
$g=mysqli_fetch_assoc($real);
    ?>
    
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/all.js"></script>
<div id="slideout-menu">
<ul>
    <li><a  href="index.php" id="h">Home</a></li>
    <li><a  href="gallery.php" id="g">Gallery</a></li>
    <li><a  href="blog.php" id="s">Stories</a></li>
    <li><a  href="about.php" id="a">About</a></li>
    <li><a  href="test.php" id="t">Testimonials</a></li>
    <li><a c href="contact.php" id="c">contact</a></li>
    <li><input type="text" placeholder="Search here"></li>
<li>
        <i class="fas fa-search text-white"></i>
    </li>
</ul>   
</div>
<nav>
    <div id="logo-img">
        <a href="#">
            <img src="Homephoto/<?php echo $ans['photo1']; ?>" height="30" alt="logo">
        </a>

    </div>
<div id="menu-icon">
    <i class="fas fa-bars">
    </i>
</div>
<ul>
    <li><a  id="ha" href="index.php">Home</a></li>
    <li><a  href="gallery.php" id="ga">Gallery</a></li>
    <li><a  href="blog.php" id="sa">Stories</a></li>
    <li><a  href="about.php" id="aa">About</a></li>
    <li><a  href="test.php" id="ta">Testmonials</a></li>
    <li><a  href="contact.php" id="ca">contact</a></li>
    <li id="search-icon">
        <i class="fas fa-search"></i>
    </li>
</ul>
</nav>
<div id="searchbox">
    <input type="text" placeholder="Search here">
</div>

<script type="text/javascript" src="main.js"></script>
<script>
    const h=document.getElementById("h");
    const p=document.getElementById("g");
    const st=document.getElementById("s");
     const about=document.getElementById("a");
      const test=document.getElementById("t");
       const contact=document.getElementById("c");
      hb=document.getElementById("ha");
    const pb=document.getElementById("ga");
    const stb=document.getElementById("sa");
     const aboutb=document.getElementById("aa");
      const testb=document.getElementById("ta");
       const contactb=document.getElementById("ca");
    function changecolor(id){
        if(id=="i"){
        h.style.color="#f783ae";
      hb.style.color="#f783ae";
    }
       if(id=="g"){
        p.style.color="#f783ae";
        pb.style.color="#f783ae";
    }
    if(id=="b"){
        st.style.color="#f783ae";
          stb.style.color="#f783ae";
    }
    if(id=="a"){
        about.style.color="#f783ae";
        aboutb.style.color="#f783ae";
    }
    if(id=="c"){
        contact.style.color="#f783ae";
         contactb.style.color="#f783ae";
    }
    if(id=="t"){
        test.style.color="#f783ae";
        testb.style.color="#f783ae";
    }
    }
</script>
</body>
</html>