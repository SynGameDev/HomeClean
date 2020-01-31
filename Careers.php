<?php

if(isset($_POST["send"]))
{
    /*
    $name = $_POST['name'];
    $email = $_POST['email'];
    $newPath = str_replace(" ", "_", $name);            // Replace space with underscore
    mkrdir("uploads/" . $newPath, 0700);
    $pathName = "uploads/" . $newPath;          // Location of files will be uploaded // TO

    $subject = 'Career | ' . $name;
    $emailto = 'syndicategamedev@gmail.com';
    $headers = "From: " . $email . "\r\n";
    // TODO: Upload Files
    $file_name = $_FILES["upload"]['name'];
    $file_size = $_FILES["upload"]["size"];
    $file_tmp = $_FILES["upload"]["tmp_name"];
    $files_type = $_FILES["upload"]["type"];
    $file_ext = strtolower(end(explode('.', $_FILES["upload"]["name"])));

    $ext = array("pdf", "doc", "docx");

    if(in_array($file_ext, $ext) === FALSE)
    {
        $err = "EXT NOT ALLOWED";
    }

    // TODO: Add File Size

    if($err === "")
    {
        move_uploaded_file($file_tmp, $newPath . $file_name);
        echo "<script>alert('Application Sent');</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }

    $msg = "<button><a href='wip.homecleansolutions.com.au/$newPath'>View Resume & Cover Letter</a><button>";
    mail($emailto, $subject, $msg, $headers);
    */

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
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='upload' />
                        <label class='custom-file-label' for='cv'>Upload Cover Letter</label>
                    </div>
                </div>
                <div class='form-group'>
                    <div class='custom-file'>
                        <input type='file' class='custom-file-input' id='upload' />
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
