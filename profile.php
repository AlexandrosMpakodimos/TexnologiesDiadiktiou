<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $host = "localhost";
    $port = 8889;
    $dbname = "texnologies_diadiktiou_db";
    $db_username = "root";
    $db_password = "root";
    $socket = '/Applications/MAMP/tmp/mysql/mysql.sock';

    $conn = mysqli_connect($host, $db_username, $db_password, $dbname, $port, $socket);

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }

    $id = 23; 

    if (isset($_POST["update"])) {
        $first_name = $_POST["firstname"];
        $last_name  = $_POST["lastname"];
        $username   = $_POST["username"];
        $email      = $_POST["email"];
        $password   = $_POST["password"]; 

        $sql = "UPDATE user_data 
                SET first_name = ?, last_name = ?, username = ?, email = ?, password = ? 
                WHERE id = ?";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die("SQL error: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "sssssi", 
            $first_name,
            $last_name,
            $username,
            $email,
            $password,
            $id
        );

        if (mysqli_stmt_execute($stmt)) {
            $success = "Τα στοιχεία σου ενημερώθηκαν!";
        } else {
            $error = "Update failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);

    } elseif (isset($_POST["delete"])) {
        $sql = "DELETE FROM user_data WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die("SQL error: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            $success = "Ο λογαριασμός διαγράφηκε!";
        } else {
            $error = "Delete failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="sidenav.css" />
    <link rel="stylesheet" href="theme.css" />
    <link rel="stylesheet" href="buttons.css" />
    <link rel="stylesheet" href="accordion.css" />
    <link rel="stylesheet" href="register.css" />
    <script defer src="theme.js"></script>
    <script defer src="accordion.js"></script>

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

        <form class="register-form" method="POST" action="">
          <label>First Name:</label>
          <input type="text" name="firstname" required>

          <label>Last Name:</label>
          <input type="text" name="lastname" required>

          <label>Username:</label>
          <input type="text" name="username" required>

          <label>Email:</label>
          <input type="email" name="email" required>

          <label>Password:</label>
          <input type="password" name="password" required>

          <button id="submit-button" class="buttons" type="submit">ΕΝΗΜΕΡΩΣΗ</button>
          <button id="submit-button" class="buttons" type="submit" name="delete" formnovalidate>ΔΙΑΓΡΑΦΗ</button>
            
          <p>
            <?php if (!empty($success)) : ?>
              <span style="color:green;"><?php echo $success; ?></span>
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
