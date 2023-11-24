<?php
    session_start();
  if (isset($_POST["uploadrevers"])){

    $message = "";
    $_SESSION["message_revers"] = $message;

   
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";

    // les formats autorisés
    $fileExtensionsAllowed = ["jpeg","jpg","png"]; 
   
    $fileName = $_FILES["ReversUpload"]["name"];
    $fileSize = $_FILES["ReversUpload"]["size"];
    $fileTmpName  = $_FILES["ReversUpload"]["tmp_name"];
    $fileType = $_FILES["ReversUpload"]["type"];
    $fileError = $_FILES["ReversUpload"]["error"];

    $tmp = explode(".", $fileName);
    $fileExtension = strtolower(end($tmp));


    if (in_array($fileExtension,$fileExtensionsAllowed)) {
        if ($fileError === 0){
            if ($fileSize > 4000000){
              $message = "Your file is too big!";
              $_SESSION["message_revers"] = $message;
              header("Location: index.php");
            } else{
              $fileNameNewR = uniqid("R-", false). "." . $fileExtension;
              $fileDestination = $currentDirectory . $uploadDirectory . $fileNameNewR;
              move_uploaded_file($fileTmpName, $fileDestination);
              $message = "Upload successful!";
              $_SESSION["message_revers"] = $message;
              header("Location: index.php");
            }
        } else {
          $message = "Upload failed : Please upload a JPG or PNG file under 4MB";
          $_SESSION["message_revers"] = $message;
          header("Location: index.php");
        }
    } else {
      $message = "Please upload a JPG or PNG file";
      $_SESSION["message_revers"] = $message;
      header("Location: index.php");
    }

  } else {
   $message = "Upload failed : Please upload a JPG or PNG file under 4MB";
   $_SESSION["message_revers"] = $message;
   header("Location: index.php");
  }
?>