<html>
    <head>
    </head>
<body>
    <div header>
        MiniBlog
    </div>
        <div class="main-section">
            <form method=POST action="">
                <div class="container">
                    <div class="forms">
                        <label for="first" required>Enter Email:</label>
                        <input class="first" name=email type="text" required placeholder="Enter Email" >
                    </div>
                    <div class="forms">
                        <label for="first" required>Enter Password:</label>
                        <input class="first" name=password type="text" required placeholder="Enter Password" >
                    </div>
                </div>
                <!-- for Login and Register -->
                        <div class="button-container">
                            <button type="submit" name=sub>Apply now</button>
                            <a href="Register.php">Register</a>
                        </div>
            </form>
        </div>
</body>

<?php
session_start();
include "config.php";

if (isset($_POST['sub'])){
    $email=$_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM register WHERE EMAIL='$email' and PASSWORD='$pass'";
    $result = $conn->query($sql);
        
        if($result -> num_rows > 0){
            //fetching data from the database
            $found = mysqli_fetch_array($result);
            $conemail = $found['EMAIL'];
            $conpass = $found['PASSWORD'];
            $name = $found['USERNAME'];
            $_SESSION['id'] = $found['ID'];

           //successful login
                header("refresh:0;url=Timeline.php");
            
        }else{
            echo "wrong credentials";
        }
}

?>