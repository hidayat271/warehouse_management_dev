<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('customer') ?>">customer</a></li>
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
          <div class="card-title">Action Form customer</div>
        </div>
        <div class="card-block">
          <h3>Form untuk mengelola data customer</h3>
          <p>Isilah data customer sesuai dengan form yang telah disediakan.</p>
        </div>
      </div>
      <!-- END card -->
    </div>
    <div class="col-md-7">
      <!-- START card -->
      <div class="card card-transparent">
        <div class="card-block">
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('customer/process/' . $id); ?>" id="form-customer" role="form" autocomplete="off" method="POST" novalidate>
            <p>Basic Information</p>
            <div class="form-group-attached">
              <div class="form-group form-group-default required">
                <label>Code</label>
                <input type="text" class="form-control" name="code" value="<?php echo set_value('code', (isset($data_customers)) ? $data_customers->code : $data_code); ?>" required>
              </div>
                  <div class="form-group form-group-default required">
                    <label>Nama Customer</label>
                    <input type="text" class="form-control" name="name" value="<?php echo set_value('name', (isset($data_customers)) ? $data_customers->name : ''); ?>" required>
                  </div>
              <div class="row clearfix">
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="<?php echo set_value('telepon', (isset($data_customers)) ? $data_customers->telepon : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
              <div class="form-group form-group-default required">
                <label>Handphone</label>
                <input type="text" class="form-control" name="handphone" value="<?php echo set_value('handphone', (isset($data_customers)) ? $data_customers->handphone : ''); ?>" required>
              </div>
                </div>
                <div class="col-md-4">
              <div class="form-group form-group-default required">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email', (isset($data_customers)) ? $data_customers->email : ''); ?>" required>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat', (isset($data_customers)) ? $data_customers->alamat : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Daerah</label>
                    <input type="text" class="form-control" name="daerah" value="<?php echo set_value('daerah', (isset($data_customers)) ? $data_customers->daerah : ''); ?>" required>
                  </div>
                </div>
              </div>
              <div class="form-group form-group-default required">
                <label>Deskripsi</label>
                <input type="text" class="form-control" name="description" value="<?php echo set_value('description', (isset($data_customers)) ? $data_customers->description : ''); ?>" required>
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