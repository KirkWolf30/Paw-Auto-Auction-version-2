<?php

include 'dashboard_Header.php';


?>




<section class=" py-2">

<div class="container my-2 py-2 ">

<div class="filter  ">
<!-- <form action="home.php" method="POST" class="text-center">
<label for="Category" class="mx-2">Filter By:</label>

<select name="Category" id="Category">
<option value="All">All</option>
  <option value="Auto-Mobile">Auto-Mobile</option>
  <option value="Engine">Engine</option>
  <option value="Body-Parts">Body-Parts</option>
  <option value="Others">Others</option>
</select>


<button type="submit"><img src="Images/build/Funnel.png" width="30px" height = "30px" alt=""></button>

</form> -->

<?php

require_once "Includes/Connection.php";


$sql  = "SELECT * FROM item  ORDER BY post_Date DESC;";

$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt , $sql)){
  echo "Sql Error";
}else{
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

while($rows = mysqli_fetch_assoc($result)){

echo 
'<div class="container post pb-5">

<div class="row my-2 g-4 align-items-center pb-3">

  <div class="col-xl-6 img">

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

</div>
</div>
</section>

<?php

include 'dashboard_Footer.php';


?>