<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: index.html");
    }
    // if(!isset($_SESSION['groupsdata'])){
    //     header("location: index.html");
    // }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];
    
    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red;"> Not voted </b>';
    }
    else{
        $status = '<b style="color:green;"> Voted </b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body style="background:none ; background-color : lightgreen;">
    <style>
        #backbtn{
            font-size: 12px;
            padding: 8px;
            border-radius: 8px;
            width: 5%;
            background-color: #0984e3;
            color: white;
            float:left;
        }
        #logoutbtn{
            font-size: 12px;
            padding: 8px;
            border-radius: 8px;
            width: 5%;
            background-color: #0984e3;
            color: white;
            float:right;
        }
        #profile{
            padding:12px;
            margin:12px;
            background-color:white;
            width:30%;
            float:left;
        }
        #group{
            padding:12px;
            margin:12px;
            background-color:white;
            width:60%;
            float:right;
        }
        #votebtn{
            font-size: 12px;
            padding: 8px;
            border-radius: 8px;
            width: 5%;
            background-color: #0984e3;
            color: white;
            margin:5px;
        }
        #mainsection{
            padding:10px;
        }
        #voted{
            font-size: 12px;
            padding: 8px;
            border-radius: 8px;
            width: 10%;
            background-color: green;
            color: white;
            margin:5px;
        }
    </style>

    <div id="mainsection"> 
        <center>
        <div id="headersection">
            <a href="index.html"><button id="backbtn">Back</button></a>
            <a href="logout.php"><button id="logoutbtn"> Logout </button> </a>
            <h1>Online voting system</h1>
        </div>
        </center>
        <hr>
        <div id="profile">
            <center><img src="upload/<?php echo $userdata['photo']?>" alt="" height="150" width="150"></center>
            <b>Name : </b> <?php echo $userdata['name'] ?> <br><br>
            <b>Mobile : </b> <?php echo $userdata['mobile'] ?> <br><br>
            <b>Address : </b> <?php echo $userdata['address'] ?> <br><br>
            <b>Status : </b> <?php echo $status ?> <br><br>
        </div>

        <div id="group">
             <?php
                if($_SESSION['groupsdata']){
                    for($i=0 ; $i<count($groupsdata) ; $i++){
                        ?> 
                            <div>
                                <img style="float:right; margin:7px;"src="upload/<?php echo $groupsdata[$i]['photo']?>" alt="" height="80" width="100">
                                <b>Group name : </b><?php echo $groupsdata[$i]['name'] ?><br><br>
                                <b>Votes : </b><?php echo $groupsdata[$i]['votes'] ?><br><br>
                                <form action="vote.php" method="post">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                                <?php
                                    if($_SESSION['userdata']['status']==0){
                                        ?>
                                            <input type="submit" name="votebtn" value="vote" id="votebtn">
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                        <?php
                                    }
                                ?>
                                </form>
                            </div>
                            <hr>
                        <?php
                    }
                }
                else{

                }
            ?>
        </div>
        
    </div>
    
</body>
</html>