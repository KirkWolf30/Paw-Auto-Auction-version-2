<?php

include 'dashboard_Header.php';

if(isset($_POST['owner'])){
    require_once 'Includes/Connection.php';

$Owner = $_GET["Owner"] ;


$sql = "SELECT * FROM users WHERE username = ?;";

$stmt = mysqli_stmt_init($conn);


if(!mysqli_stmt_prepare($stmt , $sql)){
 echo "SqlError";

}

else{
    mysqli_stmt_bind_param($stmt , "s" , $Owner );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($result);
echo '

<main class="dark my-2 pt-2">

<div class="container details ">

<div class="row align-items-center  g-4">

<div class="col-md-6 profileP">

<div class="detailPic" style="background-image: url('. $rows['proilePicture'].');">


</div>

</div>

<div class="col-md-6 detailText ">

<h2 class="username px-2">
'.$rows['username'].'
</h2>

<a href="tel:'.$rows['phonenumber'].'
" class = "call">


<h2 class="username px-2">
'.$rows['phonenumber'].'
</h2>

<img src="Images/build/call.png" width="35px" height = "35px" alt="">

</a>


<a href="mailto::'.$rows['email'].'
" class = " Email my-2">


<h4 class=" px-2">
'.$rows['email'].'
</h4>

</a>

</div>

</div>


</div>

</main>

<section class="my-4">

<div class="container">



';

    
    
}

}

?>

<?php

require_once "Includes/Connection.php";

$sql  = "SELECT * FROM item WHERE Owner = ? ORDER BY post_Date DESC;";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt , $sql)){
  echo "Sql Error";
}else{
mysqli_stmt_bind_param($stmt , "s" , $Owner);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

while($rows = mysqli_fetch_assoc($result)){

echo '
<div class="container post mb-4  py-5">

<div class="row my-4 g-4 align-items-center">

  <div class="col-xl-6 img px-3">

  <img src="'. $rows['item_Picture'] . '" alt = "" class="img-fluid">

  

  </div>

  <div class="col-xl-6 text px-3">

  <h1 class="my-2" > '. $rows['item_Name'] . ' </h1>



  <div class="Id">
  <form action="profile_View.php?Owner='.$rows['Owner'].'" method="POST">

  <label class="" >Owner:</label>
  
  <a href = "profile_View.php?Owner= '. $rows['Owner'] .'">

  <button type="submit" name= "owner" class="button">
  <p class="mx-2">  '. $rows['Owner'] .'  </p>
  </button>
  </a>

  </form>
</div>

  <label class="my-2" >Description:</label>


  <p class="my-1 description" >
  '. $rows['Item_Description'] . '
  </p>


  <div class=" row dates my-2">

  <div class="text-post col-lg-12">
  <label class="text-success col-lg-6" >Bid-Start-date:</label>
  
  <p class="m-1 col-lg-6" >
  '. $rows['bid_Start_Date'] . '  </p>
  </div>
  
  <div class="text-post col-lg-12">
  <label class="text-danger  col-lg-6" >Bid-End-date:</label>
  
  <p class="m-1   col-lg-6" >
  '. $rows['bid_End_Date'] . '
    </p>
  </div>
  
  </div>

  <div class="text-post col-lg-12">
  <label class="  col-lg-6" >Starting-Bid-Price:</label>
  
  <p class="m-1 text-success  col-lg-6" >
  '. $rows['bid_Start_Price'] . '
  </p>
  </div>

  </div>


  <div class="links">
  <a href="bid_UI.php?id='.$rows['item_Id'].'" class="btn ">
  Bid
</a>
  
  <form action="viewBid_Ui.php?id='.$rows['item_Id'].'" method="POST">
  
  <button type="submit">
  <a href="viewBid_Ui.php?id='.$rows['item_Id'].'" class="text-success" >
    View Bids
    <lord-icon
      src="https://cdn.lordicon.com//tyounuzx.json"
      trigger="loop"
      colors="primary:#e5e5e5,secondary:#34d761"
      style="width:30px;height:30px">
  </lord-icon>
  </a>
  
  </button>
  
  </form>
  
  <form action="delete.php?id='.$rows['item_Id'].'" method="POST">
  
  <button type="submit" name="Delete" class="text-danger">
  Delete
  <lord-icon
      src="https://cdn.lordicon.com//gsqxdxog.json"
      trigger="loop"
      colors="primary:#e5e5e5,secondary:#f17e7e"
      style="width:30px;height:30px">
  </lord-icon>

  </button>
  
  </form>
  </div>
  
  </div>

  </div>

  </div>
  </div>
';

}


}

?>


<?php

include 'dashboard_Footer.php';


?>