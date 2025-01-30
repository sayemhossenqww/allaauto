<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $order->number }}</title>
  <style>
    @page { size: A5 landscape;  margin: 0mm; }
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
    <!-- Store Name -->
    <div style="flex: 0 0 46%; text-align: left; font-size: 1.5rem;">
        {{ $settings->storeName }}
    </div>

    <!-- Logo -->
    <div style="flex: 0 0 54%; text-align: start;">
        <img src="{{ asset('images/newlogo.jpeg') }}" width="100" alt="logo">
    </div>
</div>    
    @endif
@endif
<div class="logos">
  <img src="{{ asset('images/bmw.png') }}" width="70" height="70" alt="">
  <img src="{{ asset('images/landRover.png') }}" width="100" height="100" alt="">
  <img src="{{ asset('images/mercedes.png') }}" width="70" height="70" alt="">
</div>
<div class="invoice-header">
  <p>
    Invoice #: {{ $order->number }}<br>
    <!-- Account #: 41110300<br> -->
    Date: {{ $order->date_view }}<br>
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

<div class="summary">
  <div class="left">
    <div class="qty">QTY: {{$qty}}</div>
  </div>
  <div class="right">
    <!-- Discoutn -->
    @if ($order->discount > 0)
    <div>Discount: {{ $order->discount_view }}</div>
    @endif
    <!-- Delivery Charges -->
    @if ($order->is_delivery)
        @if ($order->delivery_charge > 0)
        <div>@lang('DELIVERY CHARGE'): {{ $order->delivery_charge_view }}</div>
        @endif
    @endif
    <!-- Tax -->
    @if ($order->tax_rate > 0)
        @if ($order->tax_type == 'add')
        <div>VAT: {{ $order->tax_rate }}%</div>
        @else
        <div>SUBTOTAL: {{ $order->subtotal_view }}</div>
        <div>TAX.AMOUNT: {{ $order->tax_amount_view }}</div>
        <div>VAT {{ $order->tax_rate }}%: {{ $order->vat_view }}</div>
        @endif
    @endif
    <div>TOTAL: {{ $order->total_view }}</div>
    <div> {{ numberToWords($order->total) }}</div>
    <div>{{ $order->receipt_exchange_rate }}</div>
  </div>
</div>
<div class="invoice-footer">
  <p>
    <span style="margin-right: 1rem">{{ $order->date_view }}</span> <span>{{ $order->time_view }}</span><br>
    {{ $order->number }}<br>
  {!! DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false) !!}<br>
  </p>
</div>

</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();
    });
</script>