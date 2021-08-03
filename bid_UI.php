<?php

include 'dashboard_Header.php';

include 'Includes/Connection.php';
include 'Includes/Bid.php';


?>


<section class="pb-5">

<div class="container pb-4 mb-2 bidSlip light">

<?php  if(!empty($msg)): ?>

<div class="alert col-xl-4 offset-xl-4 text-center  mt-3 <?php echo $alert; ?>">
<?php echo $msg; ?>
</div>

    <?php  endif; ?>

<div class="note text-center my-3">

NB: Please Do not make any online transaction as we wont be held for any fraudulent activity,
meet buyer in person make sure you are getting the right product before making any payment.

</div>


<?php

$item_Id = $_GET["id"] ;


$sql = "SELECT * FROM item WHERE item_Id = ? ORDER BY post_Date DESC;";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt , $sql)){
    echo "SqlError";
   }
   else{
    mysqli_stmt_bind_param($stmt , "s" , $item_Id );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_assoc($result);
echo'
<div class="bidTitle text-center my-3">

<h1>BID FOR '. $rows['item_Name'] . ' WITH STARTING BID '. $rows['bid_Start_Price'] . '</h1>

</div>

<div class="bidAgreement text-center my-3">

<h4>  
    I, '. $_SESSION['name'] . ', hereby place bid on the '. $rows['item_Name'] . ' 
    with no fraudulent activities or intention with an amount of:
</h4>

</div>

<div class="bidAmount   my-3">

<h1>  

GHC
</h1>

<form action="bid_UI.php?id='.$rows['item_Id'].'" method="POST" id="Bid">

<input type="text" name="Amount" class="amnt mx-2 px-3 py-1">



</form>


</div>

<div class="row my-4">

<div class="col-md-6 my-4 sign text-center">

<p>Your Signature</p>

<h1>'. $_SESSION['username'] . '</h1>

</div>

<div class="col-md-6 my-4 sign text-center">
<p>Owner Signature</p>

<h1>'. $rows['Owner'] . '</h1>

</div>

</div>



<div class="text-center">
<button class="btn" type="submit" name="BID" form="Bid" >
Place Bid
</button>
</div>


</div>
';

   }

?>



</section>

<?php

include 'dashboard_Footer.php';


?>