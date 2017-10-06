<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   ?><!DOCTYPE html>
<html lang="hu">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <script>
         function checkForm() {
         var nev = document.forms["reg"]["fnev"].value;
         if (nev == "") {
         alert("Töltsd ki a név mezőt!");
         return false;
         }

         var email = document.forms["reg"]["email"].value;
         if (nev == "") {
         alert("Töltsd ki az email mezőt!");
         return false;
         }

         var jelszo = document.forms["reg"]["jelszo"].value;
         if (nev == "") {
         alert("Töltsd ki a jelszó mezőt!");
         return false;
         }
         }
      </script>
   </head>
   <body>
      <div class="container" >
      <div class="row">
         <div class="col-md-6" >
            <?php include 'vizsgal.php' ?>
            <form action="sikeres.php" method="post" name="reg" class="form-horizontal" onsubmit="return checkForm()">
               <h1>Személyes adataid:</h1>
               <div class="form-input" >
                  <label>Felhasználónév</label>
                  <input type="text" name="fnev" class="form-control" >
               </div>
               <br>
               <div class="form-input" >
                  <label>E-mail cím</label>
                  <input type="email" name="email" class="form-control">
               </div>
               <br>
               <div class="form-input" >
                  <label>E-mail cím megerősítése</label>
                  <input type="email" name="emailconf" class="form-control">
               </div>
               <br>
               <h1>Jelszavad</h1>
               <div class="form-input" >
                  <label>Jelszó</label>
                  <input type="password" name="jelszo" class="form-control">
               </div>
               <br>
               <div class="form-input" >
                  <label>Jelszó megerősítése</label>
                  <input type="password" name="jelszoconf" class="form-control">
               </div>
               <br>
               <h1>ÁSZF</h1>
               <label>Az ÁSZF-t elolvastam, megértettem, és elfogadom!</label>
               <input type="radio" name="aszf"/>
               <br>
               <input type="submit" value="REGISZTRÁLOK" href="sikeres.php" class="btn btn-info" name="kuld" />
            </form>
         </div>
         <div class="row" >
            <div class="col-md-6" >
               <p>Fontos Információ</p>
               <br>
               <p>A *-al jelölt mezők kitöltése kötelező!</p>
               <p>Azt a felhasználónevet add meg, amivel a MesterMC-nél szeretnél játszani!</p>
            </div>
         </div>
         <div>
         </div>
      </div>
   </body>
</html>
<?php
   $con = mysqli_connect("","","","");

   if (mysqli_connect_errno())

   	{

   	echo "Hiba a kapcsolatba" . mysqli_connect_error();

   	}
   mysqli_set_charset($con,"utf8");

   if(isset($_POST['kuld']))
   {

   			 $sql = "INSERT INTO pannora (fnev,email,jelszo) VALUES('".$_POST['fnev']."', '".$_POST['email']."', $hash";


   	 if(mysqli_query($con, $sql)){
   		 echo "sikeres feltöltés";
   }
   	 else{
   		 echo "sikertelen";
   }
   	 mysqli_close($con,$sql);
   }
   	 ?>
