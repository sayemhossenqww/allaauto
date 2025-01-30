<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $order->number }}</title>
  <style>
    @page { size: A5 landscape;  margin: 10mm; }
    body {
      font-family: auto;
      margin: 5px 20px 20px 20px;
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
      margin: 20px;
  }
  .logos{
    align-content: center;
    display: flex;
    justify-content: center;
    max-width: 253px;
    align-items: center;
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
@php
    \Illuminate\Support\Facades\Log::info('Order Details:', ['order' => $order]);
@endphp
<?php 
$qty = 0;
// dd($order);
Log::info('Order Details:', ['order' => $order]);
?>
    @if ($settings->logo)
    <div style="padding-right: 1rem;padding-left: 1rem;margin-bottom: 0.5rem">
        {!! $settings->logo  !!}
    </div>
@else
    @if ($settings->storeName)
    
    <div style="display: flex; align-items: center; justify-content: space-between;">
    <!-- Store Name -->
      <div style="text-align: left; font-size: 1.1rem;">
          <img src="{{ asset('images/newlogo.jpeg') }}" width="100" alt="logo"> 
          <div>
              <p class="mb-0 mt-0">{{ $settings->storeName }}</p>
              <!-- <p class="mb-0 mt-0">{{$settings->storeAddress }}</p> -->
              <!-- <p class="m-0">Processed By: {{ $order->user->name }}</p> -->
          </div>
      </div>
      <div>
        <div class="invoice-header">
          <h4 style="text-transform:uppercase; margin: 0; font-size: 20px;">Invoice</h4>
          <p class="m-0">No: {{ $order->number }}</p>
          <p class="m-0">{!! DNS1D::getBarcodeSVG($order->number, 'C128', 2, 30, 'black', false) !!}</p>
          <!-- <p class="m-0">Currency: US</p> -->
        </div>
      </div>
      <div>
    <p class="m-0">Date: {{ $order->date_view }}</p>

    @if ($order->customer)
    <div class="customer-info">
        <p class="m-0"><strong>Customer Information</strong></p>
        <p class="m-0"><strong>Name:</strong> {{ $order->customer->name }}</p>
        <!-- <p class="m-0"><strong>Email:</strong> {{ $order->customer->email }}</p> -->
        <p class="m-0"><strong>Mobile:</strong> {{ $order->customer->mobile }}</p>
        <p class="m-0"><strong>City:</strong> {{ $order->customer->city }}</p>
    </div>
@endif


</div>

    </div>    
    @endif
@endif
<div class="logos">
  <img src="{{ asset('images/bmw.png') }}" width="70" height="70" alt="">
  <img src="{{ asset('images/landRover.png') }}" width="140" height="140" alt="">
  <img src="{{ asset('images/mercedes.png') }}" width="70" height="70" alt="">
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
      <td>{{ $detail->product->description }}</td>
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


    <table class="summery" style="max-width:250px;">
      <tbody>
        
          @if ($order->discount > 0)
          <tr>
            <td>Discount:</td>
            <td>{{ $order->discount_view }}</td>
          </tr>
          @endif

          @if ($order->is_delivery)
            <tr>
              <td>@lang('DELIVERY CHARGE'):</td>
              <td>{{ $order->delivery_charge_view }}</td>
            </tr>
          @endif

          @if ($order->tax_rate > 0)
            @if ($order->tax_type == 'add')
              <tr>
                <td>@lang('VAT'):</td>
                <td>{{ $order->tax_rate }}</td>
              </tr>
              @else
                <tr>
                  <td>@lang('SUBTOTAL'):</td>
                  <td>{{ $order->subtotal_view }}</td>
                </tr>
                <tr>
                  <td>@lang('Tax Amount'):</td>
                  <td>{{ $order->tax_amount_view }}</td>
                </tr>
                <tr>
                  <td>VAT {{ $order->tax_rate }}%:</td>
                  <td>{{ $order->vat_view }}</td>
                </tr>
              @endif
          @endif

          <tr>
            <td>TOTAL:</td>
            <td>{{ $order->total_view }}</td>
          </tr>
          <tr>
            <td>In Word: </td>
            <td>{{ numberToWords($order->total) }}</td>
          </tr>
      </tbody>
    </table>

    <!-- Discoutn -->
    {{-- @if ($order->discount > 0)
    <div>Discount: {{ $order->discount_view }}</div>
    @endif --}}
    <!-- Delivery Charges -->
    {{-- @if ($order->is_delivery)
        @if ($order->delivery_charge > 0)
        <div>@lang('DELIVERY CHARGE'): {{ $order->delivery_charge_view }}</div>
        @endif
    @endif --}}
    <!-- Tax -->
    @if ($order->tax_rate > 0)
        {{-- @if ($order->tax_type == 'add')
        <div>VAT: {{ $order->tax_rate }}%</div>
        @else
        <div>SUBTOTAL: {{ $order->subtotal_view }}</div> --}}
        {{-- <div>TAX.AMOUNT: {{ $order->tax_amount_view }}</div> --}}
        {{-- <div>VAT {{ $order->tax_rate }}%: {{ $order->vat_view }}</div> --}}
        {{-- @endif --}}
    @endif
    {{-- <div>TOTAL: {{ $order->total_view }}</div> --}}
    {{-- <div> {{ numberToWords($order->total) }}</div> --}}
    {{-- <div>{{ $order->receipt_exchange_rate }}</div> --}}
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
</script>