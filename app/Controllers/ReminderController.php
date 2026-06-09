<?php

require_once __DIR__ . '/../Models/Reminder.php';

class ReminderController
{
    public function index()
    {
        $reminders = Reminder::all();
        require_once __DIR__ . '/../Views/reminder.php';
    }



    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?page=reminder');
            exit;
        }

        $eventDate = sprintf(
            '%04d-%02d-%02d',
            date('Y'),
            $_POST['month'],
            $_POST['day']
        );

        Reminder::create([
            'event_date' => $eventDate,
            'title' => trim($_POST['title']),
            'email' => trim($_POST['email']),
            'reminder_days' => $_POST['reminder_days']
        ]);

        header('Location: index.php?page=reminder');
        exit;
    }

}