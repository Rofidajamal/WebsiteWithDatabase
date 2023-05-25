<?php
include "\db.php";

$userName = $_POST['username'];
$Email = $_POST['email'];
$pass = $_POST['pass'];


$sql = "INSERT INTO users (password, userName, Email, Gene_id)
VALUES ('$pass','$userName','$Email','2')";


if ($conn->query($sql) === TRUE) {
    header("Location:/main.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>