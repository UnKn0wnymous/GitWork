<?php
session_start();
include "config.php";
// so it won't be accessed if no accoung logged in
if(!isset($_SESSION['id'])){
    
    header("Location: login.php");
}
//get the USER
	$id= $_SESSION['id'];
	$sql = "SELECT * FROM register WHERE ID='$id'";
	$result=$conn->query($sql);

    if($result -> num_rows > 0){
        $found=mysqli_fetch_array($result);
        $username = $found['USERNAME'];
    }

?>

<html>
    <head>
        
    </head>
    <body>
        <h3>MiniBlog Hi <?php echo $username; ?>!! <a href="Timeline.php">Home</a> <a href="Logout.php">Log out</a></h4><br>
        <?php
         $sql = "SELECT * FROM post WHERE user_ID";
         $result = $conn->query($sql);

         if($result -> num_rows > 0){
            ?>
            <div class="main-section">
            <form method=POST action="">
                <div class="container">
                    <div class="forms">
                        <label for="first" required>Enter Email:</label>
                        <input class="first" name=email type="text" required placeholder="Enter Email" >
                    </div>
                </div>
                <!-- for Login and Register -->
                        <div class="button-container">
                            <a href="Edit.php">Edit</a>
                            <a href="Delete.php">Delete</a>
                        </div>
            </form>
            </div>
            <?php
         }
        
        ?>
        <a href="Post.php?id=<?php $id; ?>">Create New Post</a>
    </body>
</html>