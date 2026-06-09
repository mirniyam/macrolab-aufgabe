<?php

$page = $_GET['page'] ?? 'home';


require_once __DIR__ . '/../app/Views/layouts/header.php';
require_once __DIR__ . '/../app/Views/layouts/sidebar.php';



if ($page === 'reminder') {
    require_once __DIR__ . '/../app/controllers/ReminderController.php';
    $controller = new ReminderController();
    $controller->index();
} else {
    require_once __DIR__ . '/../app/Views/home.php';
}






require_once __DIR__ . '/../app/Views/layouts/footer.php';