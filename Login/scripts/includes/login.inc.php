<?php
// if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
//     // last request was more than 30 minutes ago
//     session_unset();     // unset $_SESSION variable for the run-time
//     session_destroy();   // destroy session data in storage
// }
// $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

if (isset($_POST['login-submit'])) {
    require '../../../scripts/includes/dbh.php';
    $username = trim($_POST['username']);
    $password = trim($_POST['pass']);

    $stmt = $mysqli->prepare("SELECT * from users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        header('Location: ../../index.html?error=nouser');
        exit();
    }

    if ($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        header('Location: ../../../contracts.php');
        exit();
    }

    $stmt->close();

} else {
    header('Location: ../../index.html');
    exit();
}
