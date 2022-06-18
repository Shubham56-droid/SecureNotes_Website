<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './partials/_dbconnect.php';
    $error = false;
    $message = "";

    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if($username == "" ||  $pass == ""){
        $error = true;
        $message = "Please fill both the details in login form";
        showAlert($message,$error);
    }
    else
    {
    /* 
        this will check weather the username matches into the database
    */
    
    $sql = "SELECT * FROM `users` WHERE `username`='$username'";

    /* 
        sql query will run 
    */
    $result = mysqli_query($conn,$sql);

    /* 
        now we will check the number of row we found for above sql query  
    */
    $num = mysqli_num_rows($result);



    /*
        now since only one crecendential can match so will check number of rows found == 1 or not
        if not then we will print error invalid credentails 
    */ 
    if($num == 1){

        while($row = mysqli_fetch_assoc($result)){

            if(password_verify($pass,$row['password'])){

                // no error got so showing successful login
                $error  = false;
                showAlert($message,$error);

                // now lets start session
                session_start();

                // here i have two varible loggedin and username which stores weather user is loggedin or not not and his username respectively

                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;


                // Now lets redirect the user to home page 
                header("location: ./home.php");
            }
            else{

                $error = true;
                $message = "Invalid Password Entered Please Re-Enter Correct Passowrd.";
                showAlert($message,$error);

            }
        }

        
    }
    else{

        $error = true;
        $message = "No Account Created With This Username. Invalid Username.";
        showAlert($message,$error);
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
            <p class="heading-err">Sorry Failed To Log in into your account</p>
            <p class="message">'.$message.'</p>
        </div>
    </div>';
    }else{
        echo '<div class="custom-alert-box" id="alert-rem">
        <div class="alert-content">
            <ion-icon class="clsbtn"  id="clsbtn" name="close-circle-outline"></ion-icon>
            <p class="heading">Logged in successfully</p>
            <p class="message">You have successfully logged into your account on secure note.</p>
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

        <form action="./login.php" method="post" autocomplete="off">

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
    

<!-----------Custom JS ------------->
<script src="./js/login.js"></script>
</body>
</html>