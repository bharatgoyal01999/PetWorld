<?php


    $pid=$_POST['pid'];
echo $pid;
$con=mysqli_connect("localhost","root","","project");
$q="DELETE FROM sell WHERE pet_id='$pid'";
mysqli_query($con,$q);

if(isset($_POST['remove'])){
    $pid=$_POST['pid'];

$con=mysqli_connect("localhost","root","","project");
$q="DELETE FROM pets WHERE pet_id='$pid'";
mysqli_query($con,$q);
}



header("Location:login.php");


?>