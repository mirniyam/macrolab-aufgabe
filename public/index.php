<?php

$page = $_GET['page'] ?? 'home';


require_once __DIR__ . '/../app/views/layouts/header.php';
require_once __DIR__ . '/../app/views/layouts/sidebar.php';



if ($page === 'reminder') {
    require_once __DIR__ . '/../app/views/reminder.php';
} else {
    require_once __DIR__ . '/../app/views/home.php';
}






require_once __DIR__ . '/../app/views/layouts/footer.php';