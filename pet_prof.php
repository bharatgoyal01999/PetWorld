
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

  <link rel="stylesheet" href="practice.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <meta charset="utf-8"> 
    <title></title>
  </head>
  <body background="8.jpg">


  <div class="nav" style="width:100%;">
<table>
  <tr>
    <td>
      <a href="login.php" >
      <img src="logo.jpg" alt="Home" class="logo"></a></td>
    <td>  <h1 style="color:rgb(13,29,55);">PetWorld</h1>
</td>
<td style="padding-left:10em;">
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
<td>
<button onclick="openProf2()" style="width:70px; margin-left:300px;border-radius:10px;">
<img src="l.png" style="width:60px; margin-left: 0; cursor: pointer;" >
</button>

</td>
</tr>
</table>
</div>




  <?php 
  $con =mysqli_connect("localhost","root","","project");
  
if(isset($_POST['cart'])){
  session_start();
 $p= $_SESSION['pid'];  
 $u= $_SESSION['user_value'];
$q="insert into cart values($p,'$u');";
mysqli_query($con,$q);
header("Location:buyer.php");
}


  if (isset($_POST['ss'])){
    $pid=$_POST['pid'];
    $q="select * from pets where pet_id=$pid";
    $q1=mysqli_query($con,$q);
    $r=mysqli_fetch_array($q1);
    session_start();
  $_SESSION['pid']=$pid;  
  $_SESSION['u2']=$r['username'];
  $_SESSION['breed']=$r['breed'];
  $_SESSION['age']=$r['age'];
  $_SESSION['vecsin']=$r['vecsin'];
  $_SESSION['city']=$r['city'];
 
    echo "
   
   <div class=pet_prof style=color:white;>
  Breed: ".$_SESSION['breed']."<br><br>Age: ".$_SESSION['age']." (months)<br><br> Vaccine: ".$_SESSION['vecsin']."<br><br>City: ".$_SESSION['city']."<br><br>
     <button class='b' style=color:white;font-size:20px; onclick=contact()>Contact</button><br><br>
     <form method=post action=pet_prof.php>
     
     <button class='b' type=submit name=cart style=color:white;font-size:20px;>Add to Cart</button></form>
  </div> ";

  }
  

?>

<dialog class="contact">
<button type="button" class="closel close" style="margin-left:25em; background:#0D1D37;border: 1px solid #0D1D37" onclick="close_contact();"> <i class="fa fa-close" style="color:white;"></i> </button><br>
<?php 
$con =mysqli_connect("localhost","root","","project");

$pid=$_SESSION['pid'];
$q="select * from pets where pet_id='$pid';";
$r=mysqli_query($con,$q);
$row=mysqli_fetch_array($r);
$u=$row['username'];
$q="select * from reg where username='$u'";
$r=mysqli_query($con,$q);
$user=mysqli_fetch_array($r);
echo " Phone No.: ".$user['Phone']."<br><br>Email:".$user['Email']."<br><br>Address:<br>".$row['house_no']." ,Street no ".$row['street_no']." ,"
.$row['area']."<br>City:".$row['city']."<br>State:".$row['state']."<br> Zip_Code:".$row['zipcode'];

?>
</dialog>

<script>

function close_contact() {
  
 var ld=document.querySelector(".contact");
 ld.close();
}
function contact() {
 
 var ld=document.querySelector(".contact");
 ld.showModal();
}
</script>

  </body>
</html>
