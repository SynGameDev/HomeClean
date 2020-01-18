<?php
include_once('Includes/Functions.php');
$id = "";

$conn = $dbcon = new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');

if(isset($_GET["id"]))
{
    $id = input($_GET["id"]);           // Get ID from URL

    $sql = "UPDATE testimonals SET status='Approved' WHERE id='$ud'";

    if($conn->query($sql) === TRUE)
    {
        echo "<script>window.location.href='wip.homecleansolutions.com.au';</script>";
    } else
    {
        die($conn->error);
    }
}

?>
