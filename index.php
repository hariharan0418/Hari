<?php
    include("database.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    
    
    <div class="container">
        <form action="index.php" method="post">    
        
        <h1>Login</h1>

        <div class="input">
        <input type="text" id="input1" placeholder="name" name="name" required>
        <box-icon type='solid' name='user'></box-icon>
        </div>

       <div class="input">
       <input type="password"  id="input1" placeholder="password" name="password" required
       >
       </div>

       <div class="box">
        <input type="checkbox">remember
        <a href="#" id="fn">forget password?</a>
       </div>   

       <div class="btn">
        <input type="submit" name="login" value="login">
       </div>
       <div class="page">
       <p>Don't have an account? <a href="" id="hi">register</a></p>
       </div>
            
     </form>
    </div>
    
</body>
</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $name = filter_input(INPUT_POST, "name" ,FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password" ,FILTER_SANITIZE_SPECIAL_CHARS);
 
      $hash = password_hash($password,PASSWORD_DEFAULT);
      $sql = "INSERT INTO resgisteration (user ,password)
          VALUES ('$name','$password')";

      try{
      mysqli_query($conn, $sql);
      header("location: view.php");
      }
      catch(mysqli_sql_exception){
        echo '<script>alert("that username already taken")</script>';
      }
    }

      mysqli_close($conn);
  
?>    
      
