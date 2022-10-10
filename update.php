<?php
include "connection.php";
if (isset($_POST['update'])) {
	$id = $_POST['no'];
	$name = $_POST['name'];
	$email = $_POST['email'];
    mysqli_query($conn, "UPDATE project SET name='$name', email='$email' WHERE S_no=$id");
    header('location: project.php');
    exit;
};
?>