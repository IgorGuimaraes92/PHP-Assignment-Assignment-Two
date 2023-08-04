<?php
session_start();
include "db_conn.php";

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['maker']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['color']) && isset($_POST['price'])) {
    $maker = mysqli_real_escape_string($conn, $_POST['maker']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $sql = "INSERT INTO cars (maker, model, year, color, price, user_id) VALUES ('$maker', '$model', $year, '$color', $price, {$_SESSION['id']})";
    mysqli_query($conn, $sql);
}

header("Location: home.php");
exit();
?>