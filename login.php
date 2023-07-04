<?php


include ("header.inc");
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
// Assuming you have a database connection already established

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform a database query to check if the email and password match
    $query = "SELECT * FROM Managers WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    // Check if a row is returned
    if (mysqli_num_rows($result) == 1) {
        // Login successful, redirect to manage1.php
        header("Location: manage.php");
        exit();
    } else {
        // Invalid login attempt, update the login attempt count and timestamp
        $query = "SELECT * FROM FailedAttempts WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // User already has failed attempts recorded, update the count and timestamp
            $attempts = $row["attempts"] + 1;
            $timestamp = time();
            $query = "UPDATE FailedAttempts SET attempts = $attempts, last_attempt = $timestamp WHERE email = '$email'";
            mysqli_query($conn, $query);
        } else {
            // User does not have failed attempts recorded, insert a new record
            $attempts = 1;
            $timestamp = time();
            $query = "INSERT INTO FailedAttempts (email, attempts, last_attempt) VALUES ('$email', $attempts, $timestamp)";
            mysqli_query($conn, $query);
        }

        // Check if the user has reached the maximum number of failed attempts
        $maxAttempts = 3;
        if ($attempts >= $maxAttempts) {
            // Disable access for a period of time (e.g., 5 minutes)
            $disableTime = 20; // 5 minutes in seconds
            $disableUntil = $timestamp + $disableTime;
            $query = "UPDATE FailedAttempts SET disable_until = $disableUntil WHERE email = '$email'";
            mysqli_query($conn, $query);
            echo "Access disabled. Please try again later.";
            exit();
        }

        echo "<p>Invalid email or password.</p>";
    }
}
?>
   <link rel="stylesheet" href="styles/style.css">
<!-- partial:index.partial.html -->
<div class="login-form">
  <form action="" method="POST">
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input-field">
        <input type="password"  name="password" placeholder="Password" required>
      </div>
      <!-- <a href="#" class="link">Forgot Your Password?</a> -->
    </div>
    <div class="action">
      <!-- <button >Register</button> -->
      <input type="submit" value="Login">
      <!-- <button>Sign in</button> -->
    </div>
  </form>
</div>

<?php
    include ("footer.inc")
?>    
