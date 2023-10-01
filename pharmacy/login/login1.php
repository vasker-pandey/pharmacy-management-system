<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Login Page</title>
    <link rel="stylesheet" href="style_login.css">
</head>
<body>
<video autoplay muted loop id="medical">
  <source src="medical.mp4" type="video/mp4">
</video>
    
    <form action="process_login.php" method="POST">
        <div class="form-header">
            <img src="logo.png" alt="logo">
            <h1>Welcome Back !</h1>
            <h3 style="color:red;">Please enter correct credentials.</h3>
        </div>
        <div class="input-container">
            <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div class="input-container">
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <div class="input-container">
            <input type="submit" value="Login">
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>