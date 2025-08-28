<?php
// Entry point ของแอปพลิเคชัน
require_once 'config/config.php';
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';

// เริ่มต้น session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// เริ่มต้น router
$router = new Router();

// กำหนด routes
$router->addRoute('/', 'HomeController', 'index');
$router->addRoute('/login', 'AuthenController', 'login');
$router->addRoute('/login_check', 'AuthenController', 'login_check');
$router->addRoute('/logout', 'AuthenController', 'logout');
$router->addRoute('/home/dashboard', 'HomeController', 'dashboard');

// PC Routes
$router->addRoute('/pc/dashboard', 'PcController', 'dashboard');
$router->addRoute('/pc/materials', 'PcController', 'materials');
$router->addRoute('/pc/materialTransactions', 'PcController', 'materialTransactions');
$router->addRoute('/pc/materialStock', 'PcController', 'materialStock');
$router->addRoute('/pc/transactionReport', 'PcController', 'transactionReport');

// Fallback for direct access (when .htaccess doesn't work)
if (isset($_GET['url'])) {
    $_SERVER['REQUEST_URI'] = '/' . $_GET['url'];
}

// เริ่มต้นแอปพลิเคชัน
$router->dispatch();
?> 