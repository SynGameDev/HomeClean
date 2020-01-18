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
        $emailto = "syndicategamedev@gmail.com";           // Change to the relevent email
        $id = $conn->insert_id;         // Get the insert ID
        $em = "
            $msg <br /> <br />
            <a href='wip.homecleansolutions.com.au/Approve.php?id=$id'>Approve</a>
        ";
        mail($emailto, $subject, $em, $headers);
        EmailSent();
    } else
    {
        die($conn->error);
    }
}

function quote($name, $email, $msg)
{
    $emailto = "syndicategamedev@gmail.com";
    $subject = "Quote | " . $name;
    $headers = "From: $email " . "\r\n";
    mail($emailto, $subject, $msg, $headers);
    EmailSent();
}

function general($name, $email, $msg)
{
    $emailto = "syndicategamedev@gmail.com";
    $subject = "General Query | " . $name;
    $headers = "From: $email" . "\r\n";
    mail($emailto, $subject, $msg, $headers);
    EmailSent();
}

function tips($name, $email, $msg)
{
    $emailto = "syndicategamedev@gmail.com";
    $subject = "Cleaning Tips | " . $name;
    $headers = "From: $email" . "\r\n";
    mail($emailto, $subject $msg, $headers);
    EmailSent();
    sendCustEmail('Cleaning Tips', $msg, $name, $email);
}

function EmailSent()
{
    echo "<script>alert('Email Sent');</script>";
}

function sendCustEmail($type, $query, $name, $email)
{

    $header = "From: DonNotReply@homecleansolutions.com.au" . "\r\n";
    $subject = "<DO NOT REPLY>Enquiry Confirmation";
    $msg = "
    <html>
    <head>
    <script src='https://kit.fontawesome.com/709e063d76.js' crossorigin='anonymous'></script>
    <link rel='stylsheet' type='text/css' href='wip.homecleansolutions.com.au/Styles/Main.css' />
    </head>
    <style>

    body
    {
        background-color: darkgray;
        font-family: 'Public Sans', sans-serif;
        font-size: 24px;
    }

    .wrapper {
        background: white;
        width: 75%;
        height: 90%;
        margin: 0 auto;
        maring-top: 100px;
        padding: 30px;
        border-radius: 5px;
    }

    </style>
    <body>
        <div class='wrapper'>
            <h1 style='text-align:center'>$type</h1>
            <p class='email content'>
                Hi $name, <br /> <br />

                Thanks for your enquiry. we have received it and will be in touch shortly.

                <br /> <br />
                <span stle='font-family: cursive;'>$query</span>

                <br /><br />

                Thanks,<br />
                HomeClean Solutions<br />
                <a target='_blank' href='https://www.facebook.com/Homecleansolutions-100603651300911/?__tn__=%2Cd%2CP-R&eid=ARC0Zw5FwjBYgfuOe06HSLGdb2FWNflpBaLnxqA3yUsda7zrzLdltT8qPK-tbkHgRWiV0_YRTj2H_k92' class='social-link'><i class='fab fa-facebook-square'></i></a>
                <a target='_blank' href='#twitter' class='social-link'><i class='fab fa-twitter-square'></i></a>
                <a targer='_blank' href='#insta' class='social-link'><i class='fab fa-instagram'></i></a>
                <a href='phone:0434960214' class='social-link'><i class='fas fa-phone-square-alt'></i>
        </div>
    </body>

    </html>
    ";
    mail($email, $subject, $msg, $headers);
}




?>
