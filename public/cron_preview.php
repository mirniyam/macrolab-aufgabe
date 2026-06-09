<?php

require_once __DIR__ . '/../app/Models/Reminder.php';

$reminders = Reminder::remindersToSend();
?>

    <h1>Reminders to send today</h1>

<?php if (empty($reminders)): ?>
    <p>No reminders to send today.</p>
<?php else: ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>Email</th>
            <th>Title</th>
            <th>Date</th>
        </tr>

        <?php foreach ($reminders as $reminder): ?>
            <tr>
                <td><?= htmlspecialchars($reminder['email']) ?></td>
                <td><?= htmlspecialchars($reminder['title']) ?></td>
                <td><?= htmlspecialchars($reminder['event_date']) ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

<?php endif; ?>