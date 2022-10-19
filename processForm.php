<?php

$task = $_POST['task'];

if (!$task)
{
    die("A task must be entered");
}

var_dump($task);

$host = "localhost";
$dbname = "todolist";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {

    die("Could not connect: " . mysql_connect_error());
}

echo "Connected successfully";



