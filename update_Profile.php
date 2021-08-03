<?php

include 'dashboard_Header.php';

include 'Includes/Connection.php';

include 'Includes/update.php';


?>

<main  class="py-2 dark mt-1">

<?php  if(!empty($msg)): ?>

<div class="alert col-xl-4 offset-xl-4 text-center  mt-5 <?php echo $alert; ?>">
<?php echo $msg; ?>
</div>

    <?php  endif; ?>


<section class="dark ">

<div class="container p-4 my-5">

<div class="row align-items-center g-5">

<div class="col-xl-6 signImage text-center">

<img src="Images/profile/default.png" alt="" id="profileDisplay" onclick="triggerClick()">

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


<input type="file" name="File" onchange="displayImage(this)" id="profileImage" form="Update" style="display:none;" >
</div>

<div class="col-xl-6 forms px-4">

<form action="update_Profile.php" method="POST" id="Update" enctype="multipart/form-data" >

<label class="" >fullname:</label>
<input type="text" name="name"  class="my-3 py-3 px-2" value="<?php echo $_SESSION['name'] ?>">

<label class="" >Phone Number:</label>
<input type="text" name="number"   class="my-3 py-3 px-2" value="<?php echo $_SESSION['number'] ?>">

<label class="" >Username / Company name:</label>
<input type="text" name="Username"   class="my-3 py-3 px-2" value="<?php echo $Username ?>">

<label class="" >Email:</label>
<input type="email" name="Email"   class="my-3 py-3 px-2" value="<?php echo $_SESSION['email'] ?>">


<button type="submit" name="update" class="btn my-3"> Save </button>


</form>

</div>

</div>

</div>

</section>

</main>

<?php

include 'Asset/subs/sign_Footer.php';


?>

<?php

include 'dashboard_Footer.php';


?>