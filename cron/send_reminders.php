<?php

require_once __DIR__ . '/../app/Models/Reminder.php';

$reminders = Reminder::remindersToSend();

// Stop the script if there are no due reminders
if (empty($reminders)) {
    echo "No reminders to send today.";
    exit;
}

foreach ($reminders as $reminder) {
    // Simulate the email sending process
    echo "<hr>";
    echo "<strong>Title:</strong> " . htmlspecialchars($reminder['title']) . "<br>";
    echo "<strong>Date:</strong> " . htmlspecialchars($reminder['event_date']) . "<br>";
    echo "<strong>Reminder would be sent to:</strong> " . htmlspecialchars($reminder['email']) . "<br>";

    Reminder::markAsSent($reminder['id']);
}