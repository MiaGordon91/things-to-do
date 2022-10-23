<?php

$host = "localhost";
$dbname = "todolist";
$username = "root";
$password = "";

$error = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {

    die("Could not connect: " . mysql_connect_error());
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['task_input'])) {
        $task = $_POST['task_input'];
        $sql = "INSERT INTO Tasks (task) VALUES ('$task')";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }   
}



