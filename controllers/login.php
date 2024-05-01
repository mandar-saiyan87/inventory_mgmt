<?php
$db = new Database();

$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
  // echoReq($_POST);
  extract($_POST);
  try {
    $userfound = $db->query("select * from users where name='$username'")->fetch(PDO::FETCH_ASSOC);
    // echoReq($userfound);
    if (!empty($userfound)) {
      if (password_verify($password, $userfound['password'])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user'] = [
          "username" => $userfound['name'],
          "is_admin" => $userfound['admin']
        ];
        header("location: /");
        die();
      } else {
        $error['message'] = 'Wrong Password';
      }
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}


include('views/login.view.php');
