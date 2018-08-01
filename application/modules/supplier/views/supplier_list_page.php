<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('supplier') ?>">Suppliers</a></li>
        <li class="breadcrumb-item active">List Suppliers</li>
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
    <div class="card-header ">
      <a class="btn btn-primary pull-right" href="<?php echo base_url('supplier/action'); ?>">Tambah Supplier</a>
      <div class="card-title">Data Supplier</div>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-hover" id="basicTable">
          <thead>
            <tr>
              <th style="width:15%">Kode</th>
              <th style="width:30%">Nama Supplier</th>
              <th style="width:20%">Kontak</th>
              <th style="width:15%">Telepon</th>
              <th style="width:15%">Email</th>
              <th style="width:15%">#</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(isset($data_suppliers)):
              foreach ($data_suppliers as $supplier): 
            ?>
            
            <tr>
              <td class="v-align-middle ">
                <p><?php echo $supplier->code; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $supplier->name; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $supplier->contact; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $supplier->phone; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $supplier->email; ?></p>
              </td>
              <td class="v-align-middle">
                <a data-target="#delete_<?php echo $supplier->id; ?>" data-toggle="modal" class="text-danger" ><i class="pg-trash_line"></i></a>
                <a class="text-success" href="<?php echo base_url('supplier/action/' . $supplier->id); ?>">
                  <i class="fa fa-edit"></i>
                </a>
                <!-- MODAL STICK UP  -->
                <div class="modal fade stick-up" id="delete_<?php echo $supplier->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Informasi <span class="semi-bold">Delete</span></h5>
                        <p>Apakah anda akan menghapus data Supplier?</p>
                      </div>
                      <div class="modal-body">
                        <div class="text-right">
                          <a href="<?php echo base_url('supplier/delete/' . $supplier->id); ?>" class="btn btn-danger">Ya</a>
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