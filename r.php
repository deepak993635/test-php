<?php
session_start();
	if(!isset($_SESSION['browser'])) {
	$_SESSION['browser'] ="Brave";
	}
if(!isset($_SESSION['site'])) {
	$_SESSION['site'] ="";
	}

include ('functions.php');	

$keyword= getkeyword();

 if ( isset($_POST['submit']) ) {
	 


$intance = $_POST["intance"];
$site = $_POST["site"];
$it = $intance + 1;

$_SESSION['site'] = $site;

$launchcmd='chrome.exe --profile-directory="Profile '.$intance.'" "https://presearch.org/extsearch?term='.$keyword.'"';
//	echo $launchcmd;
	exec ($launchcmd);

$_SESSION['intance'] = $it;

 header("Location: r.php");
	
	
	
	}
?>

<html>
<title>PHP Dev Tool </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<body>
<div class="w3-row-padding">
<form method="post" action="">
<div class="w3-third">
<p>Website</p>
<select class="w3-select" name="intance" >
<option><?php   echo  $_SESSION['intance'] ; ?></option>
<?php  
$x = 0; 
while($x <= 750) {
  echo "<option value=$x> $x </option>";
  $x++;
} 
?></select>
</div>
</div>

<button class="w3-btn w3-blue" name="submit" type ="submit">Open</button>


</form>


<?php
print_r($_SESSION);
?><br><br>
<a href="update-d.php" class="w3-button w3-black" >update</a>