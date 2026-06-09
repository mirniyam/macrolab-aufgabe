# Microlab Reminder Calendar

This project was created for the MICROLAB programming task.

It is a small PHP/MySQL reminder calendar. Users can add reminders, see them in a table, edit them and delete them. There is also a separate script that checks which reminders are due and simulates sending reminder emails.

## Features

* Home page with text and image
* Reminder calendar page
* Create, edit and delete reminders
* Show saved reminders from the database
* AJAX delete with normal form fallback
* CSRF protection for form actions
* Basic server-side validation
* Reminder email simulation
* Separate reminder checking script
* SQL file for the database structure

## Technologies

* PHP
* MySQL / MariaDB
* PDO
* HTML
* CSS
* JavaScript
* AJAX
* XAMPP

## Project Structure

```text
macrolab-aufgabe/
│
├── app/
│   ├── Controllers/
│   │   └── ReminderController.php
│   │
│   ├── Models/
│   │   └── Reminder.php
│   │
│   └── Views/
│       ├── home.php
│       ├── reminder.php
│       │
│       └── layouts/
│           ├── header.php
│           ├── sidebar.php
│           └── footer.php
│
├── config/
│   └── database.php
│
├── core/
│   └── Database.php
│
├── cron/
│   └── send_reminders.php
│
├── database/
│   └── microlab.sql
│
├── public/
│   ├── index.php
│   ├── cron_preview.php
│   │
│   └── assets/
│       ├── css/
│       │   └── style.css
│       │
│       ├── js/
│       │   └── app.js
│       │
│       └── images/
│           └── home/
│               └── hom-main.jpg
│
├── .gitignore
└── README.md
```

## Installation

Copy the project folder into the XAMPP `htdocs` directory:

```text
C:\xampp\htdocs\macrolab-aufgabe
```

Start Apache and MySQL in the XAMPP Control Panel.

Then open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Import the SQL file:

```text
database/microlab.sql
```

The SQL file creates the database `microlab` and the table `reminders`.

## Database Configuration

The database connection is configured in:

```text
config/database.php
```

Default local configuration:

```php
<?php

return [
    'host' => 'localhost',
    'dbname' => 'microlab',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8mb4'
];
```

This configuration is intended for a local XAMPP setup.

## Run the Project

Open the project in the browser:

```text
http://localhost/macrolab-aufgabe/public/
```

Reminder page:

```text
http://localhost/macrolab-aufgabe/public/index.php?page=reminder
```

## Reminder Calendar

A reminder contains:

* Date
* Title
* E-mail address
* Reminder interval

The reminder interval is selected in the form, for example:

```text
1 Tag
2 Tage
4 Tage
1 Woche
2 Wochen
```

Internally these values are stored as days:

```text
1, 2, 4, 7, 14
```

## Reminder Script

The reminder script is located here:

```text
cron/send_reminders.php
```

It checks reminders where:

```text
event_date - reminder_days = today
```

If a reminder is due, the script simulates sending an email and marks the reminder as sent.

For local testing, it can be opened in the browser:

```text
http://localhost/macrolab-aufgabe/cron/send_reminders.php
```

Example output:

```text
Reminder would be sent to: test@example.com
Title: Geburtstag Karl
Date: 2026-06-20
```

There is also a preview page:

```text
public/cron_preview.php
```

This page only shows which reminders would be sent today. It does not mark them as sent.

## E-Mail Sending

Real e-mail sending is not enabled in this project.

The script only simulates the sending process, because local XAMPP mail setup usually needs extra SMTP configuration. In a real environment, this could be replaced with PHPMailer or another SMTP solution.

## Security and Validation

The project includes:

* CSRF protection for form actions
* Server-side validation
* HTML form validation
* Date validation
* E-mail validation
* PDO database connection
* Prepared statements
* Escaped output with `htmlspecialchars()`

## Notes

The project was built without a PHP framework.

The main focus was to keep the structure understandable and to implement the requested functionality with plain PHP, MySQL, PDO and a small MVC-like structure.
