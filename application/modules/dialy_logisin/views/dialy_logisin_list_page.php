<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Logistik</a></li>
        <li class="breadcrumb-item"><a href="#">Logistik In</a></li>
        <li class="breadcrumb-item active">Daily Logistik In</li>
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
              <th style="width:15%">No Faktur</th>
              <th style="width:15%">Faktur Supplier</th>
              <th style="width:30%">Supplier</th>
              <th style="width:20%">Tanggal Draft</th>
              <th style="width:15%">Tanggal Approve</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if(isset($data_logisin)):
              foreach ($data_logisin as $logisin): 
            ?>
            
            <tr>
              <td class="v-align-middle ">
                <p><?php echo $logisin->code; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $logisin->faktur; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $logisin->supplier; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $logisin->draft_at; ?></p>
              </td>
              <td class="v-align-middle">
                <p><?php echo $logisin->approved_at; ?></p>
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