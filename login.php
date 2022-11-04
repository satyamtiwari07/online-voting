<?php
    session_start();
    include("connection.php");

    $num=$_POST['number'];
    $pass=$_POST['passward'];
    $role=$_POST['role'];

    $check=mysqli_query($connect,"select * from user where mobile='$num' and passward='$pass' and role='$role' ");
    
    if(mysqli_num_rows($check)>0){
        $userdata = mysqli_fetch_array($check);
        $groups = mysqli_query($connect , "select * from user where role=2  ");
        $groupsdata = mysqli_fetch_all($groups , MYSQLI_ASSOC);

        $_SESSION['userdata']=$userdata;
        $_SESSION['groupsdata']=$groupsdata;

        echo "
            <script>
            window.location='dashboard.php';
            </script>
       ";
    }
    else{
        echo "
            <script>
            alert('invalid user');
            window.location='index.html';
            </script>
       ";
    }


?>