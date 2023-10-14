<?php
 
$con=new mysqli("localhost","root","","userinfo");

if ($con->connect_error) {
    die('Connect Error (' .
    $con->connect_errno . ') '.
    $con->connect_error);
}
$sql = " SELECT * FROM user_details ";
$result = $con->query($sql);
$con->close();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>user</title>
        <style>
            header{
                width:100%;
                height:30px;
                background-color: white;
                padding-left: 15px;
                padding-top: 6px;
            }
            i{
                padding:0 10px;
            }
            .insert{
                width:95%;
                height:auto;
                border: 1px solid #f2f2f2;
                border-radius: 30px;
                display: flex;
                flex-direction: row;
                overflow-x: scroll;
                width:500;
            }
            th,td,tr{
                min-width: 20px; 
                max-width: 9.0072e+15px;
            }
            table,th,td{
                padding: 20px;
            }
            table,tr{
                width: 100%;
                border: 1px solid #f2f2f2;
                border-collapse: collapse;
            }

        </style>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
       <header>
        <b><label for="user">USER</label></b>
       </header>
       <i class='bx bx-search'></i>
       <input type="search" id="search" name="search" placeholder="search">
       <div class="insert">
        <table id="insert_val">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone no</th>
                <th>Address</th>
            </tr>
            <?php 
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <td><?php echo $rows['name'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['phoneno'];?></td>
                <td><?php echo $rows['address'];?></td>
            </tr>
            <?php
                }
            ?>
        </table>
       </div>
    </body>
</html>