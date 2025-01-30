<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo e($order->number); ?></title>
  <style>
    @page { size: auto;  margin: 0mm; }
    body {
      font-family: Arial, sans-serif;
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
    th, td {
      padding: 8px;
      text-align: center;
    }
    th {
      border-top: 2px solid #000;
      border-bottom: 2px solid #000;
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
  }
  .summary .right div {
    margin-bottom: 5px; /* Adds spacing between lines */
  }
  .logos{
    display: flex;
    justify-content: space-between;
  }
  .store{
    display: flex;
    justify-content: space-between;
  }
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
    <div style="flex: 0 0 46%; text-align: left; font-size: 1.5rem;">
        <?php echo e($settings->storeName); ?>

    </div>

    <!-- Logo -->
    <div style="flex: 0 0 54%; text-align: start;">
        <img src="<?php echo e(asset('images/newlogo.jpeg')); ?>" width="100" alt="logo">
    </div>
</div>    
    <?php endif; ?>
<?php endif; ?>
<div class="logos">
<img src="<?php echo e(asset('images/bmw.png')); ?>" width="70" height="70" alt="">
<img src="<?php echo e(asset('images/landRover.png')); ?>" width="100" height="100" alt="">
<img src="<?php echo e(asset('images/mercedes.png')); ?>" width="70" height="70" alt="">
</div>
<div class="invoice-header">
  <p>
    Invoice #: <?php echo e($order->number); ?><br>
    <!-- Account #: 41110300<br> -->
    Date: <?php echo e($order->date_view); ?><br>
    Currency: US
  </p>
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
    <!-- Discoutn -->
    <?php if($order->discount > 0): ?>
    <div>Discount: <?php echo e($order->discount_view); ?></div>
    <?php endif; ?>
    <!-- Delivery Charges -->
    <?php if($order->is_delivery): ?>
        <?php if($order->delivery_charge > 0): ?>
        <div><?php echo app('translator')->get('DELIVERY CHARGE'); ?>: <?php echo e($order->delivery_charge_view); ?></div>
        <?php endif; ?>
    <?php endif; ?>
    <!-- Tax -->
    <?php if($order->tax_rate > 0): ?>
        <?php if($order->tax_type == 'add'): ?>
        <div>VAT: <?php echo e($order->tax_rate); ?>%</div>
        <?php else: ?>
        <div>SUBTOTAL: <?php echo e($order->subtotal_view); ?></div>
        <div>TAX.AMOUNT: <?php echo e($order->tax_amount_view); ?></div>
        <div>VAT <?php echo e($order->tax_rate); ?>%: <?php echo e($order->vat_view); ?></div>
        <?php endif; ?>
    <?php endif; ?>
    <div>TOTAL: <?php echo e($order->total_view); ?></div>
    <div> <?php echo e(numberToWords($order->total)); ?></div>
    <div><?php echo e($order->receipt_exchange_rate); ?></div>
  </div>
</div>
<div class="invoice-footer">
  <p>
    <span style="margin-right: 1rem"><?php echo e($order->date_view); ?></span> <span><?php echo e($order->time_view); ?></span><br>
    <?php echo e($order->number); ?><br>
  <?php echo DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false); ?><br>
  </p>
</div>

</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script><?php /**PATH D:\2miniw\www\resources\views/orders/print/en.blade.php ENDPATH**/ ?>