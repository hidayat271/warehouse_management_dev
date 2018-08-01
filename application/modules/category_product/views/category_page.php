<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('category_product') ?>">Category Product</a></li>
        <li class="breadcrumb-item active">List Category Product</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->
<!-- START CONTAINER FLUID -->
<div class="container-fluid container-fixed-lg">
  <!-- START card -->
  <div class="card card-transparent">
    <div class="m-0 row card-block">
      <div class="col-md-4 no-padding">

        <div class="card card-transparent">
        <div class="card-header ">
          <div class="card-title">Action Form Category Product</div>
        </div>
        <div class="card-block">
          <h3>Form untuk mengelola data kategori</h3>
          <p>Isilah data kategori sesuai dengan form yang telah disediakan.</p>
        </div>
        <!-- START card -->
        <div class="card-block">
          <?php $id = $this->uri->segment(3); ?>
          <form action="<?php echo base_url('category_product/process/' . $id); ?>" id="form-employee" role="form" autocomplete="off" method="POST" novalidate>
            <p>Basic Information</p>
            <div class="form-group-attached">
              <div class="form-group form-group-default required">
                <label>Code</label>
                <input type="text" class="form-control" name="kode" value="<?php echo set_value('kode', (isset($data_categori)) ? $data_categori->code : ''); ?>" required>
              </div>
              <div class="form-group form-group-default required">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama', (isset($data_categori)) ? $data_categori->name : ''); ?>" required>
              </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-default"><i class="pg-close"></i> Clear</button>
          </form>
        </div>
      <!-- END card -->
      </div>

      </div>
    <div class="col-md-8 no-padding">

    <div class="card-header ">
      <a class="btn btn-primary pull-right" href="<?php echo base_url('category_product/action'); ?>">Tambah Category Product</a>
      <div class="card-title">Data Category Product</div>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-hover" id="basicTable">
          <thead>
            <tr>
              <th style="width:15%">Kode</th>
              <th style="width:30%">Nama Category</th>
              <th style="width:15%">#</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(isset($data_categories)):
              foreach ($data_categories as $category_product): 
            ?>
            
            <tr>
              <td class="v-align-middle ">
                <p><?php echo $category_product->code; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $category_product->name; ?></p>
              </td>
              <td class="v-align-middle">
                <a data-target="#delete_<?php echo $category_product->id; ?>" data-toggle="modal" class="text-danger" ><i class="pg-trash_line"></i></a>
                <a class="text-success" href="<?php echo base_url('category_product/action/' . $category_product->id); ?>">
                  <i class="fa fa-edit"></i>
                </a>
                <!-- MODAL STICK UP  -->
                <div class="modal fade stick-up" id="delete_<?php echo $category_product->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Informasi <span class="semi-bold">Delete</span></h5>
                        <p>Apakah anda akan menghapus data pegawai?</p>
                      </div>
                      <div class="modal-body">
                        <div class="text-right">
                          <a href="<?php echo base_url('category_product/delete/' . $category_product->id); ?>" class="btn btn-danger">Ya</a>
                          <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- END MODAL STICK UP  -->
          </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
  <?php if(isset($link_page)) echo $link_page; ?>
</div>
</div>
</div>
</div>
<!-- END card -->
</div>