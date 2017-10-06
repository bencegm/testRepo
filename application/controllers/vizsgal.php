<?php
$fnevError = $emailError = $emailconfError = $jelszoError = $jelszoconfError = $aszfError = "";
$fnev      = $email = $emailconf = $jelszo = $jelszoconf = $aszf = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['fnev']) && !empty($_POST['fnev']) && $_POST['fnev'] == eltavolit($_POST['fnev']) && preg_match('/^[a-zA-Z]{3,40}$/', $_POST['fnev'])) {
        $username = $_POST['fnev'];
    } else {
        $fnevError = "Hibás felhasználónév!";
    }
    if (isset($_POST['email']) && !empty($_POST['email']) && $_POST['email'] == eltavolit($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $emailError = "Hibás email";
    }
    if (isset($_POST['emailconf']) && !empty($_POST['emailconf']) && $_POST['email'] == eltavolit($_POST['emailconf']) && filter_var($_POST['emailconf'], FILTER_VALIDATE_EMAIL)) {
        $emailconf = $_POST['emailconf'];
    } else {
        $emailError = "Hibás email";
    }
    if (isset($_POST['jelszo']) && $_POST['jelszo'] != $_POST['fnev'] && !empty($_POST['jelszo']) && $_POST['jelszo'] == eltavolit($_POST['jelszo']) && preg_match('/^[a-zA-Z]$/', $_POST['jelszo']) && strlen($_POST['jelszo'] < 8)) {
        $jelszo = $_POST['jelszo'];
        $hash   = password_hash($jelszo, PASSWORD_BCRYPT);
    } else {
        $jelszoError = "Hibás jelszó";
    }
    if (isset($_POST['jelszoconf']) && !empty($_POST['jelszoconf']) && $_POST['jelszoconf'] == eltavolit($_POST['jelszoconf']) && preg_match('/^[a-zA-Z]$/', $_POST['jelszoconf']) && strlen($_POST['jelszoconf'] < 8)) {
        $jelszoconf = $_POST['jelszoconf'];
    } else {
        $jelszoError = "Hibás jelszó";
    }
    if (isset($_POST['aszf']) && !empty($_POST['aszf'])) {
        $aszf = $_POST['aszf'];
    } else {
        $aszfError = "Fogadd el";
    }
}

   function eltavolit($str){

    	$str = trim($str);
    	$str = strip_tags($str);
    	$str = stripslashes($str);
    	return $str;
    }
   ?>
