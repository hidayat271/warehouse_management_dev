<!-- START JUMBOTRON -->
<div class="jumbotron" data-pages="parallax">
  <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
    <div class="inner">
      <!-- START BREADCRUMB -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inventory</a></li>
        <li class="breadcrumb-item active">Stock Op Name</li>
      </ol>
      <!-- END BREADCRUMB -->
    </div>
  </div>
</div>
<!-- END JUMBOTRON -->
<form action="<?php echo base_url('stock_op_name/process/'); ?>" id="form-customer" role="form" autocomplete="off" method="POST" novalidate>

  <div class="container-fluid container-fixed-lg">
    <div class="card card-transparent">
          <div class="row">
          <div class="col-md-9">
            <div class="form-group form-group-default input-group typehead" id="custom-product-stock-opname">
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
                          <a href="<?php echo base_url('stock_op_name/destroy'); ?>" class="btn btn-danger">Ya</a>
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
                  <th style="width:15%">Qty Sistem</th>
                  <th style="width:15%">Qty Fisik</th>
                  <th style="width:15%">Qty Rusak</th>
                  <th style="width:15%">Qty Return</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($this->cart->contents() as $items): ?>
                  <tr>
                  <td>
                      <a href="<?php echo base_url('stock_op_name/remove_shopping/' . $items['rowid']); ?>"><i class="fa fa-close"></i></a>
                      <?php echo $items['barcode'] ?>
                      <span class="label label-success"><?php echo $items['barcode_iventoty'] ?></span>       
                    </td>
                  <td class="v-align-middle">
                    <p><?php echo $items['name'] ?></p>
                    <input type="hidden" name="inventory_id[]" value="<?php echo $items['inventory_id'] ?>">       
                    <input type="hidden" name="qty_awal[]" value="<?php echo $items['qty_fisik'] ?>">       
                  </td>
                  <td>
                    <p id="qtyasli_<?php echo $items['rowid'] ?>"><?php echo $items['qty_fisik'] ?></p> 
                  </td>
                  <td>
                    <input name="fisik_<?php echo $items['inventory_id'] ?>" id="qtyfisik_<?php echo $items['rowid'] ?>" type="text" value="<?php echo $items['qty'] ?>" placeholder="" class="entry_data form-control input-sm" style="width: 25px; height: 20px; padding: 5px !important; min-height: 20px;">
                  </td>
                  <td>
                    <input name="rusak_<?php echo $items['inventory_id'] ?>" id="qtyrusak_<?php echo $items['rowid'] ?>" type="text" placeholder="" class="entry_data form-control input-sm" style="padding: 5px !important; min-height: 20px;">
                  </td>
                  <td>
                    <input name="return_<?php echo $items['inventory_id'] ?>" id="qtyreturn_<?php echo $items['rowid'] ?>" type="text" placeholder="" class="entry_data form-control input-sm" style="padding: 5px !important; min-height: 20px;">
                  </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
  </div>

</form>