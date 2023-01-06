<?php

$host = "localhost";
$dbname = "todolist";
$username = "root";
$password = "";

$error = "";

// create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {

    die("Could not connect: " . mysql_connect_error());
}


// adds new record to the database
if (isset($_POST['submit'])) {
    if (!empty($_POST['task_input'])) {
        $task = $_POST['task_input'];
        $sql = "INSERT INTO Tasks (task) VALUES ('$task')";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }   
}




// Deleting record from database
if (isset($_GET['id'])) {
    $sql = "DELETE FROM Tasks WHERE TaskId='". $_GET['id']."'";
    $_SESSION['message'] = 'test';
    if($sql) {
        mysqli_query($conn, $sql);

        $_SESSION['status'] = "Your task has been successfully deleted";
    
    } else {
        echo "Error deleting record";
    }
}

    
?>




