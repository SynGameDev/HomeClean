<?php
include_once(config.php);

function RetrieveReviews()
{
    $sql = "SELECT * FROM Reviews WHERE status='Accepted' ORDER BY RAND();";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $review = $row["testimonial"];
            $by = $row["From"];
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
        <div class='carousel-inner'>
            <p class='testText'>$t</p>
            <p class='testBy'>- $b</p>
        </div>
    ";
}

 ?>
