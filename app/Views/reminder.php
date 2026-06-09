
<form method="POST" action="index.php?page=reminder&action=<?= $editReminder ? 'update' : 'store' ?>">
<?php if ($editReminder): ?>
    <input type="hidden" name="id" value="<?= $editReminder['id'] ?>">
<?php endif; ?>

    <section >

        <div class="form-row">

            <div class="form-group">
                <label>Datum (TT/MM)</label>

                <div >
                    <input
                        class="date-input"
                        type="number"
                        name="day"
                        min="1"
                        max="31"
                        placeholder="TT"
                        required
                        value="<?= $editReminder ? date('d', strtotime($editReminder['event_date'])) : '' ?>"
                    >

                    <input
                        class="date-input"
                        type="number"
                        name="month"
                        min="1"
                        max="12"
                        placeholder="MM"
                        required
                        value="<?= $editReminder ? date('m', strtotime($editReminder['event_date'])) : '' ?>"
                    >
                </div>
            </div>

            <div class="form-group">
                <label>Bezeichnung</label>

                <input
                    class="title-input"
                    type="text"
                    name="title"
                    maxlength="255"
                    required
                    value="<?= $editReminder ? htmlspecialchars($editReminder['title']) : '' ?>"
                >
            </div>

            <div class="form-group">
                <label>E-Mail</label>

                <input
                    class="title-input"
                    type="email"
                    name="email"
                    maxlength="255"
                    required
                    value="<?= $editReminder ? htmlspecialchars($editReminder['email']) : '' ?>"
                >
            </div>

            <div class="form-group">
                <label>Erinnerung</label>


                <select
                        class="select-input"
                        name="reminder_days"
                        required
                >
                    <option value="">--bitte auswählen--</option>

                    <option value="1" <?= $editReminder && $editReminder['reminder_days'] == 1 ? 'selected' : '' ?>>
                        1 Tag
                    </option>

                    <option value="2" <?= $editReminder && $editReminder['reminder_days'] == 2 ? 'selected' : '' ?>>
                        2 Tage
                    </option>

                    <option value="4" <?= $editReminder && $editReminder['reminder_days'] == 4 ? 'selected' : '' ?>>
                        4 Tage
                    </option>

                    <option value="7" <?= $editReminder && $editReminder['reminder_days'] == 7 ? 'selected' : '' ?>>
                        1 Woche
                    </option>

                    <option value="14" <?= $editReminder && $editReminder['reminder_days'] == 14 ? 'selected' : '' ?>>
                        2 Wochen
                    </option>

                </select>
            </div>

        </div>

        <div class="save">
            <button type="submit">
                SPEICHERN
            </button>
        </div>

    </section>

</form>









<!-- Reminder overview table. -->
<section class="table-box">

    <table>

        <thead>
        <tr>
            <th>Datum</th>
            <th>Bezeichnung</th>
            <th>Erinnerung</th>
            <th>Aktion</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($reminders as $reminder): ?>

            <tr>

                <td>
                    <?= date('d.m.', strtotime($reminder['event_date'])) ?>
                </td>

                <td>
                    <?= htmlspecialchars($reminder['title']) ?>
                </td>

                <td>
                    <?php
                    switch ((int) $reminder['reminder_days']) {
                        case 14:
                            echo '2 Wochen';
                            break;

                        case 7:
                            echo '1 Woche';
                            break;

                        case 4:
                            echo '4 Tage';
                            break;

                        case 2:
                            echo '2 Tage';
                            break;

                        case 1:
                            echo '1 Tag';
                            break;

                        default:
                            echo htmlspecialchars($reminder['reminder_days']) . ' Tage';
                    }
                    ?>
                </td>

                <td>
                    <a class="edit-reminder"
                            href="index.php?page=reminder&edit=<?= $reminder['id'] ?>"

                    >
                        bearbeiten
                    </a>

                    |


                    <form class="delete-form" method="POST" action="index.php?page=reminder&action=delete" >
                        <input type="hidden" name="id" value="<?= $reminder['id'] ?>">

                        <button type="submit" class="link-button">
                            löschen
                        </button>
                    </form>
                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</section>