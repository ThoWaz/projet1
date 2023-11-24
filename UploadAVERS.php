<?php
    session_start();

  if (isset($_POST["uploadavers"])){

    $message = "";
    $_SESSION["message_avers"] = $message;

   
    $currentDirectory = getcwd();
    $uploadDirectory = "/uploads/";

    // les formats autorisés
    $fileExtensionsAllowed = ["jpeg","jpg","png"]; 
   
    $fileName = $_FILES["AversUpload"]["name"];
    $fileSize = $_FILES["AversUpload"]["size"];
    $fileTmpName  = $_FILES["AversUpload"]["tmp_name"];
    $fileType = $_FILES["AversUpload"]["type"];
    $fileError = $_FILES["AversUpload"]["error"];

    $tmp = explode(".", $fileName);
    $fileExtension = strtolower(end($tmp));


    if (in_array($fileExtension,$fileExtensionsAllowed)) {
        if ($fileError === 0){
            if ($fileSize > 4000000){
              $message = "Your file is too big!";
              $_SESSION["message_avers"] = $message;
              header("Location: index.php");
            } else{
              $fileNameNewA = uniqid("A-", false). "." . $fileExtension;
              $fileDestination = $currentDirectory . $uploadDirectory . $fileNameNewA;
              move_uploaded_file($fileTmpName, $fileDestination);
              $message = "Upload successful!";
              $_SESSION["message_avers"] = $message;
              header("Location: index.php");
            }
        } else {
          $message = "Upload failed : Please upload a JPG or PNG file under 4MB";
          $_SESSION["message_avers"] = $message;
          header("Location: index.php");
        }
    } else {
      $message = "Please upload a JPG or PNG file";
      $_SESSION["message_avers"] = $message;
      header("Location: index.php");
    }

  } else {
   $message = "Upload failed : Please upload a JPG or PNG file under 4MB";
   $_SESSION["message_avers"] = $message;
   header("Location: index.php");
  }
?>