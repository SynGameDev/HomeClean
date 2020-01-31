<?php

$name = $email
?>
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
    <link rel='stylesheet' href="Styles/Contact.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/709e063d76.js" crossorigin="anonymous"></script>

    <title>LANDING | HOMECLEANSOLUTIONS</title>
  </head>
  <body>
      <?php include_once('Includes/top-header.php'); ?>

    <!-- Navigation -->
    <?php include_once('Includes/nav.php'); ?>

    <?php
    if(isset($svrmsg))
    {
        echo $svrmsg;
    }
     ?>
    <div class="form">
        <div class='content-form'>
            <form method='post' action='<?php echo $_SERVER["PHP_SELF"]; ?>'>
                <div class='form-group'>
                    <input type='text' class='form-control' name='name' placeholder='Full Name' required />
                </div>
                <div class='form-group'>
                    <input type='email' class='form-control' name='email' placeholder='Email' required />
                </div>
                <div class='form-group'>
                    <select name='query' class='form-control' id='query'>
                        <option selected disabled>--- Select a query ---</option>
                        <option value='review'>Leave a Review</option>
                        <option value='quote'>Get a Quote</option>
                        <option value='general'>General Question</option>
                        <option value='cleaning'>Cleaning Tips</option>
                    </select>
                </div>
                <div class='form-group'>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='cv' />
                        <label class='custom-file-label' for='cv'>Upload</label>
                    </div>
                </div>
                <div class='form-group'>
                    <button type='submit' name='send' class='btn btn-primary'>Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include_once('Includes/Footer.php'); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src='Scripts/Main.js'></script>
  </body>
</html>
