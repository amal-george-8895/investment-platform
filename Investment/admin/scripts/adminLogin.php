<?php
session_start();
include '../db_conn.php';
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);
$sql = "SELECT * FROM user WHERE emailid='$uname' AND password='$pass' AND role ='admin'"; // query database to check if user with given credentials and role of admin exists

$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['emailid'] === $uname && $row['password'] === $pass) {
        $_SESSION['emailid'] = $row['emailid'];
        $_SESSION['name'] = $row['fname'].$row['lname'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['login'] = true;
        header("Location: ../dashboard.php");
        exit();
    } else {
//        header("Location: ../clientlogin.php?error=Incorect User name or passwords.$row");
        echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../../index.php'>Login</a> again.</p>
                  </div>";
        exit();
    }
} else {
    $count = mysqli_num_rows($result);
    echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='../../index.php'>Login</a> again.</p>
                  </div>";
    exit();
}

