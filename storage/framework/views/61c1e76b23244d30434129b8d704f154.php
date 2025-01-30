<html lang="en" dir="rtl">

<head>
    <title><?php echo e($order->number); ?> </title>
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
   

    <!-- Logo -->
    <div style="flex: 0 0 54%; text-align: end;">
        <img src="<?php echo e(asset('images/newlogo.jpeg')); ?>" width="100" alt="logo">
    </div>

     <!-- Store Name -->
     <div style="flex: 0 0 46%; text-align: left; font-size: 1.5rem;">
        <?php echo e($settings->storeName); ?>

    </div>
</div>    
    <?php endif; ?>
<?php endif; ?>
<div class="logos">
    <img src="<?php echo e(asset('images/mercedes.png')); ?>" width="70" height="70" alt="">
    <img src="<?php echo e(asset('images/landRover.png')); ?>" width="100" height="100" alt="">
    <img src="<?php echo e(asset('images/bmw.png')); ?>" width="70" height="70" alt="">
</div>
<div class="invoice-header">
  <p>
  رقم الحساب #: <?php echo e($order->number); ?><br>
    <!-- Account #: 41110300<br> -->
    التاريخ: <?php echo e($order->date_view); ?><br>
    العملة: US
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

    <?php if($order->discount > 0): ?>
        <div style="display: flex;">
            <div>الخصم</div>
            <div style="margin-right: auto"><?php echo e($order->discount_view); ?></div>
        </div>
    <?php endif; ?>
    <?php if($order->is_delivery): ?>
        <?php if($order->delivery_charge > 0): ?>
            <div style="display: flex;">
                <div>رسوم التصويل</div>
                <div style="margin-right: auto"><?php echo e($order->delivery_charge_view); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php if($order->tax_rate > 0): ?>
        <?php if($order->tax_type == 'add'): ?>
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة</div>
                <div style="margin-right: auto"><?php echo e($order->tax_rate); ?>%</div>
            </div>
        <?php else: ?>
            <div style="display: flex;">
                <div>المجموع</div>
                <div style="margin-right: auto"><?php echo e($order->subtotal_view); ?></div>
            </div>
            <div style="display: flex;">
                <div>قيمة الضريبة</div>
                <div style="margin-right: auto"><?php echo e($order->tax_amount_view); ?></div>
            </div>
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة <?php echo e($order->tax_rate); ?>%</div>
                <div style="margin-right: auto"><?php echo e($order->vat_view); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div style="font-weight: 700">
        <div>الإجمالي</div>
        <div style="display: flex;">
            <div style="margin-right: auto"><?php echo e($order->total_view); ?></div>
        </div>
        <div style="display: flex;">
            <div style="margin-right: auto">
                <?php echo e($order->receipt_exchange_rate); ?>

            </div>
        </div>
        <div> <?php echo e(numberToWords($order->total)); ?></div>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        <span style="margin-right: 1rem"><?php echo e($order->date_view); ?></span> <span><?php echo e($order->time_view); ?></span>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        <?php echo e($order->number); ?>

    </div>
    <?php if($settings->storeAdditionalInfo): ?>
        <div style="font-size: 0.875em;text-align: center !important;margin-bottom: 0.5rem !important;">
            <?php echo e($settings->storeAdditionalInfo); ?>

        </div>
    <?php endif; ?>
    <div style="display: flex;align-items: center !important;justify-content: center">
        <?php echo DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false); ?>

    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
<?php /**PATH D:\2miniw\www\resources\views/orders/print/ar.blade.php ENDPATH**/ ?>