<table class="table table-hover" id="basicTable">
  <thead>
    <tr>
      <th style="width:10%">Barcode</th>
      <th style="width:30%">Nama Barang</th>
      <th style="width:15%">Qty</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($this->cart->contents() as $items): ?>
      <tr>
      <td>
          <a href="<?php echo base_url('logisout_order_toko/remove_shopping/' . $items['rowid']); ?>"><i class="fa fa-close"></i></a>
          <?php echo $items['barcode'] ?>
          <span class="label label-success"><?php echo $items['barcode_iventoty'] ?></span>       
        </td>
      <td class="v-align-middle">
        <p><?php echo $items['name'] ?></p>       
      </td>
      <td>
        <?php echo $items['qty'] ?>
      </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>