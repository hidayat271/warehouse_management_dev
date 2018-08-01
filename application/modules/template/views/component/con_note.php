<!-- BEGIN Notes !-->
<div class="tab-pane no-padding" id="quickview-notes">
  <div class="view-port clearfix quickview-notes" id="note-views">
    <!-- BEGIN Note List !-->
    <form class="view list" id="quick-note-list">
      <div class="toolbar clearfix">
        <ul class="pull-right ">
          <li>
            <a href="#" class="delete-note-link"><i class="fa fa-trash-o"></i></a>
          </li>
          <li>
            <a href="#" class="new-note-link" data-navigate="view" data-view-port="#note-views"
            data-view-animation="push"><i class="fa fa-plus"></i></a>
          </li>
        </ul>
        <button class="btn-remove-notes btn btn-xs btn-block hide"><i class="fa fa-times"></i> Delete
        </button>
      </div>
      <ul id="note-list-item">
      </ul>
    </form>
    <!-- END Note List !-->
    <div class="view note" id="quick-note">
      <div>
        <ul class="toolbar">
          <li><a href="#" class="close-note-link"><i class="pg-arrow_left"></i></a></li>
          <li><a href="#" data-action="Bold" class="fs-12"><i class="fa fa-bold"></i></a></li>
          <li><a href="#" data-action="Italic" class="fs-12"><i class="fa fa-italic"></i></a></li>
          <li><a href="#" class="fs-12"><i class="fa fa-link"></i></a></li>
        </ul>
        <div class="body">
          <div>
            <div class="top">
              <span id="datetime-note"></span>
            </div>
            <div class="content">
              <div class="quick-note-editor full-width full-height js-input"
              contenteditable="true"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Notes !-->