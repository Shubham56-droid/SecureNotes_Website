<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './partials/_dbconnect.php';


    // this will tell error message 
    $message = "";
    // this will tell weather error happen or not
    $error = false;
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $conpass = $_POST["conpass"];
    $inpnumber = $_POST["inpnumber"];
    $exists = false;
 
    
    if($username == "" || $pass == "" || $email == "" || $inpnumber == "" ){
        $error = true;
        $message = "Please fill all the details in the forms carefully , no columns can be left empty.";
        showAlert($message,$error);

    }else{
          
        // password check
        $uppercase = preg_match('@[A-Z]@',$pass);
        $lowercase = preg_match('@[a-z]@',$pass);
        $check_number = preg_match('@[0-9]@',$pass);
        $specialChar = preg_match('@[^\w]@',$pass);


        if($pass != $conpass)
        {
            // checking weather password and confirm passowrd matches

            $error = true;
            $message = "Password and Conform password must be same and cannot be diffrent please re-enter it correctly";
            showAlert($message,$error);

        }
        else if(!$uppercase || !$lowercase || !$check_number || !$specialChar || strlen($pass) < 8){

            // checking weather password is strong or not

            $error = true;
            $message = "Passowrd should be at least 8 charecter in length and should include ar least one uppercase letter, one lowercase letter and one special charecter";
            showAlert($message,$error);
        }
        else if( (is_numeric($inpnumber) != true) || (strlen($inpnumber) != 12)){

            // checking weather number is valid or not
            $error = true;
            
            $message = "Please enter valid phone number. Phone number must include country code without + symbol and its length must be 12 digit. $inpnumber";

            showAlert($message,$error);
        }
        else{

            $checkusername_match = false;
            $usernamecheck = "SELECT * FROM users";

            $resusercheck  = mysqli_query($conn,$usernamecheck);

            $numcheck = mysqli_num_rows($resusercheck);

            if($numcheck > 0){
                while( $rows = mysqli_fetch_assoc($resusercheck)){
                     if($username  == $rows['username']){

                        // checking weather the username enter alredy exist into the databse
                        $checkusername_match = true; 

                     }
                }
            }


            if($checkusername_match == false){
                // now we will insert value into database
                $inssql = "INSERT INTO `users` (`username`, `email`, `password`, `phonenum`) VALUES ('$username', '$email', '$pass', '$inpnumber')";

                $resins = mysqli_query($conn,$inssql);

                if(!$resins){
                    $error = true;
                    $message = "Sorry failed to enter the data due to network or server issue please try after some time.";
                    showAlert($message,$error);
                }else{
                    $error = false;
                    showAlert($message,$error);
                }
            }
            else{
                $error = true;
                $message = "Username alredy exist please enter a unique unsername";

                showAlert($message,$error);
            }
            
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>

    <!----------- Bootstrap CSS ---------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!------------ Icon Script ----------->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-------------  Custom CSS ---------->
    <link rel="stylesheet" href="./css/signup.css">

</head>
<body id="main">

<!-------------- Custom Alert Box Start  ----------->


<!-- <div class="custom-alert-box" id="alert-rem">
    <div class="alert-content">
        <p class="heading">Account Created Succesfully</p>
        <p class="message">You have successfully created your account on securenote please <span style="color:rgb(203, 92, 255);">login to continue</span>.</p>
    </div>
</div> -->




<?php
function showAlert($message,$error){
    if($error){
        echo '<div class="custom-alert-box" id="alert-rem">
        <div class="alert-content">
            <ion-icon class="clsbtn"  id="clsbtn" name="close-circle-outline"></ion-icon>
            <p class="heading-err">Sorry Failed To Create Account</p>
            <p class="message">'.$message.'</p>
        </div>
    </div>';
    }else{
        echo '<div class="custom-alert-box" id="alert-rem">
        <div class="alert-content">
            <ion-icon class="clsbtn"  id="clsbtn" name="close-circle-outline"></ion-icon>
            <p class="heading">Account Created Succesfully</p>
            <p class="message">You have successfully created your account on securenote please <span style="color:rgb(203, 92, 255);">login to continue</span>.</p>
        </div>
    </div>';
    }
}
?>


<!------------- Custom Alert Box End --------------->



<div id="removeeffect" class="removeeffect">
</div>
<div class="toggle-mode">
    <div class="modebar" id="tmode">
        <div class="ball" id="iconval"><ion-icon name="moon-outline"></ion-icon></div>
    </div>
</div>


<ion-icon class="des1" name="cog-outline"></ion-icon>
<ion-icon class="des2" name="cog-outline"></ion-icon>
<ion-icon class="des3" name="cog-outline"></ion-icon>

<div class="form-container" id="formContent">
    <div class="logo">
        Secure<span style="color:rgb(193, 58, 255)">Note</span>
    </div>
    <div class="input-details">
        <p>SignIn to create Account</p>

        <form action="/loginsystem/signup.php" method="post" autocomplete="off">

            <div class="inp_content" id="inp_con">

                <div class="username_inp">
                    <ion-icon  id="user" name="person"></ion-icon>

                    <input type="text" name="username" id="username" placeholder="Username"/>
                </div>

                <div class="email_inp">
                    <ion-icon id="person" name="mail"></ion-icon>

                    <input type="email" name="email" id="email" placeholder="Email"/>
                </div>

                <div class="pass_inp">
                    <ion-icon  id="lock" name="lock-closed"></ion-icon>

                    <input type="password" name="pass" id="pass" placeholder="Password"/>
                </div>

                <div class="con_pass_inp">
                    <ion-icon  id="conlock" name="lock-closed"></ion-icon>

                    <input type="password" name="conpass" id="conpass" placeholder="Confirm Password"/>
                </div>

                <div class="phone_inp">
                    <ion-icon id="phone" name="call"></ion-icon>

                    <input type="text" name="inpnumber" id="number" placeholder="Phone ( 12-digit )"/>
                </div>

                
                <div class="btn_inp" >
                    <button id="btnsub" type="submit">Create</button>
                </div>

                <div class="signin">
                    Already have an account ?<a href="./login.php"> Sign In</a>
                </div>
            </div>
        </form>
    </div>
</div>
    


<!----------- Bootstrap JS --------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!-----------Custom JS ------------->
<script src="./js/signup.js"></script>
</body>
</html>