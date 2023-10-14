<!DOCTYPE html>
<html>
<?php
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phoneno=$_POST['num'];
            $address=$_POST['address'];
            $pass=$_POST['password'];
            $con=new mysqli("localhost","root","","userinfo");
            $sql="INSERT INTO user_details(name,email,phoneno,address,pass) VALUES(?,?,?,?,?)";
            $stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
            $stmt->bind_param('sssss',$name, $email,$phoneno,$address, $pass);
            $stmt->execute();
            echo "<script type='text/javascript'> alert('successfully submited')</script>";
            echo "<script type='text/javascript'> window.location='user.html' </script>";
            $stmt->close();
?>
</html>
