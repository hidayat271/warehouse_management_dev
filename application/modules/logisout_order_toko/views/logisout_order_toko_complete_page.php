<nav class="navbar navbar-default bg-master-lighter sm-padding-10 full-width p-t-0 p-b-0" role="navigation">
  <div class="container-fluid full-width">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header text-center">
      <button type="button" class="navbar-toggle collapsed btn btn-link no-padding" data-toggle="collapse" data-target="#sub-nav">
      <i class="pg pg-more v-align-middle"></i>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="sub-nav">
      <div class="row">
        <div class="col-sm-4">
          <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="fa fa-print"></i></a></li>
            <li class="nav-item"><a href="#" data-toggle="tooltip" data-placement="bottom" title="Download"><i class="fa fa-download"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<div class="container-fluid container-fixed-lg">
  <ul class="pb m-t-10">
    <li><span>1</span> Draft <i class="pg pg-arrow_right"></i></li>
    <li class="pb current"><span>2</span> Completed <i class="pg pg-arrow_right"></i></li>
    <li><span>3</span> Approved</li>
  </ul>

  <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <!-- START card -->
            <div class="card card-default m-t-20">
              <div class="card-block">
                <div class="invoice padding-50 sm-padding-10">
                  <div>
                    <div class="pull-left">
                      <img width="235" alt="" class="invoice-logo" data-src-retina="<?php echo base_url() ?>assets/img/logo.png" data-src="<?php echo base_url() ?>assets/img/logo.png" src="<?php echo base_url() ?>assets/img/logo.png">
                      <address class="m-t-10">
                        FNS - <?php echo $this->session->userdata('account')['store_name']; ?>
                        <br><?php echo $this->session->userdata('account')['store_address']; ?> <?php echo $this->session->userdata('account')['store_area']; ?>
                        <br><?php echo $this->session->userdata('account')['store_telepon']; ?>
                        <br>
                      </address>
                    </div>
                    <div class="pull-right sm-m-t-20">
                      <h2 class="font-montserrat all-caps hint-text">Faktur Logistik Out</h2>
                      <span class=" label label-success p-t-5 m-l-5 p-b-5 inline fs-12">Order Toko</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <br>
                  <br>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-lg-7 col-sm-height sm-no-padding">
                        <p class="small no-margin">Faktur <?php echo $data_logisin->faktur ?></p>
                        <?php $request_to_store = get_store($data_logisin->request_to_store) ?>
                        <h5 class="semi-bold m-t-0">[<?php echo $request_to_store->code ?>] <?php echo $request_to_store->name ?> </h5>
                        <address>
                                            <strong><?php echo $request_to_store->telepon ?></strong>
                                            <br><?php echo $request_to_store->address ?>
                                        </address>
                      </div>
                      <div class="col-lg-5 sm-no-padding sm-p-b-20 d-flex align-items-end justify-content-between">
                        <div>
                          <div class="font-montserrat bold all-caps">Invoice No :</div>
                          <div class="font-montserrat bold all-caps">Invoice date :</div>
                          <div class="clearfix"></div>
                        </div>
                        <div class="text-right">
                          <div class=""><?php echo $data_logisin->code ?></div>
                          <div class=""><?php echo $data_logisin->draft_at ?></div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive table-invoice">
                    <table class="table m-t-50">
                      <thead>
                        <tr>
                          <th class="">Keterangan Produk</th>
                          <th class="text-center">Qty</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $data_detail = get_detail_logist($data_logisin->id); ?>
                        <?php 
                          $total = 0;
                          foreach ($data_detail as $detail):
                            $produk = get_product_id($detail->code_product);
                            $inventory = get_inventory_detail($produk->barcode);
                        ?>
                        <tr>
                          <td class="">
                            <p class="text-black"><?php echo $produk->name ?></p>
                            <p class="small hint-text">
                              <?php echo $inventory->code ?>
                            </p>
                          </td>
                          <?php $total++; ?>
                          <td class="text-center"><?php echo $inventory->qty_fisik ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="p-l-15 p-r-15">
                    <div class="row b-a b-grey">
                      <div class="col-md-7 p-l-15 sm-p-t-25 clearfix sm-p-b-15 d-flex flex-column justify-content-center">
                        <p>Hormat Kami</p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p>(_________________)</p>
                      </div>
                      <div class="col-md-5 text-right bg-master-darker col-sm-height padding-15 d-flex flex-column justify-content-center align-items-end">
                        <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">Total</h5>
                        <h1 class="no-margin text-white"><?php echo $total; ?> Item</h1>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <p class="small hint-text">Faktur ini merupakan rekap dari faktur barang masuk, barang yang dimaksud adalah barang yang awalnya belum terdaftar didalam sistem.</p>
                  
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->

</div>