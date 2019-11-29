<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <title>Petworld</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="practice.css">
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body background="8.jpg">
    <div class="nav" style="width:100%;position:fixed;">
  <table style="margin-bottom:30px;">
  <tr>
    <td>
      <a href="login.php" >
      <img src="logo.jpg" alt="Home" class="logo"></a></td>
    <td>  <h1 style="color:rgb(13,29,55);">PetWorld</h1>
  </td>
  <td style="padding-left:10em;">
  <form class="" action="buyer.php" method="post">
    <input type="search" name="search" placeholder="city/breed" class="search">
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
  <td>

<button onclick="openProf2()" style="width:70px; margin-left:400px;border-radius:10px;background:transparent;">
	<img src="l.png" style="width:60px; margin-left: 0; cursor: pointer;" title="<?php
  session_start(); echo $_SESSION['user_value']; ?>">
</button><br></td>
  </table>
  </div>
 
<div  style="float:left; width:100%;margin-top:80px;">


 <?php

    echo "
    <style>


div.gallery img:hover {
  border:white;
}

div.gallery img {
  width: 250px;
  height: 150px;
  margin-right:20px;
  margin-left:10px
  margin-top:2px;
  border-radius:10px;
  border-bottom:3px solid white;
}

div.desc {
  padding-bottom: 15px;
  border 1px solid white;

  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {

  padding: 0 6px;
  float: left;
  width: 260px;
  margin-right:32px;
  margin-left:35px;
  margin-bottom:20px;
}
.imgbtn{
opacity:1;
color:

}


label{
  font-size:20px;
}
</style>"
;

      $con=mysqli_connect("localhost","root","","project");
      $q1="update pets set city = upper(city);";
      mysqli_query($con,$q1);
      $q1="update pets set breed = upper(breed);";
      mysqli_query($con,$q1);
      if(isset($_POST['cart'])){
       
        $u=$_SESSION['user_value'];
        
        $q="select * from pets where pet_id in (select pet from cart where username='$u'); ";
      }
      elseif(isset($_POST['cat'])){
        
        $q="select * from pets where pet_id in (select pet_id from sell) and category='Cat';";
      }
  
    elseif(isset($_POST['dog'])){

        $b="select * from Breeds where category='dog'";
        $breeds=mysqli_query($con,$b);
        while($row=mysqli_fetch_array($breeds)){

          $pat='dogs/'.$row['breed'].'.jpeg';
          echo "
          <div class=responsive style=background:white>
          <div class=gallery><center >
          <img src=".$pat." width=400 class=img height=300  style= border 1px solid white; >
          <div class=desc style=color:white;> <label> &nbsp;".$row['breed']."</label></div>
          </div></div> ";
         
        }

    

      $q="select * from pets where pet_id in (select pet_id from sell) and category='DOG';";
    }
    elseif(isset($_POST['bird'])){
      
      $q="select * from pets where pet_id in (select pet_id from sell) and category='BIRD';";
    }
    elseif(isset($_POST['button'])){
       $s=$_POST['search'];
       strtoupper($s);
      $q="select * from pets where pet_id in (select pet_id from sell) and (city='$s' or breed ='$s') ;";

    }
 else{
      $q="select * from pets where pet_id in (select pet_id from sell)";}
      $result=mysqli_query($con,$q);
while($row=mysqli_fetch_array($result)){
$path='pic/'.$row['image'];
$width=400;
$height=300;
$pid=$row['pet_id'];

echo   "

<div class=responsive>
<div class=gallery><center>
<form method=post action=pet_prof.php>
<input type=hidden name=pid value=".$row['pet_id'].">
<button type=submit class=b  name=ss style=background:white;>
<img src=".$path." width=".$width." class=img height=".$height."  style= border 1px solid white; >
<div class=desc style=color:white;> <label> City:&nbsp;".$row['city']."</label> <br> <label style=margin-left:-1px;> Breed:&nbsp" .$row['breed']." </label></div>
  </button>
  </form>
  </center>
   </div>
  </div>";
}?>



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
    
</p>



	</div>


</dialog>

	<script type="text/javascript" src="petworldjsfile.js">
	</script>
  </body>
</html>
