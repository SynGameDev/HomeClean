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

    $conn = $dbcon = new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');

    $sql = "INSERT INTO testimonals (testimonal, review_by, status) VALUES ('$msg', '$name', 'Pending')";

    $subject .= " | " . $name;
    $headers = "From: $email" . "\r\n";
    if($conn->query($sql) === TRUE)
    {
        // TODO: Add Email
        $emailto = "syndicategamdedev@gmail.com";           // Change to the relevent email
        $id = $conn->insert_id;         // Get the insert ID
        $em = "
            $msg <br /> <br />
            <a href='wip.homecleansolutions.com.au/Approve.php?id=$id'>Approve</a>
        ";
        mail($emailto, $subject, $em, $headers);
        $svrmsg = "<div class='alert alert-success' role='alert'>Email Sent</div>";
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
