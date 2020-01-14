<?php
include_once('Functions.php');

$name = $email = $query = $data = "";

$emailto = "homecleansolutions71@gmail.com";

$conn = new mysqli('localhost', 'root', '', 'hcs');
if($conn->connect_error)
{
    echo $conn->connect_error;
}

if(isset($_POST["send"]))
{
    $name = input($_POST["name"]);
    $email = input($_POST["email"]);
    $query = input($_POST["query"]);
    $data = input($_POST["data"]);

    $emailto = "homecleansolutions71@gmail.com";

    switch($query)
    {
        case "review":

    }
}


function review($n, $e, $q, $d)
{
    $conn = new mysqli('localhost', 'root', '', 'hcs');
    if($conn->connect_error)
    {
        echo $conn->connect_error;
    }
    $sql = "INSERT INTO testimonals (testimonals, from, status) VALUES ('$d', '$n', 'New')";
    if($conn->query($sql) === TRUE)
    {
        $subject = "Review";
        $msg = "
        From: $n <br />

        Review: <br />
        $d
        ";

        $headers = "From: $e" . "\r\n";
        mail($emailto, $subject, $msg, $headers);
    }
}

?>
