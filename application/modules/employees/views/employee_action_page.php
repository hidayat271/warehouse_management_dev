<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('employees') ?>">Employees</a></li>
        <li class="breadcrumb-item active">Action Form</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->
<!-- START CONTAINER FLUID -->
<div class="container-fluid container-fixed-lg">
  <div class="row">
    <div class="col-md-5">
      <!-- START card -->
      <div class="card card-transparent">
        <div class="card-header ">
          <div class="card-title">Action Form Employees</div>
        </div>
        <div class="card-block">
          <h3>Form untuk mengelola data pegawai</h3>
          <p>Isilah data pegawai sesuai dengan form yang telah disediakan.</p>
        </div>
      </div>
      <!-- END card -->
    </div>
    <div class="col-md-7">
      <!-- START card -->
      <div class="card card-transparent">
        <div class="card-block">
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('employees/process/' . $id); ?>" id="form-employee" role="form" autocomplete="off" method="POST" novalidate>
            <p>Basic Information</p>
            <div class="form-group-attached">
              <div class="form-group form-group-default required">
                <label>Code</label>
                <input type="text" class="form-control" name="kode_pegawai" value="<?php echo set_value('kode_pegawai', (isset($data_employees)) ? $data_employees->kode : $data_code); ?>" required>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan" value="<?php echo set_value('nama_depan', (isset($data_employees)) ? $data_employees->firstname : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default">
                    <label>Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang" value="<?php echo set_value('nama_belakang', (isset($data_employees)) ? $data_employees->lastname : ''); ?>">
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email', (isset($data_employees)) ? $data_employees->email : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="<?php echo set_value('telepon', (isset($data_employees)) ? $data_employees->telepon : ''); ?>" required>
                  </div>
                </div>
              </div>
            </div>
            <p class="m-t-10">Account Information</p>
            <div class="form-group-attached">
              <div class="form-group form-group-default required typehead" id="custom-lokasi-tempat">
                <label>Lokasi Penempatan <i class="fa fa-info text-complete m-l-5"></i>
                </label>
                <input type="text" class="typeahead form-control" name="lokasi_penempatan" value="<?php echo set_value('lokasi_penempatan', (isset($data_employees)) ? $data_employees->lokasi : ''); ?>" >
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo set_value('username', (isset($data_employees)) ? $data_employees->username : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>PIN</label>
                    <input type="password" class="form-control" name="pin" value="<?php echo set_value('pin', (isset($data_employees)) ? $data_employees->pin : ''); ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo set_value('password', (isset($data_employees)) ? $data_employees->password : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Ulangi Password</label>
                    <input type="password" class="form-control" name="repassword" value="<?php echo set_value('password', (isset($data_employees)) ? $data_employees->password : ''); ?>" required>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-default"><i class="pg-close"></i> Clear</button>
          </form>
        </div>
      </div>
      <!-- END card -->
    </div>
  </div>
</div>
<!-- END CONTAINER FLUID -->