

<form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST"
    enctype="multipart/form-data" role="form" onkeydown="return event.key != 'Enter';">
    @csrf
    @isset($product)
        @method('PUT')
    @endisset
    <div class="row">
        <div class="col-md-6 d-flex align-items-stretch mb-3">
            <x-card>

                <x-select label="Category" name="category" :searchable="true">
                    @isset($product)
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    @else
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    @endisset
                </x-select>

                <x-input label="Item Name" name="name"
                    value="{{ old('name', isset($product) ? $product->name : '') }}" />


                <x-textarea label="Description" name="description"
                    value="{{ old('description', isset($product) ? $product->description : null) }}" />
            </x-card>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mb-3">
            <x-card>
                <x-select label="status.text" name="status">
                    @isset($product)
                        <option value="available" @if ($product->is_active) selected @endif>
                            @lang('For Sale')
                        </option>
                        <option value="unavailable" @if (!$product->is_active) selected @endif>
                            @lang('Hidden')
                        </option>
                    @else
                        <option value="available">@lang('For Sale')</option>
                        <option value="unavailable">@lang('Hidden')</option>
                    @endisset
                </x-select>
                <x-number-input label="Sort Order" name="sort_order"
                    value="{{ old('sort_order', isset($product) ? $product->sort_order : '') }}" />
                    <x-select label="Size" name="size">
                    @isset($product)
                        <option value="S" {{ old('size') == 'S' ? 'selected' : '' }}>
                            @lang('Small')
                        </option>
                        <option value="M" {{ old('size') == 'M' ? 'selected' : '' }}>
                            @lang('Medium')
                        </option>
                        <option value="L" {{ old('size') == 'L' ? 'selected' : '' }}>
                            @lang('Large')
                        </option>
                    @else
                        <option value="S">@lang('Small')</option>
                        <option value="M">@lang('Medium')</option>
                        <option value="L">@lang('Large')</option>
                    @endisset
                </x-select>
                <x-input label="Ages" name="age"
                    value="{{ old('age', isset($product) ? $product->age : '') }}" />
                <x-input label="Color" name="color"
                    value="{{ old('color', isset($product) ? $product->color : '') }}" />
            </x-card>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex align-items-stretch">
            <x-card class="mb-3" >
                <div class="card-title h4 text-muted">@lang('Pricing')</div>

                <x-currency-input label="Cost" name="cost"
                    value="{{ old('cost', isset($product) ? $product->cost : '') }}" />
<!-- 
                <x-currency-input label="Sale Price" name="sale_price"
                    value="{{ old('sale_price', isset($product) ? $product->sale_price : '') }}" /> -->

                <x-currency-input label="Retailsale Price" name="retailsale_price"
                    value="{{ old('retailsale_price', isset($product) ? $product->retailsale_price : '') }}" />

                <x-currency-input label="Wholesale Price" name="wholesale_price"
                    value="{{ old('wholesale_price', isset($product) ? $product->wholesale_price : '') }}" />
                    

            </x-card>
        </div>
        <div class="col-md-6 d-flex align-items-stretch">
            <x-card class="mb-3">
                <div class="card-title h4 text-muted">@lang('Stock Management')</div>

                <x-stock-input label="In Stock" name="in_stock"
                    value="{{ old('in_stock', isset($product) ? $product->in_stock : '') }}" />

                <x-checkbox label="Track Stock" name="track_stock"
                    checked="{{ isset($product) ? $product->track_stock : true }}" />

                <x-checkbox label="Keep selling when out of stock" name="continue_selling_when_out_of_stock"
                    checked="{{ isset($product) ? $product->continue_selling_when_out_of_stock : true }}" />

                <!-- <div class="row">
                    <div class="col-md-6">
                        <x-input label="Barcode" name="barcode"
                            value="{{ old('barcode', isset($product) ? $product->barcode : '') }}"
                            formText="You can also use a scanner" />
                    </div>
                    <div class="col-md-6">
                        <x-input label="SKU" name="sku"
                            value="{{ old('sku', isset($product) ? $product->sku : '') }}" />
                    </div>
                </div> -->
                
                <div class="row">
                    <div class="col-md-6">
                        <x-input label="Item Code" name="retail_barcode"
                            value="{{ old('retail_barcode', isset($product) ? $product->retail_barcode : '') }}"
                            maxlength="6"
                            minlength="6"
                            required
                            formText="You can also use a scanner"/>
                    </div>
                    <div class="col-md-6">
                        <x-input label="Retail SKU" name="retail_sku"
                            value="{{ old('retail_sku', isset($product) ? $product->retail_sku : '') }}" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <x-currency-input label="Box Price" name="box_price"
                    value="{{ old('box_price', isset($product) ? $product->box_price : '') }}" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <x-input label="Wholesale Barcode" name="wholesale_barcode"
                            value="{{ old('wholesale_barcode', isset($product) ? $product->wholesale_barcode : '') }}"
                            formText="You can also use a scanner" />
                    </div>
                    <div class="col-md-6">
                        <x-input label="Wholesale SKU" name="wholesale_sku"
                            value="{{ old('wholesale_sku', isset($product) ? $product->wholesale_sku : '') }}" />
                    </div>
                </div>

 
                                {{-- add bar code print button --}}
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-block d-flex align-items-center mx-3 mt-3 w-75 h-12"
                            onclick="printBarCode('retail_barcode')">
                            @lang('Unit Barcode Print')
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-block d-flex align-items-center mx-3 mt-3 w-75 h-12"
                            onclick="printBarCode('wholesale_barcode')">
                            @lang('WholeSale Barcode Print')
                        </button>
                    </div>
                </div>
            </x-card>
        </div>
    </div>
    <x-card class="mb-3">
        <div class="mb-5">
            <label for="image" class="form-label">@lang('Image')</label>
            <input class="form-control @error('image') is-invalid @enderror" name="image" type="file"
                id="image-input" accept="image/png, image/jpeg">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @else
                <div id="imageHelp" class="form-text">@lang('Choose an image')</div>
            @enderror
        </div>
        <div class="mb-5 text-center">
            <div class="mb-3">
                @isset($product)
                    <img src="{{ $product->image_url }}" height="250"
                        class="object-fit-cover border rounded  @if (!$product->image_path) d-none @endif"
                        alt="{{ $product->name }}" id="image-preview">
                @else
                    <img src="#" height="250" class="object-fit-cover border rounded  d-none" alt="image"
                        id="image-preview">
                @endisset
            </div>
            @isset($product)
                @if ($product->image_path)
                    <div class="mb-3">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#removeCategoryImageModal">
                            @lang('Remove Image')
                        </button>
                    </div>
                @endif
            @endisset
        </div>
    </x-card>
    <div class="mb-3">
        <x-save-btn>
            @lang(isset($product) ? 'Update Item' : 'Save Item')
        </x-save-btn>
    </div>
</form>

@isset($product)
    <div class="modal" id="removeCategoryImageModal" tabindex="-1" aria-labelledby="removeCategoryImageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="removeCategoryImageModalLabel">@lang('Are you sure?')</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('products.image.destroy', $product) }}" method="POST" role="form">
                    <div class="modal-body">
                        @csrf
                        @method('DELETE')
                        @lang('You cannot undo this action!')
                    </div>
                    <div class="row p-0 m-0 border-top">
                        <div class="col-6 p-0">
                            <button type="button"
                                class="btn btn-link w-100 m-0 text-danger btn-lg text-decoration-none rounded-0 border-end"
                                data-bs-dismiss="modal">@lang('Cancel')</button>
                        </div>
                        <div class="col-6 p-0">
                            <button type="submit"
                                class="btn btn-link w-100 m-0 text-black btn-lg text-decoration-none rounded-0 border-start">
                                @lang('Remove Image')
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endisset
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("image-input").onchange = function() {
                previewImage(this, document.getElementById("image-preview"))
            };
        });
        
        function printBarCode(param) {
            value = $(`input[name=${param}]`).val();
            box_price = $(`input[name=box_price]`).val();
            let htmlContent = `
                <html>
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Print Barcode</title>
                        <style>
                            @media print {
                                /* Define size using @page */
                                @page {
                                    size: 4cm 4cm;
                                    margin: 0; /* No margins for a full-bleed label */
                                }
                    
                                /* Use container to match the page */
                                body, html {
                                    margin: 0;
                                    padding: 0;
                                    width: 4cm;
                                    height: 4cm;
                                    // overflow: hidden; /* Avoid overflow */
                                }
                    
                                /* Styles for the label */
                                .label {
                                    width: 5.7cm;
                                    height: 3.7cm;
                                    display: flex;
                                    flex-direction: column;
                                    align-items: center;
                                    justify-content: center;
                                    // margin-left: -2.0cm;
                                    // margit-top: 1.0cm;
                                }
                    
                                .barcode-image {
                                    width: 70%;
                                    height: 2.5cm;
                                    margin-bottom: 0.1cm;
                                }
                            }
                           /* Container to match the paper size */
                            .label {
                                width: 6cm;
                                height: 4cm;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                            }
                            
                            .barcode-image {
                                margin-top:3cm;
                                width: 70%;  /* Adjust width to fit */
                                height: 2.5cm; /* Adjust height to fit */
                                margin-bottom: 0.2cm;
                            }
                            
                        </style>
                        <link rel="stylesheet" type="text/css" media="print"/>
                    </head>
                    <body>
                        <div class="label">
                        <img 
                        src="https://barcode.orcascan.com/?type=code128&format=png&data=${value}" 
                        alt="Barcode"
                        class="barcode-image"
                        />
                            <p>box_price: ${box_price}</p>
                            <p>${param}: ${value}</p>
                        </div>
                    </body>
                </html>
            `;
        
            let myWindow = window.open('', 'BarCodeWindow2', 'width=600,height=800');
            myWindow.document.write(htmlContent);
            myWindow.document.close(); // Ensure the document is complete
        }
    </script>


<script>
function processBarcode(input) {
    let barcode = input.value.trim();
    console.log(barcode);

    // Check if barcode length is 18
    if (barcode.length === 18 && /^\d+$/.test(barcode)) {
        let itemCode = barcode.substring(1, 7); // Extract 6-digit item code
        input.value = itemCode; // Set the field value to Item Code only
    }
}
</script>


@endpush
