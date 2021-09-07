<?php
$host="localhost";
  $username="root";
  $password="";
  $database="lab3";
try {
$conn= mysqli_connect($host,$username,$password,$database);
if($conn){
echo "";
}
}catch(Exception $errormsg){
echo $errormsg->getMessage();
die("Error". mysqli_connect_error());  
}
  
if(isset($_POST['post_like']))
{
  $update = mysqli_query($conn,"update rate set tot=tot+1,lik=lik+1");
  $select = mysqli_query($conn,"SELECT * FROM rate");
  while($row=mysqli_fetch_array($select))
  {
	$total_votes=$row['tot'];
	$likes=$row['lik'];
	$dislike=$row['dislike'];

    echo "<p id='total_rating'>Total Ratings ( ".$total_votes." )</p>";
    echo "<p id='total_like'>".$likes."</p><div id='like_bar'></div>";
    echo "<p id='total_dislike'>".$dislike."</p><div id='dislike_bar'></div>";
    exit();
  }
}


if(isset($_POST['post_dislike']))
{
  $update = mysqli_query($conn,"update rate set tot=tot+1,dislike=dislike+1");
  $select = mysqli_query($conn,"SELECT * FROM rate");
  while($row=mysqli_fetch_array($select))
  {
  	$total_votes=$row['tot'];
	$likes=$row['lik'];
	$dislike=$row['dislike'];

    echo "<p id='total_rating'>Total Ratings ( ".$total_votes." )</p>";
    echo "<p id='total_like'>".$likes."</p>";
    echo "<p id='total_dislike'>".$dislike."</p>";
    exit();
  }
}

if(isset($_POST['view']))
{
  $update = mysqli_query($conn,"update visit set count=count+1");
  $select = mysqli_query($conn,"SELECT * FROM visit");
  while($row=mysqli_fetch_array($select))
  {
  	$count=$row['count'];

    echo "$count";
    exit();
  }
}
if(isset($_POST['view1']))
{
  $select = mysqli_query($conn,"SELECT * FROM visit");
  while($row=mysqli_fetch_array($select))
  {
	$user=$row['user'];
    echo "$user";
    exit();
  }
}
if(isset($_POST['auth']))
{
  $update = mysqli_query($conn,"update visit set user=user+1");
  echo "<script>alert('login')</script>";
    exit();
  }
?>