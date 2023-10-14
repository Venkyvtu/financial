<?php
session_start();
//connection establishment
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'userinfo';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	//if connection error
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//to check data is enter or not or submited
if ( !isset($_POST['email'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}
//
if ($stmt = $con->prepare('SELECT email, pass FROM user_details WHERE email = ? and pass=?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('ss', $_POST['email'],$_POST['password']);
	$stmt->execute();
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($email, $password);
        $stmt->fetch();
        if ($_POST['password']== $password and $_POST['email']=='admin@gmail.com') {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['email'] = $email;
            echo "<script type='text/javascript'> alert('welcome $_SESSION[email]')</script>";
            echo "<script type='text/javascript'> window.location='office_page.html' </script>";
            
        } elseif($_POST['password']== $password){
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['Email'] = $email;
            echo "<script type='text/javascript'> alert('welcome $_SESSION[Email]')</script>";
            echo "<script type='text/javascript'> window.location='enduser.html' </script>";
            echo "select * from data";   
        }else{
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }


	$stmt->close();
}
?>