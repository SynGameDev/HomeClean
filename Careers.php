<?php

$name = $email = "";

if(isset($_POST["send"]))
{

    $name = input($_POST["name"]);
    $email = input($_POST["email"]);
    $pathname = str_replace(' ', '_', $name);
    mkdir($pathname);
    $tar_dir = $pathname . "/";
    $tar_cv = $tar_dir . basename($_FILES['cv']['name']);
    $tar_re = $tar_dir . basename($_FILES["res"]['name']);
    $uploadOk = 1;
    // $fileType = strtolower(pathinfo($tar_file, PATHINFO_EXTENSION));

    if($_FILES["cv"]["size"] > 50000 && $_FILES['res']['size'] > 50000)
    {
        echo "<script>alert('Files Is To Large');</script>";
        $uploadOk = 0;
    }

    if($uploadOk == 1)
    {
        if(move_uploaded_file($_FILES["cv"]["tmp_name"], $tar_cv) && move_uploaded_file($_FILES['res']['tmp_name'], $tar_re))
        {
            $subject = 'Job Application | ' . $name;
            $emailto = 'K.A.Miller@outlook.com';
            $headers = 'From: ' . $email . "\r\n";

            $msg = "
            <html>
            $name has submitted a job application please view files below <br />
            wip.homecleansolutions.com.au/$tar_dir
            </html>
            ";
            mail($emailto, $subject, $msg, $headers);
            echo "<script>alert('Application Has Been Sent');</script>";
        } else {
            echo "<script>alert('Error Uploading your application');</script>";
        }
    }



}

function input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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

    <title>HomeClean Solutions</title>
<meta name="Description" content="HomeClean Solutions services a large variety of clients throughout the northern suburbs of Australia and have enjoyed continuous organic growth each and every year since we were founded.">
<meta name="Keywords" content="HomeClean, HomeClean Solutions, Cleaning, House Cleaning, Northern Suburbs">
  </head>
  <style>
    .footer {
        margin-top: 275px;
    }
  </style>
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
            <form method='post' action='<?php echo $_SERVER["PHP_SELF"]; ?>' enctype="multipart/form-data">
                <div class='form-group'>
                    <input type='text' class='form-control' name='name' placeholder='Full Name' required />
                </div>
                <div class='form-group'>
                    <input type='email' class='form-control' name='email' placeholder='Email' required />
                </div>
                <div class='form-group'>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='cv' name='cv' />
                        <label class='custom-file-label' for='cv'>Upload Cover Letter</label>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='resume' name='res' />
                        <label class='custom-file-label' for='resume'>Upload Resume</label>
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
