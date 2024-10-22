<?php

require_once 'app/model/user.php';
require_once 'app/controller/LoginController.php';
require_once 'config/Database.php';
session_start();

// Get database connection
$database = new Database();
$conn = $database->getConnection();

// استدعاء تحكم (Controller) للتحقق من بيانات تسجيل الدخول وتنفيذ الوظائف المناسبة
$loginController = new LoginController();

if (isset($_POST['email']) && isset($_POST['password'])) {
    if (isset($_POST['login'])) {
        $loginController->login($conn, $_POST['email'], $_POST['password']);
    }
} elseif (isset($_GET['action']) && $_GET['action'] == 'logout') {
    $loginController->logout();
} else {
    // استدعاء العرض (View) لعرض واجهة تسجيل الدخول
    require_once 'view/login.php';
}
