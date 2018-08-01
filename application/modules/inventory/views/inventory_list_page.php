<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('inventory') ?>">inventory</a></li>
        <li class="breadcrumb-item active">List inventory</li>
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
              <th style="width:15%">Kode</th>
              <th style="width:30%">Nama Pegawai</th>
              <th style="width:20%">Username</th>
              <th style="width:15%">Last Update</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(isset($data_inventorys)):
              foreach ($data_inventorys as $inventory): 
            ?>
            
            <tr>
              <td class="v-align-middle ">
                <p><?php echo $inventory->code; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $inventory->product; ?></p>
                <?php echo get_product($inventory->product); ?>
              </td>
              <td class="v-align-middle">
                <p><?php echo $inventory->qty_limit; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $inventory->updated_at; ?></p>
              </td>
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