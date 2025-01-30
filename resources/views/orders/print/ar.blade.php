<html lang="en" dir="rtl">

<head>
    <title>{{ $order->number }} </title>
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
@if ($settings->logo)
    <div style="padding-right: 1rem;padding-left: 1rem;margin-bottom: 0.5rem">
        {!! $settings->logo  !!}
    </div>
@else
    @if ($settings->storeName)
    
    <div style="display: flex; align-items: center; justify-content: space-between;">
   

    <!-- Logo -->
    <div style="flex: 0 0 54%; text-align: end;">
        <img src="{{ asset('images/newlogo.jpeg') }}" width="100" alt="logo">
    </div>

     <!-- Store Name -->
     <div style="flex: 0 0 46%; text-align: left; font-size: 1.5rem;">
        {{ $settings->storeName }}
    </div>
</div>    
    @endif
@endif
<div class="logos">
    <img src="{{ asset('images/mercedes.png') }}" width="70" height="70" alt="">
    <img src="{{ asset('images/landRover.png') }}" width="100" height="100" alt="">
    <img src="{{ asset('images/bmw.png') }}" width="70" height="70" alt="">
</div>
<div class="invoice-header">
  <p>
  رقم الحساب #: {{ $order->number }}<br>
    <!-- Account #: 41110300<br> -->
    التاريخ: {{ $order->date_view }}<br>
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
    @foreach ($order->order_details as $detail)
    @php
    $qty += $detail->quantity;
    @endphp

    <tr> 
      <td>{{ $detail->product->name }}</td>
      <td></td>
      <td>{{ $detail->quantity }}</td>
      <td>{{ $detail->view_price }}</td>
      <td></td>
      <td></td>
      <td>{{ $detail->view_total }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

    @if ($order->discount > 0)
        <div style="display: flex;">
            <div>الخصم</div>
            <div style="margin-right: auto">{{ $order->discount_view }}</div>
        </div>
    @endif
    @if ($order->is_delivery)
        @if ($order->delivery_charge > 0)
            <div style="display: flex;">
                <div>رسوم التصويل</div>
                <div style="margin-right: auto">{{ $order->delivery_charge_view }}</div>
            </div>
        @endif
    @endif
    @if ($order->tax_rate > 0)
        @if ($order->tax_type == 'add')
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة</div>
                <div style="margin-right: auto">{{ $order->tax_rate }}%</div>
            </div>
        @else
            <div style="display: flex;">
                <div>المجموع</div>
                <div style="margin-right: auto">{{ $order->subtotal_view }}</div>
            </div>
            <div style="display: flex;">
                <div>قيمة الضريبة</div>
                <div style="margin-right: auto">{{ $order->tax_amount_view }}</div>
            </div>
            <div style="display: flex;">
                <div>ضريبة القيمة المضافة {{ $order->tax_rate }}%</div>
                <div style="margin-right: auto">{{ $order->vat_view }}</div>
            </div>
        @endif
    @endif
    <div style="font-weight: 700">
        <div>الإجمالي</div>
        <div style="display: flex;">
            <div style="margin-right: auto">{{ $order->total_view }}</div>
        </div>
        <div style="display: flex;">
            <div style="margin-right: auto">
                {{ $order->receipt_exchange_rate }}
            </div>
        </div>
        <div> {{ numberToWords($order->total) }}</div>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        <span style="margin-right: 1rem">{{ $order->date_view }}</span> <span>{{ $order->time_view }}</span>
    </div>
    <div style="text-align: center !important;margin-bottom: 0.5rem !important;" dir="ltr">
        {{ $order->number }}
    </div>
    @if ($settings->storeAdditionalInfo)
        <div style="font-size: 0.875em;text-align: center !important;margin-bottom: 0.5rem !important;">
            {{ $settings->storeAdditionalInfo }}
        </div>
    @endif
    <div style="display: flex;align-items: center !important;justify-content: center">
        {!! DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false) !!}
    </div>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>
