<?php

session_start();

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? null;

$controller = null;

if ($page === 'reminder') {
    require_once __DIR__ . '/../app/Controllers/ReminderController.php';

    $controller = new ReminderController();

    if ($action !== null) {
        switch ($action) {
            case 'store':
                $controller->store();
                break;

            case 'update':
                $controller->update();
                break;

            case 'delete':
                $controller->delete();
                break;

            case 'show':
                $controller->show();
                break;

            default:
                header('Location: index.php?page=reminder');
                exit;
        }
    }
}

require_once __DIR__ . '/../app/Views/layouts/header.php';
require_once __DIR__ . '/../app/Views/layouts/sidebar.php';

if ($page === 'reminder') {
    $controller->index();
} else {
    require_once __DIR__ . '/../app/Views/home.php';
}

require_once __DIR__ . '/../app/Views/layouts/footer.php';