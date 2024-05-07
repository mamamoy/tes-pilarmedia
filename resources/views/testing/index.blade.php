@extends('layouts.AuthLayouts');

@section('styles')
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Testing Unit / Feature</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Testing Unit / Feature</li>
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
                        <li>Apa itu unit testing dan mengapa penting dalam pengembangan perangkat lunak?</li>
                        <i style="color: tomato">Unit Testing adalah jenis pengujian perangkat lunak di mana komponen individu dari sebuah aplikasi (biasanya disebut sebagai “unit”) diuji secara terpisah untuk memastikan bahwa mereka berfungsi dengan benar. Unit bisa berupa fungsi, metode, class, atau modul tertentu dalam kodingan yang sudah dikerjakan.</i>
                        <br>
                        <li>Bagaimana Anda akan melakukan unit testing dalam bahasa pemrograman yang Anda kuasai? Berikan contoh sederhana.</li>
                        <i style="color: tomato">Pada laravel terdapat fitur untuk melakukan testing dengan perintah <code>php artisan test</code>.</i>
                        <br>
                        <i style="color: tomato">Pada kasus saya saya melakukan UserTest registrasi dan berhasil.</i>
                        <div class="py-2">
                            <img src="{{asset('img/UserTestCase.png')}}" alt="">
                        </div>
                    </ul>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
