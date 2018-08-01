<body class="fixed-header menu-pin menu-behind">
  <div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
      <!-- START Background Pic-->
      <img src="<?php echo base_url(); ?>assets/img/background.jpg" data-src="<?php echo base_url(); ?>assets/img/background.jpg" data-src-retina="<?php echo base_url(); ?>assets/img/background.jpg" alt="" class="lazy">
      <!-- END Background Pic-->
      <!-- START Background Caption-->
      <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
        <h2 class="semi-bold text-white">
          Point of Sales | Free N Style
        </h2>
        <p class="small">
          Aplikasi pegelolaan data dan informasi Official Free N Style.
        </p>
      </div>
      <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
      <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" data-src="<?php echo base_url(); ?>assets/img/logo.png" data-src-retina="<?php echo base_url(); ?>assets/img/logo_2x.png" width="150">
        <p class="p-t-35">Login untuk menggunakan aplikasi</p>
        <?= $this->session->flashdata('error') ?>
        <!-- START Login Form -->
        <form id="form-login" class="p-t-15" role="form" action="<?php echo base_url('login/process'); ?>" method="POST">
          <!-- START Form Control-->
          <div class="form-group form-group-default">
            <label>Login</label>
            <div class="controls">
              <input type="text" name="username" placeholder="User Name" class="form-control" required>
            </div>
          </div>
          <!-- END Form Control-->
          <!-- START Form Control-->
          <div class="form-group form-group-default">
            <label>Password</label>
            <div class="controls">
              <input type="password" class="form-control" name="password" placeholder="Credentials" required>
            </div>
          </div>
          <!-- START Form Control-->
          <div class="row">
            <div class="col-md-6 no-padding sm-p-l-10">
              <div class="checkbox ">
                <input type="checkbox" name="remember" value="1" id="remember">
                <label for="checkbox1">Biarkan tetap masuk</label>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
              <a href="#" class="text-info small">Bantuan? Hubungi Tim Support</a>
            </div>
          </div>
          <!-- END Form Control-->
          <button class="btn btn-primary btn-cons m-t-10" type="submit">Login</button>
        </form>
        <!--END Login Form-->
        <div class="pull-bottom sm-pull-bottom">
          <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
            <div class="col-sm-3 col-md-2 no-padding">
              <img alt="" class="m-t-5" data-src="<?php echo base_url(); ?>assets/img/demo/pages_icon.png" data-src-retina="<?php echo base_url(); ?>assets/img/demo/pages_icon_2x.png" height="60" src="<?php echo base_url(); ?>assets/img/demo/pages_icon.png" width="60">
            </div>
            <div class="col-sm-12 no-padding m-t-10">
                  <p class="small no-margin sm-pull-reset">
                    <span class="hint-text">Copyright © 2017</span>
                    <span class="font-montserrat">ZONK Technology</span>.
                    <span class="hint-text">All rights reserved.</span>
                </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Login Right Container-->
</div>