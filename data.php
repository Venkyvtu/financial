<?php
            $userid=$_POST['userid'];
            $name=$_POST['fname'];
            $mobile=$_POST['number'];
            $pass=$_POST['password'];
            $con=new mysqli("localhost","root","","user");
            $sql="INSERT INTO info(userid,name,mobile,password) VALUES(?,?,?,?)";
            $stmt = mysqli_prepare($con, $sql) or die(mysqli_error($con));
            $stmt->bind_param('ssis', $userid,$name,$mobile,$pass);
            $stmt->execute();
            echo "<script type='text/javascript'> alert('successfully submited')</script>";
            echo "<script type='text/javascript'> window.location='user.html' </script>";
            $stmt->close();
?>