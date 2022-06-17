<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './partials/_dbconnect.php';
    $error = false;
    $message = "";

    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);

    if($num == 1){

        $error  = false;
        showAlert($message,$error);

    }else{
        $showError = "Invalid Credentials";
    }

    if($num > 0){
        while($row = mysqli_fetch_assoc($result)){

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
    <title>Login Page</title>

    <!----------- Bootstrap CSS ---------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!------------ Icon Script ----------->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-------------  Custom CSS ---------->
    <link rel="stylesheet" href="./css/login.css">

</head>

<body id="main">


<!-------------- Custom Alert Box Start  ----------->

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
        <p>Login in your Account</p>

        <form action="/loginsystem/login.php" method="post" autocomplete="off">

            <div class="inp_content" id="inp_con">

                <div class="email_inp">
                    <ion-icon id="person" name="person"></ion-icon>
                    <input type="text" name="username" id="email" placeholder="Username"/>
                </div>

                <div class="pass_inp">
                    <ion-icon  id="lock" name="lock-closed"></ion-icon>
                    <input type="password" name="pass" id="pass" placeholder="Password"/>
                </div>

                <div class="btn_inp">
                    <button id="btnsub" type="submit">Continue</button>
                </div>

                <div class="fog_pass">
                    <a href="#">forget password?</a>
                </div>

                <div class="signup">
                    Dont have an account ?<a href="./signup.php"> Create one</a>
                </div>
            </div>
        </form>
    </div>
</div>
    


<!----------- Bootstrap JS --------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!-----------Custom JS ------------->
<script src="./js/login.js"></script>
</body>
</html>