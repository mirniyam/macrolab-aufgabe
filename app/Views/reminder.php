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

