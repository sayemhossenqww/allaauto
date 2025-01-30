@extends('layouts.app')
@section('title', __('Items'))

@section('content')

    <div class="d-flex align-items-center justify-content-center mb-3">
        <div class="flex-grow-1">
            <x-page-title>@lang('Items')</x-page-title>
        </div>
        <div style="margin-left:30px" >
            <div class="row align-items-center mb-3">
                <div class="col-auto mt-3">
                    <a href="{{ route('products.create') }}"
                        class="btn btn-primary btn-ic @if (!Auth::user()->can_create) disabled @endif">
                        <x-heroicon-o-plus class="hero-icon-sm me-2 text-white" />
                        @lang('Add Item')
                    </a>
                </div>

                <div class="col-auto mt-3">
                    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                        @csrf
                        <input type="file"  name="file" accept=".xls,.xlsx,.csv" required>
                        <button class="btn btn-success" >Import Products</button>
                    </form>
                </div>

                <div class="col-auto mt-3">
                    <a href="{{ route('products.export') }}" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hero-icon-sm me-2 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        Export to Excel
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-card>
        <x-table id="products-table">
            <x-thead>
                <tr>
                    <x-th>@lang('Item')</x-th>
                    <x-th>@lang('Description')</x-th>
                    <x-th>@lang('Category')</x-th>
                    <x-th>@lang('Size')</x-th>
                    <x-th>@lang('Age')</x-th>
                    <x-th>@lang('Cost')</x-th>
                    <x-th>@lang('Price')</x-th>
                    <x-th>@lang('Box Price')</x-th>
                    <x-th>@lang('Whole Costs')</x-th>
                    <x-th>@lang('Retailsale Prices')</x-th>
                    {{-- <x-th>@lang('Wholesale Prices')</x-th> --}}
                    <x-th>@lang('In Stock')</x-th>
                    <x-th>@lang('status.text')</x-th>
                    <x-th></x-th>
                </tr>
            </x-thead>
        </x-table>
        <div class="row">
            <div class="col-12">
                <div style="text-align: right;">
                    <span class="fw-bold">WHOLE SUM COSTS </span> {{ $whole_total_cost }}
                    {{-- <span class="fw-bold">SUM COSTS </span> {{$total_cost}} --}}
                    <span class="fw-bold">WHOLE SUM PRICES </span> {{ $whole_unit_cost }}
                    {{-- <span class="fw-bold">SUM PRICES </span> {{$total_unit_price}} --}}
                </div>
            </div>
        </div>
    </x-card>
@endsection
@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            let dataTable = $('#products-table').DataTable({
                dom: 'Bfrtip', // Enables button placement
                buttons: [{
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    title: 'Items',
                    className: 'btn btn-success'
                }],
                processing: true,
                serverSide: true,
                language: {
                    url: '{{ asset("datatables/i18n/{$settings->lang}.json") }}',
                },
                ajax: {
                    url: "{{ route('api.products.index') }}",
                    dataSrc: 'data'
                },
                columns: [{
                        data: "name",
                        render: function(data, type, row) {
                            return '<div class=" d-flex align-items-center">' +
                                `<img src="${ row.image}" class="rounded me-2" height="35" alt="${ row.name}">` +
                                `<div class="fw-bold">${ row.name}</div>` +
                                `</div>`
                        }
                    },
                    {
                        data: 'description',
                        orderable: false
                    },
                    {
                        data: 'category',
                        orderable: false
                    },
                    {
                        data: 'size'
                    },
                    {
                        data: 'age'
                    },
                    {
                        data: 'cost'
                    },
                    {
                        data: 'retailsale_price'
                        // data: 'sale_price'
                    },
                    {
                        data: 'box_price'
                        // data: 'sale_price'
                    },
                    {
                        data: 'whole_cost'
                    },
                    {
                        data: 'sales_price'
                    },
                    // {
                    //     data: 'wholesale_price'
                    // },
                    {
                        data: 'in_stock'
                    },
                    {
                        data: "is_active",
                        render: function(data, type, row) {
                            if (row.in_stock <= 0) {
                                return `<span class="badge rounded-0 text-uppercase text-xs fw-normal bg-danger">unavailable</span>`;
                            }
                            return `<span class="badge rounded-0 text-uppercase text-xs fw-normal ${row.status_badge_bg_color}">${row.status}</span>`;
                        }
                    },
                    {
                        orderable: false,
                        data: function(data, type, dataToSet) {
                            var editUrl = "{{ route('products.edit', ':id') }}";
                            var deleteUrl = "{{ route('products.destroy', ':id') }}";
                            editUrl = editUrl.replace(':id', data.id);
                            deleteUrl = deleteUrl.replace(':id', data.id);
                            return `<div class="dropdown d-flex">` +
                                `<button class="btn btn-link  text-black p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">` +
                                `<x-heroicon-o-ellipsis-horizontal class="hero-icon" />` +
                                `</button>` +
                                `<x-dropdown-menu class="dropdown-menu-end" aria-labelledby="dropdownMenuButton1">` +
                                `<x-dropdown-item href="${editUrl}">` +
                                `<x-heroicon-o-pencil class="hero-icon-sm me-2 text-gray-400" />` +
                                `@lang('Edit')` +
                                `</x-dropdown-item>` +
                                `<x-dropdown-item href="#">` +
                                `<form action="${deleteUrl}" method="POST" id="form-${data.id}">` +
                                `@csrf` +
                                `@method('DELETE')` +
                                `<button type="button" class="btn btn-link p-0 m-0 w-100 text-start text-decoration-none text-danger align-items-center btn-sm" onclick="submitDeleteForm('${data.id}')">` +
                                `<x-heroicon-o-trash class="hero-icon-sm me-2 text-gray-400" />` +
                                `@lang('Delete')` +
                                `</button>` +
                                `</form>` +
                                `</x-dropdown-item>` +
                                `</x-dropdown-menu>` +
                                `</div>`

                        }
                    },

                ]
            });
        });

        function submitDeleteForm(id) {
            const form = document.querySelector(`#form-${id}`);
            Swal.fire(swalConfig()).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else {
                    topbar.hide();
                }
            });
        }
    </script>
@endpush

@push('styles')
  <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
@endpush

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- PDFMake for PDF export (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- Buttons HTML5 export -->
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
@endpush
