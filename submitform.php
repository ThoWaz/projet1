<?php
 session_start();

 $_SESSION["confirmation"] = $confirmation_message;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $tel = filter_var($_POST["tel"], FILTER_SANITIZE_NUMBER_INT);
    $commentaire = htmlspecialchars($_POST["commentaire"]);
 
}

if(isset($_POST["send"])){
    $confirmation_message = "Your request has been sent! You will receive an estimation soon.";
    $_SESSION["confirmation"] = $confirmation_message;
    header("Location: index.php");

}


?>