<?php

include 'Includes/Sign_Up.php';

include 'Asset/subs/sign_Header.php';


?>


<main  class="py-5 light mt-2">

<?php  if(!empty($msg)): ?>

<div class="alert col-xl-4 offset-xl-4 text-center  mt-5 <?php echo $alert; ?>">
<?php echo $msg; ?>
</div>

    <?php  endif; ?>


<section class="light mt-5">

<div class="container  my-5 px-4">

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


<input type="file" name="File" onchange="displayImage(this)" id="profileImage" form="signUp" style="display:none;" >
</div>

<div class="col-xl-6 forms px-4">

<form action="signUp.php" method="POST" id="signUp" enctype="multipart/form-data" >

<input type="text" name="name" placeholder="*Full name" class="my-3 py-3 px-2" value="<?php echo $name ?>">
<input type="text" name="number"  placeholder="*Phone Number" class="my-3 py-3 px-2" value="<?php echo $number ?>">
<input type="text" name="Username"  placeholder="*username / Company name" class="my-3 py-3 px-2" value="<?php echo $Username ?>">
<input type="email" name="Email"  placeholder="*Email" class="my-3 py-3 px-2" value="<?php echo $Email ?>">
<input type="password" name="password"  placeholder="*Password" class="my-3 py-3 px-2" value="<?php echo $password ?>">
<input type="password" name="re-password"  placeholder="*Confirm Password" class="my-3 py-3 px-2">


<button type="submit" name="sign_Up" class="btn my-3"> Sign Up</button>

<a href="signin.php"> Already have an account? Sign in here!</a>

</form>

</div>

</div>

</div>

</section>

</main>



<?php

include 'Asset/subs/sign_Footer.php';


?>