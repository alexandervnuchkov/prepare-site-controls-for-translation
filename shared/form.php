<form action="" method="get">
    <div class="formDiv">
        <select name="editorVersion">
            <option <?php if($_GET['editorVersion'] == 'helpcenter') echo 'selected'; ?> value="helpcenter">Help Center</option>
            <option <?php if($_GET['editorVersion'] == 'website') echo 'selected'; ?> value="website">Website</option>
        </select>
        <select name="languageList">
            <option <?php if($_GET['languageList'] == 'de') echo 'selected'; ?> value="de">Deutsch</option>
            <option <?php if($_GET['languageList'] == 'fr') echo 'selected'; ?> value="fr">Français</option>
            <option <?php if($_GET['languageList'] == 'es') echo 'selected'; ?> value="es">Español</option>
            <option <?php if($_GET['languageList'] == 'it') echo 'selected'; ?> value="it">Italiano</option>
            <option <?php if($_GET['languageList'] == 'ru') echo 'selected'; ?> value="ru">Русский</option>
            <option <?php if($_GET['languageList'] == 'en') echo 'selected'; ?> value="en">English</option>
            <option <?php if($_GET['languageList'] == 'cs') echo 'selected'; ?> value="cs">Češka</option>
        </select>
        <input name="submitEditor" type="submit" value="Start!">
    </div>
</form>