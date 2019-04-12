<?php 
error_reporting(E_ERROR | E_PARSE);
session_start(); 

$username = $_SESSION['username'];
                    
$db = mysqli_connect('localhost', 'mculabeu_zhelev', 'zlatomir', 'mculabeu_users');

$user_delete_query = "DELETE FROM users_profiles WHERE username='$username'";
$result = mysqli_query($db, $user_delete_query);
$user = mysqli_fetch_assoc($result);

session_unset();
session_destroy();

header("Location: ../index.php");

?>