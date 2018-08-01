<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('store') ?>">Store</a></li>
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
          <div class="card-title">Action Form Store</div>
        </div>
        <div class="card-block">
          <h3>Form untuk mengelola data toko</h3>
          <p>Isilah data toko sesuai dengan lokasi serta peruntukan toko pada form yang telah disediakan.</p>
        </div>
      </div>
      <!-- END card -->
    </div>
    <div class="col-md-7">
      <!-- START card -->
      <div class="card card-transparent">
        <div class="card-block">
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('store/process/' . $id); ?>" id="form-store" role="form" autocomplete="off" method="POST" novalidate>
            <p>Basic Information</p>
            <div class="form-group-attached">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Code</label>
                    <input type="text" class="form-control" name="kode_store" value="<?php echo set_value('kode_store', (isset($data_toko)) ? $data_toko->code : $data_code); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Nama Toko</label>
                    <input type="text" class="form-control" name="nama_toko" value="<?php echo set_value('nama_toko', (isset($data_toko)) ? $data_toko->name : ''); ?>" required>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email', (isset($data_toko)) ? $data_toko->email : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="<?php echo set_value('telepon', (isset($data_toko)) ? $data_toko->telepon : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group form-group-default required">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="fax" value="<?php echo set_value('fax', (isset($data_toko)) ? $data_toko->fax : ''); ?>" required>
                  </div>
                </div>
              </div>
              <div class="form-group form-group-default">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo set_value('alamat', (isset($data_toko)) ? $data_toko->address : ''); ?>" required>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Area</label>
                    <input type="text" class="form-control" name="area" value="<?php echo set_value('area', (isset($data_toko)) ? $data_toko->area : ''); ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required form-group-default-selectFx">
                    <label>Jenis Toko</label>
                    <select class="cs-select cs-skin-slide cs-transparent form-control" data-init-plugin="cs-select" name="jenis_toko">
                      <option value="None">Pilih...</option>
                      <option value="toko">Toko</option>
                      <option value="gudang">Gudang</option>
                    </select>
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