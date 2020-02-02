<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- ICON -->
    <link rel="icon" href="/Images/Icon.png" />

    <!-- Stylesheets -->
    <link rel='stylesheet' href='Styles/Main.css' />
    <link rel='stylesheet' href='Styles/About.css' />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/709e063d76.js" crossorigin="anonymous"></script>

    <title>HomeClean Solutions</title>
<meta name="Description" content="HomeClean Solutions services a large variety of clients throughout the northern suburbs of Australia and have enjoyed continuous organic growth each and every year since we were founded.">
<meta name="Keywords" content="HomeClean, HomeClean Solutions, Cleaning, House Cleaning, Northern Suburbs">
  </head>
  <body>

      <?php include_once('Includes/top-header.php'); ?>

    <!-- Navigation -->
    <?php include_once('Includes/nav.php'); ?>

    <div class='jumbotron jumbotron-fluid'>
        <p class='about-section'>
            HomeClean Solutions are a  well established domestic and commercial cleaning company with an outstanding reputation for quality, integrity and attention to detail.  Proudly privately owned and in operation since 2018, HomeClean Solutions provide a range of  quality services customised specifically to the requirements of each of our valued customers.


    We are proud of our reputation and unrivalled customer retention rate, both of which can be attributed to a solid foundation built on consistently delivering a high standard of service and value for money.
        </p>
    </div>

    <!-- testimonials --> <!-- TODO: Make Mobile Friendly -->
    <div id="carousel" class="carousel slide" data-ride="carousel" style='text-align:center;'>
        <?php

            $conn = $dbcon = new mysqli('localhost', 'u577142979_HCS_DB_Admin', 'MotherDuck@70', 'u577142979_HomeCleanSolut');
            if($conn->connect_error)
            {
                echo $conn->connect_error;
            }

            $sql = "SELECT * FROM testimonals WHERE status='Approved' ORDER BY RAND();";
            $res = $conn->query($sql);
            if($res->num_rows > 0)
            {
                while($row = $res->fetch_assoc())
                {
                    $review = $row["testimonal"];
                    $by = $row["review_by"];
                    echo "<p>" . $review . "</p>";
                    echo "<p>" . $by ."</p>";
                    echo "<hr class='my-4' />";
                }
            } else {
                echo "No Rows";
            }

        ?>
    </div>

    <!-- Footer -->
    <?php include_once('Includes/Footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
