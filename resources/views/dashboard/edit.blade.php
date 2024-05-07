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
                    <h3>Edit Sales</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Sales</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Form Edit Sales</h4>
                        <a class="btn btn-secondary" href="{{route('dashboard.index')}}">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('dashboard.update', $sales->SalesID) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Sales Name</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="form-select" id="SalesPersonID" name="SalesPersonID">
                                        @foreach ($salesPersons as $salesPerson)
                                            <option value="{{ $salesPerson->SalesPersonID }}"
                                                {{ $salesPerson->SalesPersonID == $salesPersonID ? 'selected' : '' }}>
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
                                    <label>Products</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select class="choices form-select multiple-remove" multiple="multiple" id="ProductID"
                                        name="ProductID[]">
                                        @foreach ($products as $product)
                                            <option value="{{ $product->ProductID }}" {{ in_array($product->ProductID, $productIDs) ? 'selected' : ''}}>
                                                {{ $product->ProductCode }} - {{ $product->ProductName }} |
                                                $ {{ $product->ProductPrice }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('SalesPersonID')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                                <div class="col-md-4">
                                    <label>Total Amount</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="totalAmount" class="form-control" name="totalAmount" value="{{$sales->SalesAmount}}" readonly>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
@endpush
