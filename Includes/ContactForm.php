<?php
include_once('Functions.php');

$name = $email = $query = $msg = "";

$emailto = "homecleansolutions71@gmail.com";

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
            review();
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


function review()
{
    echo "Review";
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
