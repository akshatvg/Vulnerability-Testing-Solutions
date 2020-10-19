<!DOCTYPE html>
<html>

<head>
   <title>XSS 3</title>
   <link rel="shortcut icon" href="../Resources/hmbct.png" />
   <link rel="stylesheet" href="../Resources/button.css">
</head>

<body style="background: #2F3FB0; color: white;">

   <div style="background-color:#ffffff;color: #037BFE;border-radius: 30px;box-shadow: 0 0 1px 1px gray;padding: 10px;">
      <button type="button" name="homeButton" onclick="location.href='../homepage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Home Page</button>
      <button type="button" name="mainButton" onclick="location.href='xssmainpage.html';" class="button" style="margin-top: 30px;margin-bottom: 30px;">Main Page</button>
   </div>

   <div align="center">
      <form method="GET" action="" name="form">
         <p>Your name:<input type="text" name="username"></p>
         <button type="submit" name="submit" value="Submit" class="button" style="margin-top: 30px;margin-bottom: 30px;">Submit</button>
      </form>
   </div>
   <!-- <audio src/onerror=alert(1)> -->
   <?php
   if (isset($_GET["username"])) {
      $user = preg_replace("/<(.*)[S,s](.*)[C,c](.*)[R,r](.*)[I,i](.*)[P,p](.*)[T,t]>/i", "", $_GET["username"]);
      echo "Your name is " . "$user";
   }
   ?>


</body>

</html>