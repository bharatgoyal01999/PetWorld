<!DOCTYPE html>
<html>
<head>
	<title>Petworld</title>
  <style type="text/css">

.user:hover{
box-shadow: 5px 10px 10px  rgb(13,29,55);
  z-index: 600;
  border-radius: 20px;

}


  </style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="practice.css">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
  <body>
    <div class="nav">
<table style="position:fixed;">
  <tr>
    <td>
      <a href="login.php" >
      <img src="logo.jpg" alt="Home" class="logo" title="PetWorld"></a></td>
    <td>  <h1 style="color:rgb(13,29,55);">PetWorld</h1>
</td>
<td style="padding-left:8em;">
  <form class="" action="buyer.php" method="post">
    <input type="search" name="search" placeholder="Breed/City" class="search">
    <button type="submit" name="button" class="b">  <i class="fa fa-search" style="font-size:20px; color:white;"></i>
</button>
  </form>
</td>
<td>
  <div class="dropdown">
  <button type="button" name="Category" class="b dropbtn">Category</button>
  <div class="dropdown-content">
  <form action="buyer.php" method="post">
  <button type="submit" name="dog" class="category" style="background-color: Transparent;">Dog</button> <br><br>
  <button type="submit" name="cat" class="category" style="background-color: Transparent;">Cat</button> <br><br>
  <button type="submit" name="bird" class="category" style="background-color: Transparent;">Bird</button> <br>
   </form>
   
   </div>
</div></td>
<td>  <a href="buyer.php" style="color:White";><button name="button" class="b dropbtn" style="margin-left: 100px;">Buy</button> </a></td>
  <td> <a href="seller.php" style="color:White";><button name="button" class="b dropbtn" style="margin-left: 80px;">Sell</button></a> </td>
  <td> <form action="buyer.php" method="post"><button name="cart" class="b dropbtn" style="margin-left: 80px;">Cart</button></form></td>
<td>

<button onclick="openProf()" class="profile" style="width:70px; margin-left:30px;border-radius:10px;">
	<img src="l.png" style="width:60px; margin-left: 0; cursor: pointer;" title="<?php
  session_start(); echo $_SESSION['user_value']; ?>">
</button><br></td></tr></div>
<div class="image" style="float:left; width:100%">
<img src="https://www.rd.com/wp-content/uploads/2018/05/shutterstock_1062336044.jpg" alt="Dogs" class="mySlides"  style="float:left;width:100%">
<img class="mySlides" src="2.jpg" style="width:100%;">

  <img class="mySlides" src="5.jpg" style="width:100%">
  <img class="mySlides" src="6.jpg" style="width:100%">  
  <!-- <img class="mySlides" src="9.jpg" style="width:100%"> -->
  <img class="mySlides" src="10.jpg" style="width:100%"> 
  <img class="mySlides" src="7.jpg" style="width:100%">
  <img class="mySlides" src="8.jpg" style="width:100%"> 
  

</div>

<dialog class="prof" style="background:black">


	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div class="card">
		<button type="button" name="button" class="clo" style="margin-left:25em; background:black;border: 1px solid #0D1D37" onclick="closeProf()"> <i class="fa fa-close" style="color:white;"></i> </button><br>
<?php
$con=mysqli_connect("localhost","root","","project");
	$unm=$_SESSION['user_value'];
$q="select * from reg where Username='$unm'";
$q=mysqli_query($con,$q);
while($row=mysqli_fetch_array($q)){

echo	"<p style=color:white;font-size:20px;><b>Username: ".$row['Username']."<br><br>Name: ".$row['First_Name']." ".$row['Last_Name']."<br><br>Phone: ".$row['Phone']."<br><br>Email: ".$row['Email']."</b></p>";
}
		 ?>

	  <p>
			<a href="petworld_project.php">
			<button class="b" style="color:white;font-size:20px;"style="margin-left:5px;">LogOut</button>
		</a>
    <button class="b" style="color:white;font-size:20px;" onclick="open_trades()">My Trades</button>
</p>



	</div>


</dialog>
<dialog class="trades" style="background-color:black;"> 
<button type="button" name="button" class="clo" style="margin-left:25em; background:black;border: 1px solid #0D1D37" onclick="closeProf()"> <i class="fa fa-close" style="color:white;"></i> </button><br>
<div>

<h3 style="color:white"> 
Sold
</h3>

<ul class="list-group">
<?php

$con=mysqli_connect("localhost","root","","project");
session_start();
$u=$_SESSION['user_value'];
$q1="select * from pets where username='$u' and pet_id in (select pet_id from sell);";
$result=mysqli_query($con,$q1);
$q2="select * from pets where username='$u' and pet_id not in (select pet_id from sell);";
$result2=mysqli_query($con,$q2);

while($row=mysqli_fetch_array($result2)){
  $path='pic/'.$row['image'];

  echo "
  <li class=list-group-item style=opacity:0.7;>

  <img src=".$path." width=60px class=img   style= border-radius:80px ; >
  <p style=float:right;>
  Sold</p>
  </li>
  ";
}


while($row=mysqli_fetch_array($result)){
  $path='pic/'.$row['image'];
  

  echo "
  <li class=list-group-item>

  <img src=".$path." width=60px class=img   style= border-radius:80px ; >
  <p style=float:right;><form method=post  action=update.php><input type=hidden name=pid value='$row[pet_id]'>
  <button type=submit name=sold class=sold > sold</button>
  
  <button type=submit name=remove class=sold >remove</button></form></p>
  </li>
  ";
}

?>



</ul>



</div>


</dialog>





	<script type="text/javascript" src="petworldjsfile.js">
	</script>
</body>

</html>
