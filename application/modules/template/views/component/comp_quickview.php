<!--START QUICKVIEW -->
<div id="quickview" class="quickview-wrapper" data-pages="quickview">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="" data-target="#quickview-notes" data-toggle="tab">
      <a href="#">Notes</a>
    </li>
    <li data-target="#quickview-alerts" data-toggle="tab">
      <a href="#">Alerts</a>
    </li>
    <li class="active" data-target="#quickview-chat" data-toggle="tab">
      <a href="#">Chat</a>
    </li>
  </ul>
  <a class="btn-link quickview-toggle" data-toggle-element="#quickview" data-toggle="quickview"><i class="pg-close"></i></a>
  <!-- Tab panes -->
  <div class="tab-content">
    <?php $this->load->view('component/con_note'); ?>
    <?php $this->load->view('component/con_alert'); ?>
    <?php $this->load->view('component/con_chat'); ?>
  </div>
</div>
<!-- END QUICKVIEW-->