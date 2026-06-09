<?php

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'index';


require_once __DIR__ . '/../app/Views/layouts/header.php';
require_once __DIR__ . '/../app/Views/layouts/sidebar.php';



if ($page === 'reminder') {
    require_once __DIR__ . '/../app/controllers/ReminderController.php';
    $controller = new ReminderController();

    if ($action === 'store') {
        $controller->store();
    } elseif ($action === 'delete') {
        $controller->delete();
    } elseif ($action === 'update') {
        $controller->update();
    } else {
        $controller->index();
    }
} else {
    require_once __DIR__ . '/../app/Views/home.php';
}






require_once __DIR__ . '/../app/Views/layouts/footer.php';