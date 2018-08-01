<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('supplier') ?>">Supplier</a></li>
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
          <div class="card-title">Action Form Supplier</div>
        </div>
        <div class="card-block">
          <h3>Form untuk mengelola data supplier</h3>
          <p>Isilah data supplier sesuai dengan form yang telah disediakan.</p>
        </div>
      </div>
      <!-- END card -->
    </div>
    <div class="col-md-7">
      <!-- START card -->
      <div class="card card-transparent">
        <div class="card-block">
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('supplier/process/' . $id); ?>" id="form-supplier" role="form" autocomplete="off" method="POST" novalidate>
            <p>Basic Information</p>
            <div class="form-group-attached">
              <div class="form-group form-group-default required">
                <label>Code</label>
                <input type="text" class="form-control" name="kode_supplier" value="<?php echo set_value('kode_supplier', (isset($data_suppliers)) ? $data_suppliers->code : $data_code); ?>" required>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_supplier" value="<?php echo set_value('nama_supplier', (isset($data_suppliers)) ? $data_suppliers->name : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Nama Kontak</label>
                    <input type="text" class="form-control" name="nama_kontak" value="<?php echo set_value('nama_kontak', (isset($data_suppliers)) ? $data_suppliers->contact : ''); ?>" required>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>Handphone</label>
                    <input type="text" class="form-control" name="handphone" value="<?php echo set_value('handphone', (isset($data_suppliers)) ? $data_suppliers->handphone : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="<?php echo set_value('telepon', (isset($data_suppliers)) ? $data_suppliers->phone : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="fax" value="<?php echo set_value('fax', (isset($data_suppliers)) ? $data_suppliers->fax : ''); ?>" required>
                  </div>
                </div>
              </div>
                  <div class="form-group form-group-default required">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email', (isset($data_suppliers)) ? $data_suppliers->email : ''); ?>" required>
                  </div>
              <div class="form-group form-group-default required">
                <label>Alamat
                </label>
                <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat', (isset($data_suppliers)) ? $data_suppliers->address : ''); ?>" required>
              </div>
              <div class="form-group form-group-default required">
                <label>Catatan
                </label>
                <input type="text" class="form-control" name="description" value="<?php echo set_value('description', (isset($data_suppliers)) ? $data_suppliers->description : ''); ?>" required>
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