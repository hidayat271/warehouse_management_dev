<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('product') ?>">Product</a></li>
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
          <div class="card-title">Action Form Product</div>
        </div>
        <div class="card-block">
          <h3>Form untuk mengelola data product</h3>
          <p>Isilah data product sesuai dengan form yang telah disediakan.</p>
        </div>
      </div>
      <!-- END card -->
    </div>
    <div class="col-md-7">
      <!-- START card -->
      <div class="card card-transparent">
        <div class="card-block">
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('product/process/' . $id); ?>" id="form-employee" role="form" autocomplete="off" method="POST" novalidate>
            <p>Basic Information</p>
            <div class="form-group-attached">
              <div class="form-group form-group-default required">
                <label>Barcode</label>
                <input type="text" class="form-control" name="barcode" value="" id="field-barecode" required>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required typehead" id="custom-supplier">
                    <label>Supplier Name</label>
                    <input type="text" class="form-control typeahead" name="supplier_name" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required typehead" id="custom-kategori">
                    <label>Kategori</label>
                    <input type="text" class="form-control typeahead" name="kategori" value="" required>
                  </div>
                </div>
              </div>
              <div class="form-group form-group-default required">
                <label>Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" value="" required>
              </div>
              <div class="form-group form-group-default required">
                <label>Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" value="" required>
              </div>
            </div>
            <p class="m-t-10">Price & Stock Information</p>
            <div class="form-group-attached">
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Harga Supplier</label>
                    <input type="text" class="form-control" name="harga_supplier" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Harga Distributor</label>
                    <input type="text" class="form-control" name="harga_distributor" value="" required>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Harga Jual (Seri)</label>
                    <input type="text" class="form-control" name="harga_jual_seri" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Harga Jual (Grosir)</label>
                    <input type="text" class="form-control" name="harga_jual_grosir" value="" required>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Harga Jual (Eceran)</label>
                    <input type="text" class="form-control" name="harga_jual_eceran" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Harga Jual (Pancingan)</label>
                    <input type="text" class="form-control" name="harga_jual_pancingan" value="" required>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Qty Fisik</label>
                    <input type="text" class="form-control" name="qty_fisik" value="" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default required">
                    <label>Qty Limit</label>
                    <input type="text" class="form-control" name="qty_limit" value="" required>
                  </div>
                </div>
              </div>
              <div class="form-group form-group-default required">
                <label>Deskripsi</label>
                <input type="text" class="form-control" name="deskripsi" value="" required>
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