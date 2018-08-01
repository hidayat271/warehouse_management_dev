<!-- BEGIN SIDEBAR MENU ITEMS-->
<ul class="menu-items">
  <li class="m-t-30">
    <a href="#">
      <span class="title">Dashboard</span>
    </a>
    <span class="icon-thumbnail"><i class="pg-home"></i></span>
  </li>
    <li class="">
        <a href="<?= base_url('product'); ?>"><span class="title">Product</span></a>
        <span class="icon-thumbnail"><i class="fa fa-tag"></i></span>
    </li>
    <li class="">
        <a href="<?= base_url('customer'); ?>"><span class="title">Customers</span></a>
        <span class="icon-thumbnail">Cu</span>
    </li>
  <li class="">
      <a href="<?= base_url('supplier'); ?>"><span class="title">Supplier</span></a>
      <span class="icon-thumbnail">Su</span>
  </li>
    <li class="">
        <a href="javascript:;"><span class="title">Inventory</span>
            <span class="arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-cubes"></i></span>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url('inventory') ?>">Inventory List</a>
                <span class="icon-thumbnail">iL</span>
            </li>
            <li>
                <a href="<?php echo base_url('stock_op_name/action') ?>">Stock Op Name</a>
                <span class="icon-thumbnail">Son</span>
            </li>
        </ul>
    </li> 
  <li class="">
        <a href="javascript:;"><span class="title">Logistik</span>
            <span class="arrow"></span></a>
        <span class="icon-thumbnail"><i class="fa fa-cubes"></i></span>
        <ul class="sub-menu">
            <li class="">
                <a href="javascript:;"><span class="title">Logistic In</span>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">Li</span>
                <ul class="sub-menu" style="">
                  <li>
                    <a href="<?= base_url('dialy_logisin'); ?>">Daily Logistic In</a>
                    <span class="icon-thumbnail">DLi</span>
                  </li>
                  <li>
                        <a href="<?= base_url('logisin_new_product'); ?>">New Product</a>
                        <span class="icon-thumbnail">Id</span>
                    </li>
                  <li>
                    <a href="<?= base_url('logisin_repeat_order'); ?>">Repeat Order</a>
                    <span class="icon-thumbnail">Ro</span>
                  </li>
                  </ul>
                </li>

                 <li class="">
                <a href="javascript:;"><span class="title">Logistic Out</span>
                <span class="arrow"></span></a>
                <span class="icon-thumbnail">Li</span>
                <ul class="sub-menu" style="">
                  <li>
                    <a href="<?= base_url('dialy_logisout'); ?>">Daily Logistic Out</a>
                    <span class="icon-thumbnail">DLi</span>
                  </li>
                  <li>
                    <a href="<?= base_url('logisout_order_toko'); ?>">Order Toko</a>
                    <span class="icon-thumbnail">Ro</span>
                  </li>
                  </ul>
                </li>
              </ul>
            </li>
  <li class="">
    <a href="<?php echo base_url('employees'); ?>"><span class="title">Employee</span></a>
    <span class="icon-thumbnail"><i class="fa fa-users"></i></span>
  </li>
  <li class="">
    <a href="javascript:;"><span class="title">Settings</span>
    <span class="arrow"></span></a>
    <span class="icon-thumbnail"><i class="fa fa-cogs"></i></span>
    <ul class="sub-menu">
      <li class="">
        <a href="javascript:;">
          <span class="title">Stores & Warehouse</span>
        </a>
        <span class="icon-thumbnail">SW</span>
        <ul class="sub-menu">
          <li>
            <a href="<?= base_url('store') ?>">List Store & Warehouse</a>
            <span class="icon-thumbnail">LS</span>
          </li>
          <li>
            <a href="<?= base_url('store/action') ?>">New Store & Warehouse</a>
            <span class="icon-thumbnail">NS</span>
          </li>
        </ul>
      </li>
      <li class="">
        <a href="<?= base_url('category_product') ?>">
          <span class="title">Categories Product</span>
        </a>
        <span class="icon-thumbnail">CP</span>
      </li>
    </ul>
  </li>
</ul>