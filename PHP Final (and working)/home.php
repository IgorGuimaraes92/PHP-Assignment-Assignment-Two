<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['name']; ?>! Upload your car data and images here.</h1>

    <form method="POST" action="create_car.php">
        Maker: <input type="text" name="maker" required><br>
        Model: <input type="text" name="model" required><br>
        Year: <input type="number" name="year" required><br>
        Color: <input type="text" name="color" required><br>
        Price: <input type="number" step="0.01" name="price" required><br>
        <input type="submit" value="Create Car Input">
    </form>

    <form action="view_cars.php">
        <input type="submit" value="View Data">
    </form>

    <form action="upload_image.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="name">Name : </label>
        <input type="text" name="name" id = "name" required value=""> <br>
        <label for="image">Image : </label>
        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
        <button type = "submit" name = "submit">Submit</button>
    </form>

    <form action="view_images.php">
        <input type="submit" value="View Uploaded Images">
    </form>

    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>

    <footer style="
        width: 100%;
        background-color: rgba(128, 128, 128, 0.5); /* Translucent gray */
        color: white;
        text-align: right;
        padding: 10px;
        margin-top: 10px;
    ">
        Igor Guimarães 200540189
    </footer>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
?>