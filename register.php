<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $first_name = $_POST["firstname"];
    $last_name = $_POST["lastname"];
    $username= $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

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

    $sql = "INSERT INTO user_data (first_name, last_name, username, email, password)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssss",
                           $first_name,
                           $last_name,
                           $username,
                           $email,
                           $password);

    mysqli_stmt_execute($stmt);
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
            <label for="firstname">ΟΝΟΜΑ</label>
            <input type="text" id="firstname" name="firstname" placeholder="First name">
            <label for="lastname">ΕΠΩΝΥΝΟ</label>
            <input type="text" id="lastname" name="lastname" placeholder="Last name">
            <label for="username">ΟΝΟΜΑ ΧΡΗΣΤΗ</label>
            <input type="text" id="username" name="username" placeholder="Username">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" placeholder="Email">
            <label for="password">ΚΩΔΙΚΟΣ</label>
            <input type="password" id="password" name="password" placeholder="Password">
            <button id="submit-button" class="buttons" type="submit" name="submit">ΥΠΟΒΟΛΗ</button>

            <p>
            <?php if (!empty($success)) : ?>
              <span style="color:green;">Επιτυχής Εγγραφή!</span>
            <?php elseif (!empty($error)) : ?>
              <span style="color:red;"><?php echo $error; ?></span>
            <?php else : ?>
              ㅤ 
            <?php endif; ?>
          </p>
        </form>
    </section>
    
</body>


</html>