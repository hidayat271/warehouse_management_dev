<?php foreach ($notes as $note): ?>
    <!-- BEGIN Note Item !-->
    <li data-noteid="<?= $note->id; ?>">
        <div class="left">
            <!-- BEGIN Note Action !-->
            <div class="checkbox check-warning no-margin">
                <input id="qncheckbox<?= $note->id; ?>" type="checkbox" name="note_id[]" value="<?= $note->id; ?>">
                <label for="qncheckbox<?= $note->id; ?>"></label>
            </div>
            <!-- END Note Action !-->
            <!-- BEGIN Note Preview Text !-->
            <p class="note-preview"><?= $note->content; ?></p>
            <input type="hidden" class="note-id" value="<?= $note->id; ?>" />
            <!-- BEGIN Note Preview Text !-->
        </div>
        <!-- BEGIN Note Details !-->
        <div class="right pull-right">
            <!-- BEGIN Note Date !-->
            <a href="#" data-navigate="view" data-view-port="#note-views"
               data-view-animation="push"><i class="fa fa-chevron-right"></i></a>
            <span class="date"><?= $note->updated_at; ?></span>
            <!-- END Note Date !-->
        </div>
        <!-- END Note Details !-->
    </li>
    <!-- END Note List !-->
<?php endforeach; ?>