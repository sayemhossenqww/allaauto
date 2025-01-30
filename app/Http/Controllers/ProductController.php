<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductSelectResourceCollection;
use App\Models\Category;
use App\Models\Product;
use App\Models\Settings;
use App\Traits\Availability;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    use Availability;

    public $data;

    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $hasExchangeRate = config('settings')->enableExchangeRateForItems;
        // $products = Product::all();
        $sum_cost = Product::sum('cost');
        $sum_unit_price = Product::sum('retailsale_price');
        // $sum_box_price = Product::sum('box_price');

        $totalPrice = Product::select(DB::raw('SUM(cost * in_stock) as total_price'))
            ->value('total_price');
        $totalSalePrice = Product::select(DB::raw('SUM(retailsale_price * in_stock) as total_price'))
            ->value('total_price');

        // $total_whole_cost = 0;
        // $total_whole_unit_price = 0;
        // $total_whole_box_price = 0;
        // foreach ($products as $p) {
        //     $total_whole_cost += $p->cost * $p->in_stock;
        //     $total_whole_unit_price += $p->unit_price * $p->in_stock;
        //     $total_whole_box_price += $p->box_price * $p->in_stock / 10;
        // }


        $this->data['categories'] = Category::orderBy('sort_order', 'ASC')->get();
        $this->data['total_cost'] = currency_format($sum_cost ?? 0);
        $this->data['whole_total_cost'] = currency_format($totalPrice ?? 0);
        $this->data['whole_unit_cost'] = currency_format($totalSalePrice ?? 0);
        // $this->data['total_whole_cost'] = currency_format($total_whole_cost, $hasExchangeRate).' ('.currency_format($sum_cost).')';

        // $this->data['total_unit_price'] = currency_format($sum_unit_price, $hasExchangeRate).' ('.currency_format($sum_unit_price).')';
        $this->data['total_unit_price'] = currency_format($sum_unit_price ?? 0);

        // $this->data['total_whole_unit_price'] = currency_format($total_whole_unit_price, $hasExchangeRate).' ('.currency_format($total_whole_unit_price).')';
        // $this->data['total_box_price'] = currency_format($sum_box_price, $hasExchangeRate).' ('.currency_format($sum_box_price).')';
        // $this->data['total_whole_box_price'] = currency_format($total_whole_box_price, $hasExchangeRate).' ('.currency_format($total_whole_box_price).')';
        // $this->data['total_in_stock'] = Product::sum('in_stock');

        return view("products.index", $this->data);
    }

    public function import(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        // Count existing products
        $existingCount = Product::count();

        // Open the uploaded file
        $filePath = $request->file('file')->getRealPath();
        $newProductsCount = 0; // Counter for newly created products
        $importedCount = 0; // Counter for total imported data rows

        if (($handle = fopen($filePath, 'r')) !== false) {
            // Skip the header row
            fgetcsv($handle);

            // Read each row of the CSV file
            while (($data = fgetcsv($handle)) !== false) {
                $importedCount++; // Increment the imported data counter

                // Check if the product already exists
                if (Product::where('name', $data[1])->exists()) {
                    // Optionally log or handle the duplicate case
                    continue; // Skip this iteration if the product exists
                }

                // Map the CSV data to your Product model, skipping the ID
                Product::create([
                    'name' => $data[1], // Name
                    'description' => $data[2], // Description
                    'category_id' => $this->getCategoryId($data[3]), // Category
                    'cost' => $data[4], // Cost
                    'retailsale_price' => $data[5], // Retail Sale Price
                    'wholesale_price' => $this->extractPrice($data[6]), // Whole Cost
                    'in_stock' => $data[7], // In Stock
                    'is_active' => $data[8] === 'Active' ? 1 : 0, // Status
                    'retail_barcode' => $data[9],
                    'wholesale_barcode' => $data[10],
                    'sort_order' => 1 // Sort Order
                ]);

                $newProductsCount++; // Increment the counter for new products
            }
            fclose($handle);
        }

        // Total products after import
        $totalProducts = Product::count();

        // Alert messages
        $message = sprintf(
            "Total existing products: %d. New products imported: %d. Total rows in imported data: %d. Total products now: %d.",
            $existingCount,
            $newProductsCount,
            $importedCount,
            $totalProducts
        );

        return redirect()->back()->with("success", $message);
    }

    // Helper function to get category ID (implement this based on your categories)
    private function getCategoryId($categoryName)
    {
        // Assuming you have a Category model
        $category = Category::where('name', $categoryName)->first();
        return $category ? $category->id : null; // Return the category ID or null if not found
    }

    private function extractPrice($priceString)
    {
        // Use regex to extract the numeric value after the dollar sign
        preg_match('/\$\s*([\d,]+\.?\d*)/', $priceString, $matches);

        return isset($matches[1]) ? (float) str_replace(',', '', $matches[1]) : 0.00;
    }

    public function export()
    {
        $products = Product::all();
        $filename = 'products_' . date('Y-m-d_H-i-s') . '.csv';

        // Open output stream
        $handle = fopen('php://output', 'w');

        // Set headers for download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Write the header row
        fputcsv($handle, [
            'ID',
            'Name',
            'Description',
            'Category',
            'Cost',
            'Retail Sale Price',
            'Whole Cost',
            'In Stock',
            'Status'
        ]);

        // Write each product to the CSV
        foreach ($products as $product) {
            fputcsv($handle, [
                $product->id,
                $product->name,
                $product->description,
                $product->category ? $product->category->name : 'N/A', // Ensure this field exists in your Product model
                $product->cost, // Ensure this field exists in your Product model
                $product->retailsale_price, // Ensure this field exists in your Product model
                $product->whole_cost, // Ensure this field exists in your Product model
                $product->in_stock, // Ensure this field exists in your Product model
                $product->is_active ? 'Active' : 'Inactive'
            ]);
        }

        fclose($handle);
        exit; // Ensure no further output is sent
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {

        return view("products.create", [
            'categories' => Category::orderBy('sort_order', 'ASC')->get(),
        ]);
    }
    /**
     * Show resources.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Product $product): View
    {
        return view("products.edit", [
            'product' => $product,
            'categories' => Category::orderBy('sort_order', 'ASC')->get(),
        ]);
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return Redirect::back()->with("success", __("Deleted"));
    }
    /**
     * Delete resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function imageDestroy(Product $product): RedirectResponse
    {
        $product->deleteImage();
        return Redirect::back()->with("success", __("Image Removed"));
    }

    /**
     * Show resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'wholesale_price' => ['nullable', 'numeric', 'min:0'],
            'retailsale_price' => ['nullable', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'box_price' => ['nullable', 'numeric', 'min:0'],
            'size' => ['nullable', 'string', 'max:200'],
            'age' => ['nullable', 'string', 'max:200'],
            'color' => ['nullable', 'string', 'max:200'],
            'sort_order' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
            'description' => ['nullable', 'string', 'max:2000'],
            'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            'retail_barcode' => ['nullable', 'string', 'max:43'],
            'wholesale_sku' => ['nullable', 'string', 'max:64'],
            'retail_sku' => ['nullable', 'string', 'max:64'],
            'status' => ['required', 'string'],
            'in_stock' => ['nullable', 'numeric'],
            'category' => ['required', 'string'],
            'length' => ['nullable', 'numeric', 'min:0'],
            'width' => ['nullable', 'numeric', 'min:0'],
            'color' => ['nullable', 'string', 'max:200'],
            'type' => ['nullable', 'string', 'max:200'],
        ]);

        // Check for duplicate product by name
        if (Product::where('name', $request->name)->exists()) {
            return Redirect::back()->withErrors(['name' => __('Product already exists.')]);
        }

        $wholesale_price = 0;
        $retailsale_price = 0;
        if($request->wholesale_price === null && $request->retailsale_price !== null) {$wholesale_price = $request->retailsale_price * 10;$retailsale_price = $request->retailsale_price;}
        else if($request->wholesale_price !== null && $request->retailsale_price === null) {$retailsale_price = $request->wholesale_price / 10;$wholesale_price = $request->wholesale_price;}
        else if($request->wholesale_price !== null && $request->retailsale_price !== null) {$wholesale_price = $request->wholesale_price;$retailsale_price = $request->retailsale_price;}

        $product = Product::create([
            'name' => $request->name,
            'sort_order' => $request->sort_order ?? 1,
            'is_active' => $this->isAvailable($request->status),
            'wholesale_price' => $request->wholesale_price ?? 0,
            'retailsale_price' => $request->retailsale_price ?? 0,
            'cost' => $request->cost ?? 0,
            'box_price' => $request->box_price ?? 0,
            'description' => $request->description,
            'size' => $request->size,
            'age' => $request->age,
            'color' => $request->color,
            'wholesale_barcode' => $request->wholesale_barcode,
            'retail_barcode' => $request->retail_barcode,
            'wholesale_sku' => $request->wholesale_sku,
            'retail_sku' => $request->retail_sku,
            'category_id' => $request->category,
            'in_stock' => $request->in_stock ?? 0,
            'track_stock' => $request->has('track_stock'),
            'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),

        ]);

        echo($request->retailsale_price);

        if ($request->has('image')) {
            $product->updateImage($request->image);
        }
        return Redirect::back()->with("success", __("Created"));
    }

    /**
     * update resources.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            // 'sale_price' => ['nullable', 'numeric', 'min:0'],
            'wholesale_price' => ['nullable', 'numeric', 'min:0'],
            'retailsale_price' => ['nullable', 'numeric', 'min:0'],
            'cost' => ['nullable', 'numeric', 'min:0'],
            'box_price' => ['nullable', 'numeric', 'min:0'],
            'size' => ['nullable', 'string', 'max:200'],
            'age' => ['nullable', 'string', 'max:200'],
            'color' => ['nullable', 'string', 'max:200'],
            'sort_order' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png', 'max:2024'],
            'description' => ['nullable', 'string', 'max:2000'],
            // 'barcode' => ['nullable', 'string', 'max:43'],
            'wholesale_barcode' => ['nullable', 'string', 'max:43'],
            'retail_barcode' => ['nullable', 'string', 'max:43'],
            // 'sku' => ['nullable', 'string', 'max:64'],
            'wholesale_sku' => ['nullable', 'string', 'max:64'],
            'retail_sku' => ['nullable', 'string', 'max:64'],
            'status' => ['required', 'string'],
            'in_stock' => ['nullable', 'numeric'],
            'category' => ['required', 'string'],
            'length' => ['nullable', 'numeric', 'min:0'],
            'width' => ['nullable', 'numeric', 'min:0'],
            'color' => ['nullable', 'string', 'max:200'],
            'type' => ['nullable', 'string', 'max:200'],
        ]);
        $wholesale_price = 0;
        $retailsale_price = 0;
        if($request->wholesale_price === null && $request->retailsale_price !== null) {$wholesale_price = $request->retailsale_price * 20;$retailsale_price = $request->retailsale_price;}
        else if($request->wholesale_price !== null && $request->retailsale_price === null) {$retailsale_price = $request->wholesale_price / 20;$wholesale_price = $request->wholesale_price;}
        else if($request->wholesale_price !== null && $request->retailsale_price !== null) {$wholesale_price = $request->wholesale_price;$retailsale_price = $request->retailsale_price;}
        $product->update([
            'name' => $request->name,
            'sort_order' => $request->sort_order ?? 1,
            'is_active' => $this->isAvailable($request->status),
            // 'sale_price' => $request->sale_price ?? 0,
            'wholesale_price' => $request->wholesale_price ?? 0,
            'retailsale_price' => $request->retailsale_price ?? 0,
            'cost' => $request->cost ?? 0,
            'box_price' => $request->box_price ?? 0,
            'size' => $request->size,
            'age' => $request->age,
            'color' => $request->color,
            'description' => $request->description,
            // 'barcode' => $request->barcode,
            'wholesale_barcode' => $request->wholesale_barcode,
            'retail_barcode' => $request->retail_barcode,
            // 'sku' => $request->sku,
            'wholesale_sku' => $request->wholesale_sku,
            'retail_sku' => $request->retail_sku,
            'category_id' => $request->category,
            'in_stock' => $request->in_stock ?? 0,
            'track_stock' => $request->has('track_stock'),
            'continue_selling_when_out_of_stock' => $request->has('continue_selling_when_out_of_stock'),

            'width' =>  $request->width ?? 0,
            'length' => $request->length ?? 0,
            'color' => $request->color,
            'type' => $request->type,


        ]);
        if ($request->has('image')) {
            $product->updateImage($request->image);
        }
        return Redirect::back()->with("success", __("Updated"));
    }


    public function search(Request $request)
    {
        $query = trim($request->get('query'));
        if (is_null($query)) {
            return $this->jsonResponse(['data' => []]);
        }
        $products = Product::search($query)->latest()->take(10)->get();
        return $this->jsonResponse(['data' => new ProductSelectResourceCollection($products)]);
    }
}
