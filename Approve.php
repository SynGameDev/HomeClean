<?php
// include_once('Includes/Functions.php');
$id = "";

$conn = $dbcon = new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');
if($conn->connect_error)
{
    die($conn->connect_error);
}

if(isset($_GET["id"]))
{
    $id = input($_GET["id"]);

    $sql = "UPDATE testimonals SET status='Approved' WHERE id='$id'";

    if($conn->query($sql) === TRUE)
    {
        echo "<a href='index.php'><button class='btn btn-primary'>Approved!</button></a>";
    } else
    {
        die($conn->error);
    }
} else
{
    echo "<script>window.location.href='index.php';</script>";
}



function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
