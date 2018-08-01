<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('store') ?>">Store</a></li>
        <li class="breadcrumb-item active">List Store</li>
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
      <a class="btn btn-primary pull-right" href="<?php echo base_url('store/action'); ?>">Tambah Store</a>
      <div class="card-title">Data Store</div>
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-hover" id="basicTable">
          <thead>
            <tr>
              <th style="width:20%">Kode</th>
              <th style="width:20%">Nama Store</th>
              <th style="width:29%">Username</th>
              <th style="width:15%">Telepon</th>
              <th style="width:15%">Last Update</th>
              <th style="width:15%">#</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(isset($data_stores)):
              foreach ($data_stores as $stores): 
            ?>
            
            <tr>
              <td class="v-align-middle ">
                <p><?php echo $stores->code; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $stores->name; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $stores->area; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $stores->telepon; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $stores->jenis; ?></p>
              </td>
              <td class="v-align-middle">
                <a data-target="#delete_<?php echo $stores->id; ?>" data-toggle="modal" class="text-danger" ><i class="pg-trash_line"></i></a>
                <a class="text-success" href="<?php echo base_url('store/action/' . $stores->id); ?>">
                  <i class="fa fa-edit"></i>
                </a>
                <!-- MODAL STICK UP  -->
                <div class="modal fade stick-up" id="delete_<?php echo $stores->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                          <a href="<?php echo base_url('store/delete/' . $stores->id); ?>" class="btn btn-danger">Ya</a>
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