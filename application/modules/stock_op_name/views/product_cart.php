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
                  </td>
                  <td>
                    <p id="qtyasli_<?php echo $items['rowid'] ?>"><?php echo $items['qty_fisik'] ?></p> 
                  </td>
                  <td>
                    <input name="fisik_<?php echo $items['inventory_id'] ?>[]" id="qtyfisik_<?php echo $items['rowid'] ?>" type="text" value="<?php echo $items['qty'] ?>" placeholder="" class="entry_data form-control input-sm" style="width: 25px; height: 20px; padding: 5px !important; min-height: 20px;">
                  </td>
                  <td>
                    <input name="rusak_<?php echo $items['inventory_id'] ?>[]" id="qtyrusak_<?php echo $items['rowid'] ?>" type="text" placeholder="" class="entry_data form-control input-sm" style="padding: 5px !important; min-height: 20px;">
                  </td>
                  <td>
                    <input name="return_<?php echo $items['inventory_id'] ?>[]" id="qtyreturn_<?php echo $items['rowid'] ?>" type="text" placeholder="" class="entry_data form-control input-sm" style="padding: 5px !important; min-height: 20px;">
                  </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>