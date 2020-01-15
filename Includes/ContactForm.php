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
            review($name, $email, $query, $data);
            break;
        case "general":
            generarl();
            break;
        case "quote":
            quote();
            break;
        case "cleaning":
            tips();
            break;
        default:
            echo "ERROR";
            break;

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
        $linkid = $conn->insert_id;
        $subject = "Review";
        $msg = "
        From: $n <br />

        Review: <br />
        $d

        <br />
        APPROVE: http://127.0.0.1/hcs/Approve.php?id=$linkid
        ";

        $headers = "From: $e" . "\r\n";
        mail($emailto, $subject, $msg, $headers);
    }
}

function general($n, $e, $q, $d)
{
    $from = $e;
    $name = $n;
    $question = $d;
    $subject = "General Query | $name";
    $msg = $d;
    $headers = "From: $from" . "\r\n";

    mail($emailto, $subject, $msg, $headers);
}

function quote($n, $e, $q, $d)
{
    $msg = $d;
    $headers = "From: $from" . "\r\n";
    $subject = "Quote | $name";
    mail($emailto, $subject, $msg, $headers);
}

function tips($n, $e, $q, $d)
{
    $msg = $d;
    $headers = "From: $from" . "\r\n";
    $subjet = "Tips | $name";
    mail($emailto, $subject, $msg, $headers);
}

?>
