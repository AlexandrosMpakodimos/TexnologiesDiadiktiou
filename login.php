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
  <title>Login Modal</title>
  <link rel="stylesheet" href="sidenav.css" />
  <link rel="stylesheet" href="theme.css" />
  <link rel="stylesheet" href="buttons.css" />
  <link rel="stylesheet" href="register.css" />
  <script defer src="theme.js"></script>
  <script src="demo_defer.js" defer></script>
  <style>
    /* Modal background */
    .modal {
      display: none; /* hidden by default */
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.6);
      justify-content: center;
      align-items: center;
    }

    /* Modal content */
    .modal-content {
      background: #fff;
      padding: 2rem;
      border-radius: 12px;
      max-width: 400px;
      width: 90%;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
      position: relative;
      animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    /* Close button */
    .close {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 1.5rem;
      cursor: pointer;
    }
  </style>
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

  <!-- Button to trigger modal -->
  <section class="wrapper-main">
    <button id="openModal" class="buttons">Log in</button>
  </section>

  <!-- Modal -->
  <div id="loginModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <form class="register-form" method="post">
        <label for="username">ΟΝΟΜΑ ΧΡΗΣΤΗ</label>
        <input type="text" id="username" name="username" required>
        <label for="password">ΚΩΔΙΚΟΣ</label>
        <input type="password" id="password" name="password" required>
        <button id="submit-button" class="buttons" type="submit" value="login" name="submit">ΥΠΟΒΟΛΗ</button>
      </form>
    </div>
  </div>

  <script>
    const modal = document.getElementById("loginModal");
    const openBtn = document.getElementById("openModal");
    const closeBtn = document.querySelector(".close");

    // Open modal
    openBtn.onclick = () => {
      modal.style.display = "flex";
    };

    // Close modal
    closeBtn.onclick = () => {
      modal.style.display = "none";
    };

    // Close when clicking outside modal
    window.onclick = (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
      }
    };
  </script>

</body>
</html>
