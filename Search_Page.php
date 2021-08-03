<?php

include 'dashboard_Header.php';


if(isset($_POST['search'])){
    require_once 'Includes/Connection.php';

    $Search_Input = mysqli_real_escape_string($conn , $_POST['Search_Input']);

    $sql = "SELECT * FROM item WHERE item_Name LIKE '%$Search_Input%' ORDER BY post_Date DESC;";
    $result = mysqli_query($conn , $sql);

    $result_checker = mysqli_num_rows($result);
    echo '
         
    <div class="container col-md-8 offset-md-2">
<p>'. $result_checker .'  Search Result(s)  </p>

</div>
    
    ';
 if($result_checker > 0){
     while($rows = mysqli_fetch_assoc($result)){
        echo '
<div class="container post py-4">

<div class="row my-3 pb-4 g-4 align-items-center">

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
        
        
     
 }else{
     echo "";
 }

?>

<?php

include 'dashboard_Footer.php';


?>
