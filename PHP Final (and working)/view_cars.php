<?php 
session_start();

include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

    $userId = $_SESSION['id'];

    $sql = "SELECT * FROM cars WHERE user_id = '$userId'";

    $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Your Cars</h1>
     <a href="logout.php">Logout</a>

     <?php 
     if(mysqli_num_rows($result) > 0){
         while($car = mysqli_fetch_assoc($result)) { 
     ?>
     <div>
         <h2><?php echo $car['maker'] . ' ' . $car['model']; ?></h2>
         <p>Year: <?php echo $car['year']; ?></p>
         <p>Color: <?php echo $car['color']; ?></p>
         <p>Price: <?php echo $car['price']; ?></p>
     </div>
     <?php
         }
     } else {
         echo 'No cars found.';
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