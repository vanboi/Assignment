<?php
session_start();

// variables
$date = "";
$description = "";
$category =  "";
$amount = "";
$id = 0; 
$edit_state = false;

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'expenses'); 


if (isset($_POST['save'])) {
    $date = $_POST['date'];
    $description = $_POST['description'];
    $category = $_POST['category']; 
    $amount = $_POST['amount'];
    
    
    $query = "INSERT INTO info (date, description, category, amount) VALUES ('$date', '$description', '$category', '$amount')";
    mysqli_query($db, $query); 
    $_SESSION['msg'] = "Information saved";
    header('location: welcome.php'); // home page
}

// update
if (isset($_POST['update'])) {
	$date = mysql_real_escape_string($_POST['date']);
	$description = mysql_real_escape_string($_POST['description']);
	$category = mysql_real_escape_string($_POST['category']);
	$amount = mysql_real_escape_string($_POST['amount']);
	$id = mysql_real_escape_string($_POST['id']);

	mysql_query($db, "UPDATE info SET date='$date', description='$description', category='category', amount='amount' WHERE id=$id");
	$_SESSION['msg'] = "Description update";
	header('location: welcome.php'); 
}
// delete
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	$_SESSION['msg'] = "Description deleted";
	header('location: welcome.php');
}

// retrieve data
$results = mysqli_query($db, "SELECT * FROM info");

?>