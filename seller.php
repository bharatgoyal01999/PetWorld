
<?php
if(isset($_POST['submit'])){
$con=mysqli_connect("localhost","root","","project");

$cat=$_POST['Category'];
$breed=$_POST['breed'];
$age=$_POST['age'];
$vecsin=$_POST['vecsin'];
$price=$_POST['price'];
$hn=$_POST['ahn'];
$sn=$_POST['asn'];
$zpcd=$_POST['zpcd'];
$area=$_POST['aan'];
$city=$_POST['city'];
$state=$_POST['State'];
session_start();
$usnm=$_SESSION['user_value'];
$img=$_FILES['image']['name'];
$q="INSERT INTO pets (username,category,breed,vecsin,age,price,house_no,street_no,area,city,state,zipcode,image)
VALUES('$usnm','$cat','$breed','$vecsin','$age','$price','$hn','$sn','$area','$city','$state','$zpcd','$img');
";

if(mysqli_query($con,$q)){
  move_uploaded_file($_FILES['image']['tmp_name'],"pic/$img");
  echo "<script> alert('Data sucessfully uploded')</script>";
}}

?>

<html>
<head>

<style type="text/css">
	/*form{
		margin-top: 10em;
	}*/
	select{

		background: #0D1D37;
		color:white;
	}
	option{
		color: white;

	}
	.form_input{
		border-radius:5px;
		font-size:1em;
	}
	label{
		font-size: 20px;
	}
	input.pic{

		display:none;
	}
</style>

	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="practice.css">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
</head>
<body background="8.jpg" >

<div class="nav" style="width:100%;">
<table>
  <tr>
    <td>
      <a href="login.php" >
      <img src="logo.jpg" alt="Home" class="logo"></a></td>
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
<td>
<button onclick="openProf2()" style="width:70px; margin-left:300px;border-radius:10px;">
<img src="l.png" style="width:60px; margin-left: 0; cursor: pointer;" title="<?php
  session_start(); echo $_SESSION['user_value']; ?>">
</button>

</td>
</tr>
</table>
</div>


	<form method="post" action="seller.php" enctype="multipart/form-data">
	<div class="form-group">
	<label>Ctaegory:</label>
<select style="font-size:15px; color: white; border-radius: 5px; " 	name="Category">
	<option value="DOG">Dog</option>
	<option vlaue="CAT">Cat</option>
	<option value="BIRD">Bird</option>
</select>
<br>
<style>
label{
	color:white;
}
</style>
<label>Breed:</label>
<input type="text" name="breed" class="form-control" id="exampleInputEmail3" required><br>
<label>Age(in months):</label>
<input type="text" name="age"class="form-control" required><br>
<label>Veccine:</label>
<label>Done</label><input type="radio" name="vecsin" id="optionsRadios3" value="yes" required>&nbsp;&nbsp;&nbsp;
<label>Not_Done</label>
<input type="radio" name="vecsin" id="optionsRadios3" value="No" required><br>
<label>Price:</label>
<input type="text" name="price" class="form-control" required>
<br>
<label>Address:</label><br>
<div class="form-inline">
<label>House No.:</label><input type="text" class="form-control" name="ahn" required>
<label>Street No.:</label><input type="text" class="form-control" name="asn" placeholder="(optional)"><br>
<label>Area:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="aan" required>
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;City:&nbsp;&nbsp;</label><input type="text" class="form-control" name="city" required><br>
<label>Zipcode:&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="zpcd" required>
<label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State:&nbsp;&nbsp;<label><input type="text" class="form-control" name="State" required></div>
  <br>

<br>
<label>Pictures:</label><br>

<input type="hidden" name="size" value="10000" >
<input type="file" name="image" id="image" /><br>
<input type="submit" value="submit" name="submit" class=" b" style="color: white; font-size: 20px; box-shadow: none; margin-left: 30em;"></div>
</form>

<dialog class="prof" style="background:black">


	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div class="card">
		<button type="button" name="button" class="clo" style="margin-left:25em; background:#0D1D37;border: 1px solid #0D1D37" onclick="closeProf()"> <i class="fa fa-close" style="color:white;"></i> </button><br>
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
