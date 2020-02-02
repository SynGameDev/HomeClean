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
            email($name, $email, $msg, "Review");
            break;
        case "quote":
            email($name, $email, $msg, "Quote");
            break;
        case "general":
            email($name, $email, $msg, "General Enquiry");
            break;
        case "cleaning":
            email($name, $email, $msg, "Cleaning Tips");
            break;
    }
}

function email($name, $email, $msg, $type)
{
    $conn =  new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');
    if($conn->connect_error) { die($conn->connect_error); }     // Connection Error
    $emailto = 'syndicategamedev@gmail.com';        // TODO: Change to correct Email
    $headers = "From: " . $email . "\r\n";
// BUG Not Adding to DB
        // Check the tyype of query
    if($type == "Review") {

        $sql = "INSERT INTO testimonals (testimonal, review_by, status) VALUES ('$msg', '$name', 'Pending')";         // Query to DB
        if($conn->query($sql) === TRUE)
        {
            $id = $conn->insert_id;         // Get the insert ID
            echo "<script>alert('Email Sent!')</script>";       // TODO Test
        } else {
            echo $conn->error;
        }

        $msg = "
        $name has left a review for you to approve <br />

        $msg <br />
        <html>
        <a href='wip.homecleansolutions.com.au/Approve.php?id=$id'><button>Approve</button></a>
        </html>
        ";


    }

    echo $msg;
    echo "Test";

    $subject = $type . " | " . $name;               // Subject for the email type of query | Name of person
    mail($emailto, $subject, $msg, $headers);           // Send email
    echo "<script>alert('Thanks for enquiry, we will be in touch shortly');</script>";
}

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
