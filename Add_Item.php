<?php


include 'dashboard_Header.php';
include 'Includes/post.php';


?>



<main class="py-2 dark mt-2">

<?php  if(!empty($msg)): ?>

<div class="alert col-xl-4 offset-xl-4 text-center  mt-5 <?php echo $alert; ?>">
<?php echo $msg; ?>
</div>

    <?php  endif; ?>

<div class="container py-2">

<div class="row align-items-center g-5 ">

<div class="col-xl-6 img-form">

<img src="Images/build/post.svg" alt="" id="post_Display" onclick="triggerClick()">

<div class="round">
<lord-icon
    src="https://cdn.lordicon.com//vixtkkbk.json"
    trigger="click"
    colors="primary:#2a332d,secondary:#34d761"
    stroke="53"
    style="width:80px;height:80px"
    id="profileDisplay" 
    onclick="triggerClick()">
</lord-icon>
</div>


<input type="file" name="File" onchange="displayImage(this)" id="profileImage" form="Post" style="display:none;" >

</div>


<div class="col-xl-6  forms p-4">

<form action="Add_Item.php" method="POST" id="Post" enctype="multipart/form-data" >

<div class="text-center">

<label for="category"> *Select Category </label>

<select name="category" id="Category" value="<?php echo $CATEGORY ?>">
    
<option value=""></option>
<option value="Auto_Mobile"> Auto-Mobile </option>
<option value="Engine"> Engine </option>
<option value="body"> Body Parts </option>
<option value="Others"> Others </option>

</select>

</div>

<input type="text" name="item_Name" placeholder="Item Name*" value="<?php echo $item_Name ?>" class="my-3 py-3 px-2">

<textarea name="Description" id=""  placeholder="Description*" value="<?php echo $Description ?>" class="my-3 py-3 px-2"></textarea>

<label for="startDate">Bid-start-Date*</label>
<input type="date" name="startDate" value="<?php echo $startDate ?>" class="my-3 py-3 px-2">

<label for="End_Date">Bid-End-Date*</label>
<input type="date" name="End_Date" value="<?php echo $End_Date ?>" class="my-3 py-3 px-2">

<input type="text" name="Start_Price" placeholder="Bid-Start-Price*" value="<?php echo $Start_Price ?>" class="my-3 py-3 px-2">

<button type="submit" class="btn" name="post"> Post Ad </button>

</form>

</div>

</div>

</div>

</main>



<footer>
<script src="js/post.js"></script>
</footer>

<?php

include 'dashboard_Footer.php';


?>