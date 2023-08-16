<html>
    <head>
    </head>
<body>
    <div header>
        MiniBlog
    </div>
    <h3>Registration</h3>
        <div class="main-section">
            <form method=POST action="">
                <div class="container">
                    <div class="forms">
                        <Label><h2>See the Registration Rules</h2></Label>
                    </div>
                    <div class="forms">
                        <label for="first" required>Enter Username:</label>
                        <input class="first" type="text" name=user required placeholder="Enter Username" required>
                    </div>
                    <div class="forms">
                        <label for="first" required>Enter Email:</label>
                        <input class="first" type="text" name=email placeholder="Enter Email" required/>
                    </div>
                    <div class="forms">
                        <label for="first" required>Enter Password:</label>
                        <input class="first" type="text" name=password placeholder="Enter Password" minlength="6"/>
                    </div>
                    <div class="forms">
                        <label for="first" required>Confirm Password:</label>
                        <input class="first" type="text" name=conpass placeholder="Confirm Password" minlength="6"/>
                    </div>
                </div>
                <!-- for Login and Register -->
                        <div class="button-container">
                            <button type="submit" name=sub>Register</button><br>
                            Return to the <a href="Index.php">LOGIN PAGE</a>
                        </div>
            </form>
        </div>
</body>

<?php
include "config.php";

if(isset($_POST['sub'])){
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpass = $_POST['conpass'];

    if ($password != $conpass){
        ?>
            <script>
                alert("The passwords are not the same");
            </script>
        <?php
        header("refresh:0;url=Register.php");
    }else{
        $sql = "INSERT INTO register(USERNAME,EMAIL,PASSWORD,CON_PASS) values('$user','$email','$password','$conpass')";
        
            if($conn->query($sql) == TRUE){
                ?>
                <script>
                    alert("Account Created, Please Login!");
                </script>
                <?php
                header("refresh:0;url=Index.php");
            }else {
                echo $conn->error;
            }
    }
}

?>