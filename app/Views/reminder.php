<form method="POST" action="index.php?page=reminder&action=store">


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
                    >

                    <input
                        class="date-input"
                        type="number"
                        name="month"
                        min="1"
                        max="12"
                        placeholder="MM"
                        required
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

                    <option value="1" >
                        1 Tag
                    </option>

                    <option value="2">
                        2 Tage
                    </option>

                    <option value="4" >
                        4 Tage
                    </option>

                    <option value="7" >
                        1 Woche
                    </option>

                    <option value="14" >
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
                    <a
                            class="edit-reminder"
                    >
                        bearbeiten
                    </a>

                    |


                        <button type="submit" class="link-button">
                            löschen
                        </button>
                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</section>