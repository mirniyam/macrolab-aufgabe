<?php

require_once __DIR__ . '/../../core/Database.php';

class Reminder
{
    public static function all()
    {
        $pdo = Database::connect();

        $stmt = $pdo->query("SELECT * FROM reminders ORDER BY event_date ASC");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $pdo = Database::connect();

        $stmt = $pdo->prepare("SELECT * FROM reminders WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Database::connect();

        $stmt = $pdo->prepare("
            INSERT INTO reminders (event_date, title, email, reminder_days)
            VALUES (:event_date, :title, :email, :reminder_days)
        ");

        return $stmt->execute([
            'event_date' => $data['event_date'],
            'title' => $data['title'],
            'email' => $data['email'],
            'reminder_days' => $data['reminder_days']
        ]);
    }

    public static function update($id, $data)
    {
        $pdo = Database::connect();

        $stmt = $pdo->prepare("
            UPDATE reminders
            SET event_date = :event_date,
                title = :title,
                email = :email,
                reminder_days = :reminder_days
            WHERE id = :id
        ");

        return $stmt->execute([
            'id' => $id,
            'event_date' => $data['event_date'],
            'title' => $data['title'],
            'email' => $data['email'],
            'reminder_days' => $data['reminder_days']
        ]);
    }

    public static function delete($id)
    {
        $pdo = Database::connect();

        $stmt = $pdo->prepare("DELETE FROM reminders WHERE id = :id");

        return $stmt->execute([
            'id' => $id
        ]);
    }
}