<?php
include_once('Includes/Functions.php');
$id = "";

echo "Test";

$conn = $dbcon = new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');
if($conn->connect_error)
{
    die($conn->connect_error);
}

if(isset($_GET["id"]))
{
    echo $_GET["id"];
}

?>
