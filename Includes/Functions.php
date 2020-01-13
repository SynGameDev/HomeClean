<?php
include_once('config.php');


function RetrieveReviews()
{

    $conn = new mysqli('localhost', 'root', '', 'hcs');
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
            $by = $row["from"];
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

 ?>
