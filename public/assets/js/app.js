document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-reminder');
    const deleteForms = document.querySelectorAll('.delete-form');

    editButtons.forEach(function (button) {
        button.addEventListener('click', fetchReminderDetails);
    });

    deleteForms.forEach(function (form) {
        form.addEventListener('submit', deleteReminder);
    });
});

function fetchReminderDetails(event) {
    event.preventDefault();

    const button = event.currentTarget;
    const id = button.dataset.id;
    const href = button.href;

    fetch('index.php?page=reminder&action=show&id=' + encodeURIComponent(id))
        .then(function (response) {
            return response.json();
        })
        .then(function (result) {
            if (!result.success) {
                window.location.href = href;
                return;
            }

            fillReminderForm(result.data);
        })
        .catch(function () {
            window.location.href = href;
        });
}

function fillReminderForm(reminder) {
    const dateParts = reminder.event_date.split('-');
    const form = document.querySelector('form');

    form.action = 'index.php?page=reminder&action=update';

    document.querySelector('input[name="id"]').value = reminder.id;
    document.querySelector('input[name="day"]').value = dateParts[2];
    document.querySelector('input[name="month"]').value = dateParts[1];
    document.querySelector('input[name="title"]').value = reminder.title;
    document.querySelector('input[name="email"]').value = reminder.email;
    document.querySelector('select[name="reminder_days"]').value = reminder.reminder_days;

    form.querySelector('button[type="submit"]').textContent = 'AKTUALISIEREN';
}

function deleteReminder(event) {
    event.preventDefault();

    if (!confirm('Möchten Sie diesen Termin wirklich löschen?')) {
        return;
    }

    const form = event.currentTarget;
    const formData = new FormData(form);

    formData.append('ajax', '1');

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            if (data.success) {
                form.closest('tr').remove();
            } else {
                form.submit();
            }
        })
        .catch(function () {
            form.submit();
        });
}