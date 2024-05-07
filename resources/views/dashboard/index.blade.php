@extends('layouts.AuthLayouts');

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Optimasi Query dan Dashboard Grafik</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Optimasi Query dan Dashboard Grafik</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Soal: </h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li>Bagaimana Anda akan mengoptimalkan query SQL untuk mengambil data dari tabel yang memiliki
                            jutaan baris? berikan contoh implementasi dalam koding. Seed 2juta record dan running </li>
                        <i style="color: tomato">Penggunaan datatable serverside / pagination / eager loading akan membantu
                            mengefisiensi proses query data.</i>
                        <br>
                        <li>Jelaskan apa yang dimaksud dengan indeks dalam basis data dan bagaimana penggunaannya dapat
                            meningkatkan performa query.</li>
                        <i style="color: tomato">Indeks merupakan sebuah objek yang dapat mempercepat dalam proses
                            pencarian, dalam kasus ini laravel otomatis melakukan pengindeksan saat membuat migration pada
                            <code>$table->id();</code> dan pada tabel ini ditampilkan secara urut berdasarkan urutan
                            terakhir dibuat.</i>
                        <br>
                        <li>Berikan Contoh Bagaimana Anda akan membuat dashboard grafik interaktif dari data yang diambil
                            dari basis data (misal: grafik penjualan perbulan/pertahun/persales dengan jumlah data 2juta
                            record) ?berikan contoh implementasi dalam koding.</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dashboard Grafik</h4>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="top10HighestSales-tab" data-bs-toggle="tab" href="#top10HighestSales" role="tab"
                                aria-controls="top10HighestSales" aria-selected="true">Top 10 Highest Sales</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="top10LowestSales-tab" data-bs-toggle="tab" href="#top10LowestSales" role="tab"
                                aria-controls="top10LowestSales" aria-selected="false">Top 10 Lowest Sales</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="top10HighestSales" role="tabpanel" aria-labelledby="top10HighestSales-tab">
                            <div id="highest" data-high-sales='@json($top10HighestSales->toArray())'></div>
                        </div>
                        <div class="tab-pane fade" id="top10LowestSales" role="tabpanel" aria-labelledby="top10LowestSales-tab">
                            <div id="lowest" data-low-sales='@json($top10LowestSales->toArray())'></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">DataTable</h4>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <p>Penampilan data ini menggunakan datatables server-side sehingga load data akan lebih cepat karena hanya menampilkan data pada tiap halaman tabel.</p>
                    </div>
                    <div class="text-end mb-3">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addSales">Add new sales</button>
                    </div>
                    <div class="modal fade text-left modal-borderless" id="addSales" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                            <div class="modal-content">
                                <form action="{{ route('dashboard.store') }}" class="form form-horizontal" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Form new sales</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Sales Name</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-select" id="SalesPersonID" name="SalesPersonID">
                                                        @foreach ($salesPersons as $salesPerson)
                                                            <option value="{{ $salesPerson->SalesPersonID }}">
                                                                {{ $salesPerson->SalesPersonName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('SalesPersonID')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                                <div class="col-md-4">
                                                    <label>Product</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="choices form-select multiple-remove" multiple="multiple"
                                                        id="ProductID" name="ProductID[]">
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->ProductID }}">
                                                                {{ $product->ProductCode }} - {{ $product->ProductName }} |
                                                                $ {{ $product->ProductPrice }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('ProductID')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="sales-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Sales Code</th>
                                    <th>Sales Name</th>
                                    <th>Sales Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.extend($.fn.dataTable.defaults, {
                ordering: false
            });

            $('#sales-table').DataTable({
                ajax: "{{ route('dashboard.data') }}",
                processing: true,
                serverSide: true,
                columns: [{
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'SalesCode',
                        name: 'SalesCode'
                    },
                    {
                        data: 'SalesPersonID',
                        name: 'SalesPersonID'
                    },
                    {
                        data: 'SalesAmount',
                        name: 'SalesAmount'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true,
                    }
                ]
            });
        });
    </script>

    <script src="{{ asset('js/BiggestSalesAmount.js') }}"></script>
    <script src="{{ asset('js/LowestSalesAmount.js') }}"></script>
@endpush
