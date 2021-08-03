<?php

$msg = "";
$alert = "";

$name = $number = $Username = $Email = "";

if(isset($_POST['update'])){

    require_once 'Connection.php';

    $name = $_POST['name'];
    $number = $_POST['number'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];


    $image = $_FILES ['File'];

    $imageName = $_FILES['File']['name'];
    $imageError = $_FILES['File']['error'];
    $imageType = $_FILES['File']['type'];
    $imageSize = $_FILES['File']['size'];
    $imageTmp_Name = $_FILES['File']['tmp_name'];

    $image_Ext = explode('.' ,  $imageName);
    $imageAct_Ext = strtolower(end($image_Ext));

    $allow = array('jpg' , 'jpeg' , 'png');

    if(empty($image) || empty($name) || empty($number) || empty($Username) 
    || empty($Email) ){

        $msg = "Empty Feilds";

        $alert = "alert-danger";

        $Username = $_SESSION['username'];
    }  
    elseif(!preg_match('/^[a-zA-Z\s]*$/' , $name)){
        $msg = "No symbol or Number in name Feild";

        $alert = "alert-danger";
    }
    elseif(!preg_match('/^[0-9\s]*$/' , $number)){
        $msg = "No symbol or Letters in number Feild";

        $alert = "alert-danger";
    }
    elseif(!preg_match('/^[a-zA-Z0-9\s]*$/' , $Username)){
        $msg = "No symbol in username Feild";

        $alert = "alert-danger";
    }
    elseif(!filter_var($Email , FILTER_VALIDATE_EMAIL)){
        $msg = "Check Email!";

        $alert = "alert-danger";
    }
    else{

        $sql = "SELECT username FROM users WHERE username = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt , $sql)){
            $msg = "Sql Error!";

        $alert = "alert-danger";
        }
        else{

            mysqli_stmt_bind_param($stmt , "s" , $Username);

            mysqli_stmt_execute($stmt);

          mysqli_stmt_store_result($stmt);

            $result_Checker = mysqli_stmt_num_rows($stmt);

            if($result_Checker > 0){

                $msg = "username Already exist!";

                $alert = "alert-danger";

            }
            else{
                
                if(in_array($imageAct_Ext , $allow)){

                    if($imageError == 0){

                        if($imageSize < 10000000){

                            $image_New_Name = uniqid('' , true).".".$imageAct_Ext;

                            $destination = "Images/profile/".$image_New_Name;

                            if(!move_uploaded_file($imageTmp_Name , $destination)){
                                $msg = "File can't upload!";
            
                                $alert = "alert-danger";
                            }
                            else{
                               
                                $sql = "UPDATE users SET username = ?, fullname = ?, email = ?, phonenumber = ?, proilePicture = ? WHERE users.username = ?;";
                        
                                $stmt = mysqli_stmt_init($conn);
                        
                                if(!mysqli_stmt_prepare($stmt , $sql)){
                                    $msg = "Sql Error!";
                                
                                    $alert = "alert-danger";
                        
                                }else{

                                    mysqli_stmt_bind_param($stmt , "ssssss" , $Username , $name , $Email , $number ,$destination, $_SESSION['username'] );

                                    mysqli_stmt_execute($stmt);
                        
                        
                                    header("Location:signin.php?update sucessful");
                        
                                    $name = $number = $Username = $Email = $password = $re_password = "";
                        
                        


                                }
                            }

                        }
                        else{
                            $msg = "File Too Large!";
        
                        $alert = "alert-danger";
                        }

                    }else{
                    $msg = "File Corrupted!";

                $alert = "alert-danger";
                }


                }else{
                    $msg = "File isn't Allowed!";

                $alert = "alert-danger";
                }

            }


        }

    }



}




?>