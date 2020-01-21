<!DOCTYPE  html>
<html>
 <head>
  <title>login form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <?php 
   $con = mysqli_connect("localhost","root","","logindb");
   if(isset($_POST['log']))
   {
       $username= mysqli_real_escape_string($con,$_POST['email']);
       $passwd= mysqli_real_escape_string($con,$_POST['password']);
       if($username!="" && $passwd!="")
       {
           $sql = "SELECT id FROM login WHERE username='$username' and passwd='$passwd'";
           $result = mysqli_query($con,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $count = mysqli_num_rows($result);
           if($count==1)
           {
               header("location: index.html");
           }
       }
   }
   ?>
 </head>
 <body>
  <form class="" action="login.php" method="post">
   <div class="container">
    <label  for="">Sign up</label>
    <input type="text" name="email" placeholder="Email" value="">
    <input type="password" name="password" placeholder="Password" value="">
    <a href="#">Forgot Password?</a>
    <button type="submit" class="btn" name="log">Login</button>
   </div>
  </form>
 </body>
</html>
