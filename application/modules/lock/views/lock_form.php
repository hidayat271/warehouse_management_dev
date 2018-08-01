<body class="fixed-header ">
  <!-- START PAGE-CONTAINER -->
  <div class="lock-container full-height">
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="full-height sm-p-t-50 align-items-center d-md-flex">
      <div class="row full-width">
        <div class="col-md-6">
          <!-- START Lock Screen User Info -->
          <div class="d-flex justify-content-start align-items-center">
            <div class="">
              <div class="thumbnail-wrapper circular d48 m-r-10 ">
                <img width="43" height="43" data-src-retina="<?php echo base_url(); ?>assets/img/profiles/<?php echo $this->session->userdata('account')['avatar']; ?>" data-src="<?php echo base_url(); ?>assets/img/profiles/<?php echo $this->session->userdata('account')['avatar']; ?>" alt="" src="<?php echo base_url(); ?>assets/img/profiles/<?php echo $this->session->userdata('account')['avatar']; ?>">
              </div>
            </div>
            <div class="">
              <h5 class="logged hint-text no-margin">
              Logged in as
              </h5>
              <h2 class="name no-margin"><?php echo $this->session->userdata('account')['name']; ?></h2>
            </div>
          </div>
          <!-- END Lock Screen User Info -->
        </div>
        <div class="col-md-6">
          <!-- START Lock Screen Form -->
          <form id="form-lock" role="form" action="<?php echo base_url('lock/process'); ?>" method="POST">
            <div class="row">
              <div class="col-md-12">
                <!-- START Form Control -->
                <div class="form-group form-group-default sm-m-t-30">
                  <label>Credentials</label>
                  <div class="controls">
                    <input type="password" name="password" placeholder="Password to unlock" class="form-control" required>
                  </div>
                </div>
                <!-- END Form Control -->
              </div>
            </div>
            <!-- START Lock Screen Notification Icons-->
            <div class="row">
              <div class="col-md-12 sm-p-l-25">
                <a href="#" class="inline text-black fs-14 hint-text"><i class="pg-comment"></i> <span class="hint-text"><?php echo count($count_message) ?></span></a>
              </div>
            </div>
            <!-- END Lock Screen Notification Icons-->
          </form>
          <!-- END Lock Screen Form -->
        </div>
      </div>
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
  </div>
  <!-- END PAGE-CONTAINER -->
  <!-- START Lock Screen Footer Content-->
  <div class="pull-bottom full-width">
    <div class="lock-container m-b-10 clearfix row">
      <div class="inline col-lg-2">
        <img src="assets/img/demo/pages_icon.png" alt="" class="m-t-5 " data-src="assets/img/demo/pages_icon.png" data-src-retina="assets/img/demo/pages_icon_2x.png" width="60" height="60">
      </div>
      <div class="col-lg-10 m-t-15">
        <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
              <span class="hint-text">Copyright © 2017</span>
              <span class="font-montserrat">ZONK Technology</span>.
              <span class="hint-text">All rights reserved.</span>
              <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a>
            </span>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- END Lock Screen Footer Content-->