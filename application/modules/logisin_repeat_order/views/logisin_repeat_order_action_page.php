<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Logistik</a></li>
        <li class="breadcrumb-item"><a href="#">Logistik In</a></li>
        <li class="breadcrumb-item active">Repeat Order</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->
<form action="<?php echo base_url('logisin_repeat_order/process/'); ?>" id="form-customer" role="form" autocomplete="off" method="POST" novalidate>
  <!-- START CONTAINER FLUID -->
  <div class="container-fluid container-fixed-lg">
    <ul class="pb m-t-10">
      <li class="pb current"><span>1</span> Draft <i class="pg pg-arrow_right"></i></li>
      <li><span>2</span> Completed <i class="pg pg-arrow_right"></i></li>
      <li><span>3</span> Approved</li>
    </ul>
    <div class="row">
      <div class="col-md-4 b-r b-dashed b-grey sm-b-b">
        <!-- START card -->
        <!-- START card -->
        <div class="card card-transparent">
          <div class="card-block">
            <p>Basic Information</p>
            <div class="form-group-attached">
              <div class="form-group form-group-default required">
                <label>No Faktur Toko</label>
                <input type="text" class="form-control" name="no_faktur" value="<?php echo set_value('no_faktur', (isset($data_logisin)) ? $data_logisin->name : $data_logisin_code); ?>" required>
              </div>
              <div class="form-group form-group-default required">
                <label>No Faktur Supplier</label>
                <input type="text" class="form-control" name="no_faktur_supplier" value="<?php echo set_value('no_faktur_supplier', (isset($data_logisin)) ? $data_logisin->name : ''); ?>" required>
              </div>
              <div class="form-group form-group-default typehead required" id="custom-supplier">
                <label>Supplier</label>
                <input type="text" class="form-control typeahead" name="supplier" value="<?php echo set_value('supplier', (isset($data_logisin)) ? $data_logisin->name : ''); ?>" required>
              </div>
              <div class="form-group form-group-default required">
                <label>Draft Date</label>
                <input type="text" class="form-control" name="draft_date" value="<?php echo set_value('draft_date', (isset($data_logisin)) ? $data_logisin->name : date('Y-m-d')); ?>" required>
              </div>
              <div class="form-group form-group-default required">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="description" value="<?php echo set_value('description', (isset($data_logisin)) ? $data_logisin->description : ''); ?>" required>
              </div>
            </div>
          </div>
        </div>
        <!-- END card -->
      </div>
      <div class="col-md-8">
        <!-- START card -->
        <div class="card card-transparent">
          <div class="row">
          <div class="col-md-9">
            <div class="form-group form-group-default input-group typehead" id="custom-product">
              <div class="form-input-group">
                  <label>Barcode atau nama produk</label>
                  <input type="text" name="product" class="form-control typeahead" value="" placeholder="Ketikan barcode atau nama produk">
              </div>
              <div class="input-group-addon">
                  <i class="fa fa-barcode"></i>
              </div>
            </div>
          </div>
          <div class="col-md-3">
          <div class="btn-group sm-m-t-10">
            <button type="submit" class="btn btn-default"><i class="fa fa-cart-plus"></i>
            </button>
            <a data-target="#reset" data-toggle="modal" class="btn btn-default text-danger" ><i class="pg-trash_line"></i></a>
            <!-- MODAL STICK UP  -->
                <div class="modal fade stick-up" id="reset" tabindex="-1" role="dialog" aria-hidden="true">
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
                          <a href="<?php echo base_url('logisin_repeat_order/destroy'); ?>" class="btn btn-danger">Ya</a>
                          <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.modal-content -->
          </div>
          </div>
          </div>
          <div class="table-responsive" id="data-cart">
            <table class="table table-hover" id="basicTable">
              <thead>
                <tr>
                  <th style="width:10%">Barcode</th>
                  <th style="width:30%">Nama Barang</th>
                  <th style="width:20%">Harga</th>
                  <th style="width:15%">Qty</th>
                  <th style="width:20%">Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($this->cart->contents() as $items): ?>
                  <tr>
                  <td>
                      <a href="<?php echo base_url('logisin_repeat_order/remove_shopping/' . $items['rowid']); ?>"><i class="fa fa-close"></i></a>
                      <?php echo $items['barcode'] ?>
                      <span class="label label-success"><?php echo $items['barcode_iventoty'] ?></span>       
                    </td>
                  <td class="v-align-middle">
                    <p><?php echo $items['name'] ?></p>       
                  </td>
                  <td>
                    <?php echo $items['price'] ?>
                  </td>
                  <td>
                    <?php echo $items['qty'] ?>
                  </td>
                  <td>
                    <?php echo $items['subtotal'] ?>
                  </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="4">
                    Grand Total
                  </td>
                  <td>
                    <?php echo $this->cart->total(); ?>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>