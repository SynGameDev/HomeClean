<?php
include_once('Functions.php');

$name = $email = $query = $msg = "";



$conn = new mysqli('localhost', 'root', '', 'hcs');
if($conn->connect_error)
{
    echo $conn->connect_error;
}

if(isset($_POST['send']))
{
    $name = input($_POST['name']);
    $email = input($_POST['email']);
    $query = input($_POST['query']);
    $msg = input($_POST["msg"]);

    switch($query)
    {
        case "review":
            review($name, $email, $query, $msg);
            break;
        case "quote":
            quote();
            break;
        case "general":
            general();
            break;
        case "cleaning":
            tips();
            break;
    }
}


function review($name, $email, $subject, $msg)
{

    $conn = new mysqli('localhost', 'root', '', 'hcs');         // Database connection

    $sql = "INSERT INTO testimonals (testimonal, review_by, status) VALUES ('$msg', '$name', 'Pending')";

    $subject .= " | " . $name;
    $headers = "From: $email" . "\r\n";
    if($conn->query($sql) === TRUE)
    {
        // TODO: Add Email
        $emailto = "homecleansolutions71@gmail.com";
        mail($emailto, $subject, $msg, $headers);
    } else
    {
        die($conn->error);
    }
}

function quote()
{
    echo "Quote";
}

function general()
{
    echo "General";
}

function tips()
{
    echo "Tips";
}

?>
