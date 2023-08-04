<?php 
session_start();

include "connection.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    $userId = $_SESSION['id'];

    $sql = "SELECT * FROM tb_upload WHERE user_id = '$userId'";

    $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>View Uploaded Images</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Your Uploaded Images</h1>
     <a href="logout.php">Logout</a>

     <?php 
     if(mysqli_num_rows($result) > 0){
         while($image = mysqli_fetch_assoc($result)) { 
     ?>
     <div>
         <h2><?php echo $image['name']; ?></h2>
         <img src="img/<?php echo $image["image"]; ?>" width="200" title="<?php echo $image['name']; ?>">
     </div>
     <?php
         }
     } else {
         echo 'No images found.';
     }
     ?>

     <a href="home.php">Back</a>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
?>