<?php


$host = "localhost";
$port = 8889;
$dbname = "texnologies_diadiktiou_db";
$db_username = "root";
$db_password = "root";
$socket = '/Applications/MAMP/tmp/mysql/mysql.sock';

$conn = mysqli_connect($host, 
$db_username, 
$db_password, 
$dbname, 
$port, 
$socket);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

echo "<script>console.log('Connection Successful');</script>";

if(isset($_POST['submit'])){
$username= $_POST["username"];
$password = $_POST["password"];

$sql = "select * from user_data where username = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count==1){
    header("Location: index.html");
}
else{
    echo "<script>console.log('No match!');</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sidenav.css" />
    <link rel="stylesheet" href="theme.css" />
    <link rel="stylesheet" href="buttons.css" />
    <link rel="stylesheet" href="register.css" />
    <script defer src="theme.js"></script>
    <script src="demo_defer.js" defer></script>
</head>

<body>

    <div class="mode-tog"></div>

    <div class="dark-mode-container">
      <div class="dark-mode"></div>
    </div>
    
    <nav class="sidenav">
      <a href="index.html" class="logo-link">
        <img class="logo" src="Images/logo.png" alt="logo" />
      </a>
    </nav>

    <section class="wrapper-main">
        <form class="register-form" method="post">
            <label for="username">ΟΝΟΜΑ ΧΡΗΣΤΗ</label>
            <input type="username" id="username" name="username">
            <label for="password">ΚΩΔΙΚΟΣ</label>
            <input type="password" id="password" name="password">
            <button id="submit-button" class="buttons" type="submit" value="login" name="submit">ΥΠΟΒΟΛΗ</button>
        </form>
    </section>
    
</body>


</html>