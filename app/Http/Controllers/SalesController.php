<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        $sales = OrderDetail::select(
            DB::raw('strftime("%Y-%m-%d", created_at) as date'),
            DB::raw('sum(total) as total'),
            DB::raw('sum(total_cost) as total_cost'),
            DB::raw('sum(quantity) as total_sold'),
            DB::raw('max(created_at) as createdAt'),
            DB::raw('created_at'),
            DB::raw('min(created_at) as createdAtt'),
        )->groupBy('date')->orderBy(DB::raw("createdAt"), 'DESC')->paginate(20);



        $salesOrder = Order::select(
            DB::raw('strftime("%Y-%m-%d", created_at) as date'),
            DB::raw('sum(discount) as sum_discount'),
            DB::raw('max(created_at) as createdAt'),
            DB::raw('min(created_at) as createdAtt'),
        )->groupBy('date')->orderBy(DB::raw("createdAt"), 'DESC')->paginate(20);


        return view("sales.index", [
            'sales' => $sales,
            'salesOrder' => $salesOrder,
        ]);
    }


    public function filter(Request $request)
    {
        $now = Carbon::now()->toDateString();
        $startDate =  $request->get('start_date', $now) . ' 00:00:00';
        $endDate =  $request->get('end_date', $now) . ' 23:59:59';

        $sales = OrderDetail::select(
            DB::raw('strftime("%Y-%m-%d", created_at) as date'),
            DB::raw('sum(total) as total'),
            DB::raw('sum(total_cost) as total_cost'),
            DB::raw('sum(quantity) as total_sold'),
            DB::raw('max(created_at) as createdAt'),
            DB::raw('created_at'),
            DB::raw('min(created_at) as createdAtt'),
        )->whereNull('service')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')->orderBy(DB::raw("createdAt"), 'DESC')

            ->paginate(20);

        $salesServices = OrderDetail::select(
            DB::raw('strftime("%Y-%m-%d", created_at) as date'),
            DB::raw('sum(total) as total'),
            DB::raw('sum(total_cost) as total_cost'),
            DB::raw('sum(quantity) as total_sold'),
            DB::raw('max(created_at) as createdAt'),
            DB::raw('created_at'),
            DB::raw('min(created_at) as createdAtt'),
        )->whereNotNull('service')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')->orderBy(DB::raw("createdAt"), 'DESC')

            ->paginate(20);

        $salesOrder = Order::select(
            DB::raw('strftime("%Y-%m-%d", created_at) as date'),
            DB::raw('sum(discount) as sum_discount'),
            DB::raw('max(created_at) as createdAt'),
            DB::raw('min(created_at) as createdAtt'),
            DB::raw('created_at'),
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')->orderBy(DB::raw("createdAt"), 'DESC')->paginate(20);


        return view("sales.filter", [
            'sales' => $sales,
            'salesOrder' => $salesOrder,
            'salesServices' => $salesServices,
        ]);
    }





    public function show(Request $request, string $date)
    {


        $sales = OrderDetail::select(
            'products.category_id',
            'categories.name as category_name', // Select the category name
            'order_details.product_id',
            DB::raw('SUM(order_details.quantity) as qty'),
            DB::raw('SUM(order_details.total) as total'),
            DB::raw('SUM(order_details.total_cost) as total_cost')
        )
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('categories', 'products.category_id', '=', 'categories.id') // Join with categories table
        ->whereHas('order', function ($q) use ($date) {
            $q->whereDate('created_at', $date);
        })
        ->groupBy('products.category_id', 'categories.name', 'order_details.product_id') // Group by category name
        ->orderBy('qty', 'DESC')
        ->with(['product', 'order'])
        ->get();

        $sales_category = OrderDetail::select(
            'products.category_id',
            'categories.name as category_name',
            DB::raw('SUM(order_details.quantity) as total_qty'), // Total quantity per category
            DB::raw('SUM(order_details.total) as total_sales'), // Total sales per category
            DB::raw('SUM(order_details.total_cost) as total_cost') // Total cost per category
        )
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->whereHas('order', function ($q) use ($date) {
            $q->whereDate('created_at', $date);
        })
        ->groupBy('products.category_id', 'categories.name') // Group by category
        ->orderBy('total_qty', 'DESC') // Order by total quantity
        ->with(['product', 'order'])
        ->get();

        $expenses = Expense::whereDate('date', $date)->sum('amount');
        $payments = Payment::whereDate('date', $date)->sum('amount');

        return view("sales.show", [
            'sales' => $sales,
            'sales_category' => $sales_category,
            'settings' => Settings::getValues(),
            'date' => Carbon::parse($date)->format('d F Y'),
            'total_sales' => $request->ts,
            'expenses' => $expenses,
            'payments' => $payments,
            'serial_number' => Carbon::parse($date)->format('ymd')
        ]);
    }
}
