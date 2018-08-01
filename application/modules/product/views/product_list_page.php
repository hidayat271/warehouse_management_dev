<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('employees') ?>">Product</a></li>
        <li class="breadcrumb-item active">List Product</li>
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
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-hover" id="basicTable">
          <thead>
            <tr>
              <th style="width:15%">Photo</th>
              <th style="width:15%">Barcode</th>
              <th style="width:30%">Nama Produk</th>
              <th style="width:20%">Kategori</th>
              <th style="width:15%">Supplier</th>
              <th style="width:15%">Description</th>
              <th style="width:15%">#</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(isset($data_products)):
              foreach ($data_products as $product): 
            ?>
            
            <tr>
              <td class="v-align-middle ">
                <img width="75" data-src-retina="<?php echo base_url() ?>assets/img/product/no-image.png" data-src="<?php echo base_url() ?>assets/img/product/no-image.png" alt="Profile Image" src="<?php echo base_url() ?>assets/img/product/no-image.png">
              </td>
              <td class="v-align-middle ">
                <p><?php echo $product->barcode; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $product->name; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $product->category; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $product->supplier; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $product->description; ?></p>
              </td>
              <td class="v-align-middle">
                <a data-target="#delete_<?php echo $product->id; ?>" data-toggle="modal" class="text-danger" ><i class="pg-trash_line"></i></a>
                <a class="text-success" href="<?php echo base_url('product/action/' . $product->id); ?>">
                  <i class="fa fa-edit"></i>
                </a>
                <!-- MODAL STICK UP  -->
                <div class="modal fade stick-up" id="delete_<?php echo $product->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                          <a href="<?php echo base_url('product/delete/' . $product->id); ?>" class="btn btn-danger">Ya</a>
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
<!-- END card -->
</div>