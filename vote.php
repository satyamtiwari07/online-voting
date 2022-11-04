<?php
session_start();
include("connection.php");

$votes=$_POST['gvotes'];
$tot_votes=$votes+1;
$gid=$_POST['gid'];
$uid=$_SESSION['userdata']['id'];

$update_votes = mysqli_query($connect,"update user set votes=$tot_votes where id=$gid ");
$update_user_status = mysqli_query($connect , "update user set status=1 where id=$uid ");

if($update_votes and $update_user_status){
    $groups=mysqli_query($connect,"select id,name,votes,photo from user where role=2");
    // $groups = mysqli_query($connect , "select * from user where role=2  ");
    $groupsdata = mysqli_fetch_all($groups , MYSQLI_ASSOC);

    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupsdata']=$groupsdata;

    echo "
            <script>
            alert('Voting successfull');
            window.location='dashboard.php';
            </script>
       ";


}
else{
    echo "
            <script>
            alert('Some error occurs ...! ');
            window.location='dashboard.php';
            </script>
       ";
}


?>