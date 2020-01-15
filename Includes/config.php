<?php

$dbcon = new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut')

if($dbcon->connect_error)
{
    die($dbcon->connect_error);
}

?>
