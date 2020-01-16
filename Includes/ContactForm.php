<?php
include_once('Functions.php');
include_once('config.php');

$name = $email = $query = $msg = "";

if($conn->connect_error)
{
    echo $conn->connect_error;
}

if(isset($_POST["send"]))
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
    $conn =  new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');

    $sql = "INSERT INTO testimonals (testimonal, review_by, status) VALUES ('$msg', '$name', 'Pending')";

    $subject .= " | " . $name;
    $headers = "From: $email" . "\r\n";
    if($conn->query($sql) === TRUE)
    {
        $id = $conn->insert_id;

        $e = "
        $msg <br /> <br />

        <a href='wip.homecleansolutions.com.au/Approve.php?id=$id'>Approve Review</a>
        "
        $emailto = "homecleansolutions71@gmail.com";
        mail($emailto, $subject, $msg, $headers);
        echo "<div class='alert alert-success' style='position:absolute;'>Email Sent</div>"
    } else
    {
        die($conn->error);
    }
}

function quote($name, $subject, $email, $msg)
{
    $conn =  new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');
    $subject = "QUOTE | " . $name;
    $headers = "From: $email" . "\r\n";

    $emailto = "homecleansolutions71@gmail.com";
    mail($emailto, $subject, $msg, $headers);
    echo "<div class='alert alert-success' style='position:absolute;'>Email Sent</div>"

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
