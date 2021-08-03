<?php

$msg = '';
$alert = '';

include 'dashboard_Header.php';


require_once "Includes/Connection.php";

$owner = $_SESSION['username'];
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

    if(isset($_POST['Delete'])){

        $mainSql = " DELETE FROM item WHERE item.item_Id = ?;";
        $mainStmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($mainStmt , $mainSql)){
 echo "sql error!";
}
else{

    

    if($rows['Owner'] !== $owner){
        echo "Sorry, You have no right to the product, You 
        are not the owner";

    }else{
        mysqli_stmt_bind_param($mainStmt , "s", $item_Id );
    mysqli_stmt_execute($mainStmt);
        header("Location:home.php?done");
    }


}


    }

   }
?>

<?php

include 'dashboard_Footer.php';


?>