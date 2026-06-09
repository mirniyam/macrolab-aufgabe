<?php

require_once __DIR__ . '/../Models/Reminder.php';

class ReminderController
{

    public function index()
    {
        $reminders = Reminder::all();

        $editReminder = null;

        if (isset($_GET['edit']) && ctype_digit((string) $_GET['edit'])) {
            $editReminder = Reminder::find((int) $_GET['edit']);
        }

        $csrfToken = $_SESSION['csrf_token'] ?? '';

        require __DIR__ . '/../Views/reminder.php';
    }

    public function show()
    {
        header('Content-Type: application/json');

        if (!isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
            echo json_encode(['success' => false]);
            exit;
        }

        $reminder = Reminder::find((int) $_GET['id']);

        if (!$reminder) {
            echo json_encode(['success' => false]);
            exit;
        }

        echo json_encode([
            'success' => true,
            'data' => $reminder
        ]);
        exit;
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$this->isValidCsrfToken()) {
            $this->redirectToReminder();
        }

        if (!$this->validateReminderForm()) {
            $this->redirectToReminder();
        }

        $eventDate = $this->buildEventDate($_POST['day'], $_POST['month']);

        Reminder::create([
            'event_date' => $eventDate,
            'title' => trim($_POST['title']),
            'email' => trim($_POST['email']),
            'reminder_days' => (int) $_POST['reminder_days']
        ]);

        $this->redirectToReminder();
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$this->isValidCsrfToken()) {
            $this->redirectToReminder();
        }

        if (empty($_POST['id']) || !ctype_digit((string) $_POST['id'])) {
            $this->redirectToReminder();
        }

        if (!$this->validateReminderForm()) {
            $this->redirectToReminder();
        }

        $eventDate = $this->buildEventDate($_POST['day'], $_POST['month']);

        Reminder::update((int) $_POST['id'], [
            'event_date' => $eventDate,
            'title' => trim($_POST['title']),
            'email' => trim($_POST['email']),
            'reminder_days' => (int) $_POST['reminder_days']
        ]);

        $this->redirectToReminder();
    }

    public function delete()
    {
        $isAjax = isset($_POST['ajax']) && $_POST['ajax'] == '1';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !$this->isValidCsrfToken()) {
            if ($isAjax) {
                $this->jsonResponse(['success' => false]);
            }

            $this->redirectToReminder();
        }

        if (isset($_POST['id']) && ctype_digit((string) $_POST['id'])) {
            Reminder::delete((int) $_POST['id']);
        }

        if ($isAjax) {
            $this->jsonResponse(['success' => true]);
        }

        $this->redirectToReminder();
    }

    private function buildEventDate($day, $month)
    {
        $day = str_pad((int) $day, 2, '0', STR_PAD_LEFT);
        $month = str_pad((int) $month, 2, '0', STR_PAD_LEFT);
        $year = date('Y');

        return $year . '-' . $month . '-' . $day;
    }

    private function validateReminderForm()
    {
        if (
            empty($_POST['day']) ||
            empty($_POST['month']) ||
            !ctype_digit((string) $_POST['day']) ||
            !ctype_digit((string) $_POST['month'])
        ) {
            return false;
        }

        $day = (int) $_POST['day'];
        $month = (int) $_POST['month'];
        $year = (int) date('Y');

        if (!checkdate($month, $day, $year)) {
            return false;
        }

        $title = trim($_POST['title'] ?? '');
        $email = trim($_POST['email'] ?? '');

        if ($title === '' || strlen($title) > 255) {
            return false;
        }

        if ($email === '' || strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }


        return true;
    }

    private function isValidCsrfToken()
    {
        return isset($_POST['csrf_token'], $_SESSION['csrf_token'])
            && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token']);
    }

    private function redirectToReminder()
    {
        header('Location: index.php?page=reminder');
        exit;
    }

    private function jsonResponse(array $data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}