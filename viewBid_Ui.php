<?php

include 'dashboard_Header.php';

include 'Includes/Connection.php';
include 'Includes/Bid.php';


?>

<section class="my-4 pb-5">


<div class="container my-2 py-2">
<div class="row align-items-center  g-4  m-3">
<?php

$item_Id = $_GET["id"] ;

$sql = "SELECT bid.bidder, bid.bid_Amount , bid.item_Id, users.proilePicture , users.username FROM bid 
INNER JOIN users ON bid.bidder=users.username 
WHERE item_Id = $item_Id
ORDER BY bid_Amount DESC;";
$result = mysqli_query($conn , $sql);
$result_checker = mysqli_num_rows($result);

echo '
         
<h1>'. $result_checker .' Bids(s)  </h1>



';


if($result_checker > 0){
    while($rows = mysqli_fetch_assoc($result)){
      
       echo '
    
  


    


<div class="col-md-4">

<div class= "bidPaper light py-3" >

<div class=" imageP">
    
<div class="bidPaper_Image" style="background-image: url('. $rows['proilePicture'] . ');"></div>

</div>

<div class=" detail text-center" >

<form action="profile_View.php?Owner='.$rows['bidder'].'" method="POST" class=" text-center py-3">
  
<a href = "profile_View.php?Owner= '. $rows['bidder'] .'" class=" text-center">

<button type="submit" name= "owner" class = "buttonX">
<h3 class="mx-2">  '. $rows['bidder'] .'  </h3>
</button>
</a>

</form>


<h3>'. $rows['bid_Amount'] . '</h3>


</div> 

</div>   
    

</div>
   


   

    ';

   }
}


?>

</section>


<?php

include 'dashboard_Footer.php';


?>