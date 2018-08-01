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