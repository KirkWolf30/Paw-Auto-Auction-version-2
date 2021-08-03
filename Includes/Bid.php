<?php

$msg="";
$alert = "";

$item_Id = $_GET["id"] ;


$sql = "SELECT * FROM item WHERE item_Id = ?;";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt , $sql)){
    echo "SqlError";
   
   }
   else{
    mysqli_stmt_bind_param($stmt , "s" , $item_Id );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($result);

if(isset($_POST['BID'])){


    require_once 'Connection.php';

    $Bid_Amount = $_POST['Amount'];
    $time_now = date("Y-m-d h:i:s");
    $Real_Bid_Price = "GHC ". $Bid_Amount;

    if(empty($Bid_Amount)){
        $msg="Empty Feilds";
$alert = "alert-danger";
    }
    elseif(!preg_match('/^[0-9]*$/' , $Bid_Amount)){
        $msg="Numbers Only!";
        $alert = "alert-danger";
    }


    else{
        $mainSql = "INSERT INTO bid(bidder , bid_date , bid_Amount, item_Id)
        VALUES(? , ? , ? , ?);";

$mainStmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($mainStmt , $mainSql)){
    $msg = "Sql Error!";
$alert = "alert-danger";
}
else{
    mysqli_stmt_bind_param($mainStmt , "ssss",
    $_SESSION['username'] , $time_now , $Real_Bid_Price , $item_Id );

    mysqli_stmt_execute($mainStmt);
$msg = "Bid placed successfully, hope You Win!";
    $alert = "alert-success";
}


    }

}

   }