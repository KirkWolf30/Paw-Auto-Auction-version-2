<?php

$msg = "";
$alert = "";

$CATEGORY = $item_Name = $Description = $startDate = $End_Date = $Start_Price = "";

if(isset($_POST['post'])){

require_once "Connection.php";

$CATEGORY = $_POST['category'];
$text_Category = "";

$item_Name = $_POST['item_Name'];
$Description = $_POST['Description'];
$startDate =  date('Y-m-d' , strtotime($_POST['startDate']));
$End_Date =  date('Y-m-d' , strtotime($_POST['End_Date']));
$Start_Price =$_POST['Start_Price'];

$Real_Start_Price = "GHC ". $Start_Price;

$Image = $_FILES['File'];

$Image_Name = $_FILES['File']['name'];
$error = $_FILES['File']['error'];
$size = $_FILES['File']['size'];
$tmp_name = $_FILES['File']['tmp_name'];
$type = $_FILES['File']['type'];

$img_Ext = explode('.' , $Image_Name);

$Act_Ext = strtolower(end($img_Ext));

$allow = array('jpg' , 'png' , 'jpeg');

$time_now = date("Y-m-d h:i:s");

switch ($CATEGORY) {
    case "Auto_Mobile":
      $text_Category = "Auto_Mobile";
      break;
    case "Engine":
        $text_Category = "Engine";
        break;
    case "body":
        $text_Category = "body";
        break;
        case "Others":
            $text_Category = "Others";
            break;
    default:
    $text_Category = "";
}

if(empty($CATEGORY) || empty($item_Name) || empty($Description) || empty($startDate) 
|| empty($End_Date) || empty($Start_Price) || empty($Image) ){

    $msg = "Empty Feilds";

    $alert = "alert-danger";
}
else{
    if(in_array($Act_Ext , $allow)){

if($error === 0 ){

    if($size < 10000000){

$Image_New_Name = uniqid('', true).".".$Act_Ext;

$Destination = "Images/Item_Post/".$Image_New_Name;

if(!move_uploaded_file($tmp_name , $Destination)){
    $msg = "Image Can't Upload!";
    $alert = "alert-danger";
}
else{

$sql = "INSERT INTO item(item_Name , Item_Description , 
Category , item_Picture , Owner  , post_Date , bid_Start_Price
, bid_Start_Date , 	bid_End_Date)
VALUES(? , ? , ? , ? , ? , ? , ? , ? , ?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt , $sql)){
        $msg = "Sql Error!";
    $alert = "alert-danger";
    }
    else{
        mysqli_stmt_bind_param($stmt, "sssssssss" , 
        $item_Name , $Description , $text_Category , $Destination , 
        $_SESSION['username'] , $time_now ,  $Real_Start_Price , $startDate,
        $End_Date );

mysqli_stmt_execute($stmt);
$msg = "Ad Posted successfully!";
    $alert = "alert-success";

    $CATEGORY = $item_Name = $Description = $startDate = $End_Date = $Start_Price = "";


    }


}

    }
    else{
        $msg = "File Too Large!";
    $alert = "alert-danger";
    }
}
else{
    $msg = "File Corrupted!";
$alert = "alert-danger";
}

    }
    else{
        $msg = "File not allowed";
$alert = "alert-danger";
    }

}


}