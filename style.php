<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php

	include "Db.php";
$query=mysqli_query($conn,"select * from home where id='1'");
        $ans=mysqli_fetch_assoc($query);
        $request=mysqli_query($conn,"select * from blog where post='public' and front='show' order by day DESC ");
        $f=$ans['font'];
        $qu=mysqli_query($conn,"select * from gallery where id='1'");
        $a=mysqli_fetch_assoc($qu);
 ?>
</head>
<body>
<style>
body{
	background: url('Homephoto/<?php echo $ans['photo3']; ?>');
	<?php
	if($f=='roboto'){ ?>
font-family: 'Roboto Condensed', sans-serif;
	<?php } ?>
	<?php
	if($f=='open'){ ?>
	font-family: 'Open Sans', sans-serif;
	<?php } ?>
	<?php
	if($f=='mont'){ ?>
font-family: 'Montserrat Alternates', sans-serif;
	<?php } ?>

		<?php
	if($f=='Lato'){ ?>
		font-family: 'Lato', sans-serif;
	<?php } ?>

		<?php
	if($f=='metal'){ ?>
font-family: 'Metal Mania', cursive;
	<?php } ?>

		<?php
	if($f=='kurale'){ ?>
font-family: 'Kurale', serif;
	<?php } ?>
	margin: 0;
}
h1{
	padding: 8px;
	background: rgba(0,0,0,0);
	border-radius: 8px;
	margin: 0;
	font-size: 64px;
<?php
	if($f=='roboto'){ ?>
	font-family: 'Roboto slab',serif;
	<?php } ?>
<?php
	if($f=='open'){ ?>
	font-family: 'Open Sans', sans-serif;
	<?php } ?>

	<?php
	if($f=='mont'){ ?>
font-family: 'Montserrat', sans-serif;
	<?php } ?>

		<?php
	if($f=='Lato'){ ?>
		font-family: 'Lato', sans-serif;
	<?php } ?>

		<?php
	if($f=='metal'){ ?>
font-family: 'Metal Mania', cursive;
	<?php } ?>

		<?php
	if($f=='kurale'){ ?>
font-family: 'Kurale', serif;
	<?php } ?>
}
h2,h3,h4,h5{
	<?php
	if($f=='roboto'){ ?>
	font-family: 'Roboto slab',serif;
	<?php } ?>
	<?php
	if($f=='open'){ ?>
	font-family: 'Open Sans', sans-serif;
	<?php } ?>
		<?php
	if($f=='mont'){ ?>
font-family: 'Montserrat', sans-serif;
	<?php } ?>

		<?php
	if($f=='Lato'){ ?>
		font-family: 'Lato', sans-serif;
	<?php } ?>

		<?php
	if($f=='metal'){ ?>
font-family: 'Metal Mania', cursive;
	<?php } ?>

		<?php
	if($f=='kurale'){ ?>
font-family: 'Kurale', serif;
	<?php } ?>
}
p{
	line-height: 1.5;
	text-align: justify;
	text-indent: 80px;
}
main{
	margin: auto;
}
a{
	text-decoration: none;
	color:  black;
}
a:hover{
	text-decoration: underline;
}
input,
textarea{
height: 32px;
padding: 0 16px;
font-family: 'Roboto condensed',sans-serif;
font-size:20px;
border:none;
box-shadow: inset 8px 3px 18px -4px rgba(0,0,0,0.4);
}
input:focus,
textarea:focus{
	outline: none;
}
#banner{
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	background: rgba(0,0,0,0.4) url('Homephoto/<?php echo $ans['photo2'] ?>');
	background-size: cover;
	background-attachment: fixed;
	background-position: center;
	background-blend-mode: overlay;
	color: white;
}
#banner h3{
border-radius: 8px;
padding:0 24px;
font-size: 24px;
}
#searchbox{
	position: fixed;
	right:0;
	top:24px;
	width:500px;
	pointer-events: none;
	z-index: 50;
	transition: 0.4s;
}
#search input{
	height: 48px;
	width: 100%;
}
nav{
	background: #111;
	height: 58px;
width: 100%;
margin: 0;
position: fixed;
<?php
	if($f=='roboto'){ ?>
font-family: 'Roboto Condensed', sans-serif;
	<?php } ?>
	<?php
	if($f=='open'){ ?>
	font-family: 'Open Sans', sans-serif;
	<?php } ?>
	<?php
	if($f=='mont'){ ?>
font-family: 'Montserrat Alternates', sans-serif;
	<?php } ?>

		<?php
	if($f=='Lato'){ ?>
		font-family: 'Lato', sans-serif;
	<?php } ?>

		<?php
	if($f=='metal'){ ?>
font-family: 'Metal Mania', cursive;
	<?php } ?>

		<?php
	if($f=='kurale'){ ?>
font-family: 'Kurale', serif;
	<?php } ?>
font-size: 20px;
display: flex;
justify-content: space-between;
padding: 0 16px 0 0;
box-sizing: border-box;
z-index: 100;
}
nav a{
	padding: 0 32px;
	color: #eee;
	transition: 0.4s;
}
nav a:hover{
	text-decoration: none;
	color: red;
}
nav ul{
	display: flex;
	list-style: none;
	justify-content: space-around;
	align-items: center;
	height: 100%;
	margin: 0;
}
.active{
	color:#f783ae;
}
#logo-img{
	display: flex;
	height: 30%;
	background: #111;
	padding: 0 32px;
	align-items: center;
	color: white;
	transition: 0.4s;
}
#logo-img img{
	height: 100px;
}
#logo-img:hover{
	background: #111;
}
#menu-icon{
	height: 100%;
	font-size:28px;
	padding: 0 4px;
	color: #eee;
	display: none;
	align-items: center;
}
#search-icon{
	color: white;
	padding: 0 32px;
	cursor: pointer;
	transition: 0.4s;
}
#search-icon:hover{
	color:red;
}
#slideout-menu{
	display: none;
	background-color: #2d3436;
	z-index: 100;
	position: fixed;
	transition: 0.4s;
	margin-top: 72px;
	width: 100%;
	text-align: center;
	opacity: 0;
	pointer-events: none;
}
#slideout-menu ul{
	list-style: none;
	padding: 0 32px;
}
#slideout-menu ul li{
	padding: 8px;
}
#slideout-menu a{
	<?php
	if($f=='roboto'){ ?>
font-family: 'Roboto Condensed', sans-serif;
	<?php } ?>
	<?php
	if($f=='open'){ ?>
	font-family: 'Open Sans', sans-serif;
	<?php } ?>
	<?php
	if($f=='mont'){ ?>
font-family: 'Montserrat Alternates', sans-serif;
	<?php } ?>

		<?php
	if($f=='Lato'){ ?>
		font-family: 'Lato', sans-serif;
	<?php } ?>

		<?php
	if($f=='metal'){ ?>
font-family: 'Metal Mania', cursive;
	<?php } ?>

		<?php
	if($f=='kurale'){ ?>
font-family: 'Kurale', serif;
	<?php } ?>
	font-size: 20px;
	color: white;
}
#slideout-menu input{
	width: 85%;
	padding: 8px;
	<?php
	if($f=='roboto'){ ?>
font-family: 'Roboto Condensed', sans-serif;
	<?php } ?>
	<?php
	if($f=='open'){ ?>
	font-family: 'Open Sans', sans-serif;
	<?php } ?>
	<?php
	if($f=='mont'){ ?>
font-family: 'Montserrat Alternates', sans-serif;
	<?php } ?>

		<?php
	if($f=='Lato'){ ?>
		font-family: 'Lato', sans-serif;
	<?php } ?>

		<?php
	if($f=='metal'){ ?>
font-family: 'Metal Mania', cursive;
	<?php } ?>

		<?php
	if($f=='kurale'){ ?>
font-family: 'Kurale', serif;
	<?php } ?>
	font-size: 20px;
	text-align: center;
}
@media(max-width: 1084px){
	nav ul{
		display:none;
	}
	#menu-icon{
		display: flex;
	}
	#slideout-menu{
		display: block;
	}
	#searchbox{
		display:none;
	}
}
@media(min-width: 1084px){
			.icon-bar{
	position: fixed;
	top: 50%;
	-webkit-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	transform: translateY(-50%);
}
.icon-bar a{
	display: block;
	text-align: center;
	padding: 16px;
	transition: all 0.3s ease;
	color: white;
	font-size: 20px;
}
.cd{
	padding-top: 50px;
	height: 100vh;
}
.tar{
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	background-size: cover;
	background-attachment: fixed;
	background-position: center;
	background-blend-mode: overlay;
	color: white;
}
}
@media(max-width: 719px)
{
	main{
		width: 95%;
	}
}
@media(max-width: 600px){
	main{
		width: 100%;
	}
	h1{
		font-size: 20px;
	}
	banner h3{
		font-size: 20px;
	}
	.cd{
		padding-top: 50px;
	}
}
@media(min-width: 719px)
{
	.cd{
		padding-top: 50px;
	}
}
.dar{
	background: #111;
}
.da{
	padding-top: 75px;
}
.z{
	text-align: justify;
	text-indent: 80px;
}
.i{
	text-indent: 0px;
}
.no-gutter > [class*='col-']
{
	padding-right: 0;
	padding-left: 0;
}
.no-guter > [class*='col-']
{
	padding-right: 3;
	padding-left: 3;
}
#dbanner{
	height: 100vh;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	background: rgba(0,0,0,0.2) url('gphoto/<?php echo $a['name'] ?>');
	background-size: cover;
	background-attachment: fixed;
	background-position: center;
	background-blend-mode: overlay;
	color: white;
}
.no-sutter > [class*='container']
{
padding-top: 0;
padding-bottom: 0;
}
.no-shutter > [class*='row']
{
padding-top: 0;
padding-bottom: 0;
}
.bo{
	border-color: white;
}
.mis{
	height: 100vh;
}
.vb{
	max-width: 100%;
height: auto;
}
</style>
</body>
</html>
