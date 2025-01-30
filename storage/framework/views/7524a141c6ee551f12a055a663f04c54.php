<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e($order->number); ?></title>
  <style>
    @page { size: A5 landscape;  margin: 0mm; }
    body {
      font-family: auto;
      margin: 20px;
      padding: 0;
      line-height: 1.5;
    }
    .invoice-header, .invoice-footer {
      text-align: center;
      font-size: 14px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table:not(.summery) th, table:not(.summery) td {
      padding: 8px;
      text-align: center;
    }
    th {
      border-top: 1px solid #999;
      border-bottom: 1px solid #999;
      background-color: #f2f2f2;
    }
    td {
      border: none;
    }
    .summary {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 20px;
    font-size: 14px;
  }
  .summary .left {
    flex: 1;
    text-align: left;
    font-weight: bold;
  }
  .summary .right {
    flex: 2;
    text-align: right;
    font-weight: bold;
    display: flex;
    justify-content: end;
  }
  .summary .right div {
    margin-bottom: 2px; /* Adds spacing between lines */
  }
  .logos img {
      max-height: 50px;
      width: auto;
  }
  .logos{
    display: flex;
    justify-content: space-between;
    max-width: 253px;
    margin: 0 auto;
  }
  .store{
    display: flex;
    justify-content: space-between;
  }
  .mb-0{margin-bottom:0;}
  .mt-0{margin-top:0;}
  .m-0{margin:0;}
  </style>
</head>
<body>
<?php 
$qty = 0;
// dd($order);
?>
    <?php if($settings->logo): ?>
    <div style="padding-right: 1rem;padding-left: 1rem;margin-bottom: 0.5rem">
        <?php echo $settings->logo; ?>

    </div>
<?php else: ?>
    <?php if($settings->storeName): ?>
    
    <div style="display: flex; align-items: center; justify-content: space-between;">
    <!-- Store Name -->
      <div style="text-align: left; font-size: 1.1rem;">
          <img src="<?php echo e(asset('images/newlogo.jpeg')); ?>" width="100" alt="logo"> 
          <div>
              <p class="mb-0 mt-0"><?php echo e($settings->storeName); ?></p>
              <p class="mb-0 mt-0"><?php echo e($settings->storeAddress); ?></p>
          </div>
      </div>
      <div>
        <div class="invoice-header">
          <h4 style="text-transform:uppercase; margin: 0; font-size: 20px;">Invoice</h4>
          <p class="m-0">No: <?php echo e($order->number); ?></p>
          <p class="m-0"><?php echo DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false); ?></p>
          <p class="m-0">Currency: US</p>
        </div>
      </div>
      <div>
        <p class="m-0">Date: <?php echo e($order->date_view); ?></p>
        <p class="m-0">Name: <?php echo e($order->user->name); ?></p>
      </div>
    </div>    
    <?php endif; ?>
<?php endif; ?>
<div class="logos">
  <img src="<?php echo e(asset('images/bmw.png')); ?>" width="70" height="70" alt="">
  <img src="<?php echo e(asset('images/landRover.png')); ?>" width="100" height="100" alt="">
  <img src="<?php echo e(asset('images/mercedes.png')); ?>" width="70" height="70" alt="">
</div>
<table>
  <thead>
    <tr>
      <th>Code</th>
      <th>Description</th>
      <th>Qty</th>
      <th>Price</th>
      <th>Discount</th>
      <th>VAT</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $order->order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $qty += $detail->quantity;
    ?>

    <tr> 
      <td><?php echo e($detail->product->name); ?></td>
      <td></td>
      <td><?php echo e($detail->quantity); ?></td>
      <td><?php echo e($detail->view_price); ?></td>
      <td></td>
      <td></td>
      <td><?php echo e($detail->view_total); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<div class="summary">
  <div class="left">
    <div class="qty">QTY: <?php echo e($qty); ?></div>
  </div>
  <div class="right">


    <table class="summery" style="max-width:250px;">
      <tbody>
        
          <?php if($order->discount > 0): ?>
          <tr>
            <td>Discount:</td>
            <td><?php echo e($order->discount_view); ?></td>
          </tr>
          <?php endif; ?>

          <?php if($order->is_delivery): ?>
            <tr>
              <td><?php echo app('translator')->get('DELIVERY CHARGE'); ?>:</td>
              <td><?php echo e($order->delivery_charge_view); ?></td>
            </tr>
          <?php endif; ?>

          <?php if($order->tax_rate > 0): ?>
            <?php if($order->tax_type == 'add'): ?>
              <tr>
                <td><?php echo app('translator')->get('VAT'); ?>:</td>
                <td><?php echo e($order->tax_rate); ?></td>
              </tr>
              <?php else: ?>
                <tr>
                  <td><?php echo app('translator')->get('SUBTOTAL'); ?>:</td>
                  <td><?php echo e($order->subtotal_view); ?></td>
                </tr>
                <tr>
                  <td><?php echo app('translator')->get('Tax Amount'); ?>:</td>
                  <td><?php echo e($order->tax_amount_view); ?></td>
                </tr>
                <tr>
                  <td>VAT <?php echo e($order->tax_rate); ?>%:</td>
                  <td><?php echo e($order->vat_view); ?></td>
                </tr>
              <?php endif; ?>
          <?php endif; ?>

          <tr>
            <td>TOTAL:</td>
            <td><?php echo e($order->total_view); ?></td>
          </tr>
          <tr>
            <td>In Word: </td>
            <td><?php echo e(numberToWords($order->total)); ?></td>
          </tr>
      </tbody>
    </table>

    <!-- Discoutn -->
    
    <!-- Delivery Charges -->
    
    <!-- Tax -->
    <?php if($order->tax_rate > 0): ?>
        
        
        
        
    <?php endif; ?>
    
    
    
  </div>
</div>
<div class="invoice-footer">

</div>

</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script><?php /**PATH /Users/mohammadmahbub/Downloads/Alla_Auto_Parts/www/resources/views/orders/print/en.blade.php ENDPATH**/ ?>