<?php

$conn =  new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');

if($conn->connect_error)
{
    die($conn->connect_error);
}

$id = input($_GET["id"]);

$sql = "UPDATE testimonals SET status='Approved' WHERE id='$id'";
if($conn->query($sql) === TRUE)
{
    echo "<script>window.location.href = 'wip.homecleansolutions.com.au'";
}

?>
