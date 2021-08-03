<?php

include 'Includes/Signin.php';

include 'Asset/subs/sign_Header.php';


?>


    <main class="py-5">

<section class="light py-4">

<?php if(!empty($msg)) : ?>

<div class="alert   col-xl-4 offset-xl-4 text-center  mt-5 <?php echo $alert; ?>">

<?php echo $msg; ?>

</div>


    <?php endif; ?>


<div class="container py-4">

<div class="row align-items-center g-5">

<div class="col-xl-6 image px-4">

<img src="Images/build/profile.svg" alt="" class="img-fluid">
</div>

<div class="col-xl-6 forms px-4">

<form action="signin.php" method="POST">

<input type="text" name="mailUid"  placeholder="*Username/Email" class="py-3 px-2 my-2">
<input type="password" name="password"  placeholder="password" class="py-3 px-2 my-2">

<button type="submit" name="signIn" class="btn my-3"> Sign in </button>

<a href="signUp.php" class=" my-3"> Don't have an account? Sign up here! </a>

</form>

</div>

</div>

</div>

</section>

</main>



<?php

include 'Asset/subs/sign_Footer.php';


?>