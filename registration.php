<?php
include("connection.php");

$name=$_POST['name'];
$mobile=$_POST['mobile'];
$passward=$_POST['passward'];
$cnfpass=$_POST['cnfpass'];
$addr=$_POST['addr'];
$photo=$_FILES['photo']['name'];
$temp_name=$_FILES['photo']['tmp_name'];
$role=$_POST['role'];

if($passward==$cnfpass){

    move_uploaded_file($temp_name,"upload/$photo");
    $insert=mysqli_query($connect,"insert into user (name,mobile,passward,address,photo,role,status,votes) values('$name','$mobile','$passward','$addr','$photo','$role',0,0);");
    if($insert){
        echo "
       <script>
       alert('Registration Succesfully');
       window.location='index.html';
       </script>
       ";
    }
    else{
        echo "
        <script>
        alert('Some Error Occur ');
        window.location='registration.html';
        </script>
        ";
    }
}
else{
    echo "
       <script>
       alert('Passward and Confirm-Passward are not same');
       window.location='registration.html';
       </script>
       ";
}

?>