<?php
// include_once('Functions.php');

$name = $email = $query = $msg = "";


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
            email($name, $email, $query, $ms, "Quote");
            break;
        case "general":
            email($name, $email, $query, $ms, "General Enquiry");
            break;
        case "cleaning":
            email($name, $email, $query, $ms, "Cleaning Tips");
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


function email($name, $subject, $email, $msg, $type)
{
    $conn =  new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');
    $email to "syndicategamedev@gmail.com";
    $headers = "From: $email" . "\r\n";

    $subject = $type . " | " . $subject;            // Set the subject
    mail($emailto, $subject, $msg, $headers);
    //  TODO: Email sent
}



?>
