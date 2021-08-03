<?php

$msg = '';
$alert = '';

if(isset($_POST['signIn'])){

require_once "Connection.php";

$mailUid = $_POST['mailUid'];
$password = $_POST['password'];

if(empty($mailUid) || empty($password) ){

    $msg = 'Empty Feilds';
    $alert = 'alert-danger';

}
else{

$sql = "SELECT * FROM users WHERE username = ? OR email = ?";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt , $sql)){
    $msg = 'Sql Error!';
    $alert = 'alert-danger';

}
else{
    mysqli_stmt_bind_param($stmt , "ss" , $mailUid , $mailUid );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if($rows = mysqli_fetch_assoc($result)){

        $dehashed_Pwd = password_verify($password , $rows['pwd']);

        if($dehashed_Pwd == false){
            $msg = 'Check Email or password!';
            $alert = 'alert-danger';
        }

        elseif($dehashed_Pwd == true){
            
session_start();


$_SESSION['username'] = $rows['username'];
$_SESSION['email'] = $rows['email'];
$_SESSION['profile_Pic'] = $rows['proilePicture'];
$_SESSION['name'] = $rows['fullname'];
$_SESSION['number'] = $rows['phonenumber'];

header("Location:home.php?Welcome".$_SESSION['username']."");



        }
        else{
            
            $msg = 'Check Email or password!';
            $alert = 'alert-danger';

        }



    }
    else{
        $msg = "Username / Email dosen't exist!";
        $alert = "alert-danger";
    }


}


}



}