<?php

$conn = new mysqli('localhost', 'root', '', 'hcs');
if($conn->connect_error)
{
    echo $conn->connect_error;
}

?>
