<?php
session_start(); 
  $db = new PDO(
  'mysql:host=localhost;dbname=mesmonnaies.com;charset=utf8',
  'Thomas',
  '741963'
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesmonnaies.com</title>
</head>
<body>

<?php
// Message concernant l"upload de l"avers// 
    if (isset($_SESSION["message_avers"]) && $_SESSION["message_avers"])
    {
      printf("<b>%s</b>", $_SESSION["message_avers"]);
      
    }
?>

<form action="UploadAVERS.php" method="post" enctype="multipart/form-data">
  Upload Avers:
  <input type="hidden" name="MAX_FILE_SIZE" value="4000000">
  <input type="file" accept=".jpeg,.jpg,.png" name="AversUpload" id="AversUpload">
  <button type="submit" name="uploadavers" >Upload</button>
</form>

<?php
// Message concernant l"upload du revers // 
    if (isset($_SESSION["message_revers"]) && $_SESSION["message_revers"])
    {
      printf("<b>%s</b>", $_SESSION["message_revers"]);
      
    }
?>

<form action="UploadREVERS.php" method="post" enctype="multipart/form-data">
  Upload Revers:
  <input type="hidden" name="MAX_FILE_SIZE" value="4000000">
  <input type="file" accept=".jpeg,.jpg,.png" name="ReversUpload" id="ReversUpload">
  <button type="submit" name="uploadrevers" >Upload</button>
</form>

<form action="submitform.php" method="post">
  <label for="nom">NOM</label><br>
  <input type="text" id="nom" name="nom" required><br><br>
  <label for="prenom">PRÉNOM</label><br>
  <input type="text" id="prenom" name="prenom" required><br><br>
  <label for="email">ADRESSE EMAIL</label><br>
  <input type="email" id="email" name="email" required><br><br>
  <label for="tel">NUMERO DE TELEPHONE </label><br>
  <input type="tel" id="tel" name="tel" maxlength="16" required><br><br>
  <label for="commentaire">COMMENTAIRE FACULTATIF </label><br>
  <textarea id="commentaire" name="commentaire" maxlength="185" rows="5" cols="30"> </textarea><br><br>
  <input type="checkbox" id="contact_autorization_checkbox" name="contact_autorization_checkbox" required>
  <label for="name">J’autorise Comptoir Des Monnaies à me contacter dans le cadre de cette estimation</label><br><br>
  <button type="submit" name="send" required> Envoyer </button><br>
 
</form> 

<?php
// Confirmation d"envoi du formulaire // 
    if (isset($_SESSION["confirmation"]) && $_SESSION["confirmation"])
    {
      printf("<b>%s</b>", $_SESSION["confirmation"]);
      unset($_SESSION["confirmation"]);
    }
?>


</body>
</html>
