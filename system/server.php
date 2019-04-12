<?php

session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'mculabeu_zhelev', 'zlatomir', 'mculabeu_users');

// REGISTER
if (isset($_POST['reg_user'])) 
{ 
    $username   = mysqli_real_escape_string($db, $_POST['username']);
    $email      = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    if (empty($username)) { array_push($errors, "Нужно е потребителско име"); }
    if (empty($email)) { array_push($errors, "Нужна е е-поща"); }
    if (empty($password_1)) { array_push($errors, "Нужна е парола"); }
    if ($password_1 != $password_2) { array_push($errors, "Двете пароли не съвпадат"); }
    if (strlen($password_1) < 8) { array_push($errors, "Паролата трябва да бъде поне 8 знака"); }

    $user_check_query = "SELECT * FROM users_profiles WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) 
    { 
        if ($user['username'] === $username) { array_push($errors, "Потребителското име е заето"); }
        if ($user['email'] === $email) { array_push($errors, "Е-пощата вече е използвана"); }
    }

    if (count($errors) == 0) 
    {
        if(file_exists("../database/history.json"))
  	    {
  	        $JSONdata = file_get_contents("../database/history.json");
  	        $data = json_decode($JSONdata, true);
  	        
  	        $adding = array(
  	            'username'     =>   $username,
  	            'verified'     =>   'false',
  	            'history1'     =>   array(
  	                'service1'  =>   0,   
  	                'search1'   =>   "",
  	                'result1'   =>   ""
  	            ),
  	            'history2'     =>   array(
  	                'service2'  =>   0,   
  	                'search2'   =>   "",
  	                'result2'   =>   ""
  	            ),
  	            'history3'     =>   array(
  	                'service3'  =>   0,   
  	                'search3'   =>   "",
  	                'result3'   =>   ""
  	            ),
  	            'history4'     =>   array(
  	                'service4'  =>   0,   
  	                'search4'   =>   "",
  	                'result4'   =>   ""
  	            ),
  	            'history5'     =>   array(
  	                'service5'  =>   0,   
  	                'search5'   =>   "",
  	                'result5'   =>   ""
  	            ),
  	            'history6'     =>   array(
  	                'service6'  =>   0,   
  	                'search6'   =>   "",
  	                'result6'   =>   ""
  	            ),
  	            'history7'     =>   array(
  	                'service7'  =>   0,   
  	                'search7'   =>   "",
  	                'result7'   =>   ""
  	            ),
  	            'history8'     =>   array(
  	                'service8'  =>   0,   
  	                'search8'   =>   "",
  	                'result8'   =>   ""
  	            ),
  	            'history9'     =>   array(
  	                'service9'  =>   0,   
  	                'search9'   =>   "",
  	                'result9'   =>   ""
  	            ),
  	            'history10'     =>   array(
  	                'service10'  =>   0,   
  	                'search10'   =>   "",
  	                'result10'   =>   ""
  	            ),
  	            'historyIndex' =>   0
  	        );
  	        
  	        $data[] = $adding;
  	        $result = json_encode($data);
  	        file_put_contents("../database/history.json", $result);
  	    }
  	     
        $subject = "Информация за регистрацията ви в mysecpal.eu";
        $text = "Здравейте" . $username . "\n\n Вие се регистрирахте в mysecpal.eu с потребителско име " . $username . "и поролата " . $password . ".\n\n Поздравления от персонала на mysecpal.eu !";
        $headers = "From: zlatomir@mysecpal.eu" . "\r\n";
        
        mail($email, $subject, $text, $headers);
        
  	     $password = md5($password_1);

  	     $query = "INSERT INTO users_profiles (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	     mysqli_query($db, $query);
         //$_SESSION['username'] = $username;
  	     //$_SESSION['success'] = "You are now logged in";
  	     header('location: ../login/index.php');
    }
}

//LOGIN
if (isset($_POST['login_user'])) 
{
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) { array_push($errors, "Необходимо е потребителско име"); }
    if (empty($password)) { array_push($errors, "Необходима е парола"); }
    
    if (count($errors) == 0) 
    {
  	     $password = md5($password);
  	     $query = "SELECT * FROM users_profiles WHERE username='$username' AND password='$password'";
  	     $results = mysqli_query($db, $query);
  	     
        if (mysqli_num_rows($results) == 1) 
        {
  	         $_SESSION['username'] = $username;
  	         $_SESSION['success'] = true;
  	         header('location: ../index.php');
  	    }
        else 
        {
  		    array_push($errors, "Грешна комбинация потребител/парола");
  	    }
    }
}

//Forgotten password
/*if(isset($_POST['change_passwd']))
{
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$sql = "SELECT * FROM users_profiles WHERE username = '$username'";
	$res = mysqli_query($db, $sql);
	$count = mysqli_num_rows($res);
	if($count != 1){ array_push($errors, "Потребителят не съществува", "User doesn't exist")); }
	    
	$r = mysqli_fetch_assoc($res);
    $password = $r['password'];
    $password = rand(999, 99999);
    $password_hash = md5($pass);
    $to = $r['email'];
    $subject = "Вашата възтановена парола";

    $message = "Това е паролата ви " . $password;
    $headers = "От: MySecPal.еу";
    
    mail($to, $subject, $message, $headers);
}

//Comments
if(isset($_POST['commentSubmit']))
    {
        $author = $_POST['author'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
        
        $sql = "INSERT INTO feedback (author, date, description) VALUES ('$author', '$date', '$comment')";
        $result = mysqli_query($db, $sql);
    }*/

?>