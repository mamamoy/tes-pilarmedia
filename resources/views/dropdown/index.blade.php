@extends('layouts.AuthLayouts');

@section('styles')
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dependent Dropdown</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Dependent Dropdown</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dropdown</h4>
                </div>
                <div class="card-body">
                    <p>Dependent Dropdown adalah teknik di mana konten dari satu dropdown bergantung pada pilihan yang dibuat di dropdown lain. Ini biasanya digunakan ketika ada hubungan hierarkis antara opsi dropdown, seperti Negara, Propinsi, Kabupaten/Kota, Kecamatan, dan Kelurahan. Misalnya, jika pengguna memilih negara tertentu, dropdown propinsi akan diisi dengan propinsi yang hanya ada di negara tersebut.</p>
                    <div class="input-group mb-3">
                        <label class="input-group-text" >Province</label>
                        <select class="form-select" name="province" id="province">
                           
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" >Regency</label>
                        <select class="form-select" name="regency" id="regency">
                           
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" >District</label>
                        <select class="form-select" name="district" id="district">
                           
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" >Village</label>
                        <select class="form-select" name="village" id="village">
                           
                        </select>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            function populateDropdown(url, dropdown, keyName, valueName) {
                $.get(url, function(data) {
                    data = JSON.parse(data);
                    $.each(data, function(index, item) {
                        dropdown.append($('<option>', {
                            value: item[keyName],
                            text: item[valueName]
                        }));
                    });
                });
            }

            populateDropdown(
                'https://raw.githubusercontent.com/emsifa/api-wilayah-indonesia/master/static/api/provinces.json',
                $('#province'), 'id', 'name');

            $('#province').change(function() {
                var provinceId = $(this).val();
                $('#regency').empty(); 
                populateDropdown(
                    'https://raw.githubusercontent.com/emsifa/api-wilayah-indonesia/master/static/api/regencies/' +
                    provinceId + '.json', $('#regency'), 'id', 'name');
            });

            $('#regency').change(function() {
                var regencyId = $(this).val();
                $('#district').empty();
                populateDropdown(
                    'https://raw.githubusercontent.com/emsifa/api-wilayah-indonesia/master/static/api/districts/' +
                    regencyId + '.json', $('#district'), 'id', 'name');
            });

            $('#district').change(function() {
                var districtId = $(this).val();
                $('#village').empty();
                populateDropdown(
                    'https://raw.githubusercontent.com/emsifa/api-wilayah-indonesia/master/static/api/villages/' +
                    districtId + '.json', $('#village'), 'id', 'name');
            });

        });
    </script>
@endpush
