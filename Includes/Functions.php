<?php


function RetrieveReviews()
{

    $conn = $dbcon = new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');
    if($conn->connect_error)
    {
        echo $conn->connect_error;
    }

    $sql = "SELECT * FROM testimonals WHERE status='Accepted' ORDER BY RAND();";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $review = $row["testimonal"];
            $by = $row["review_by"];
            echoReview($review, $by);
        }
    } else
    {
        die($conn->error);
    }
}

function echoReview($t, $b)
{
    echo "
        <div class='carousel-item'>
            <p class='testText'>$t</p>
            <p class='testBy'>- $b</p>
        </div>
    ";
}

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

 ?>
