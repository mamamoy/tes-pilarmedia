@extends('layouts.AuthLayouts');

@section('styles')
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Object Oriented Programming</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Object Oriented Programming</li>
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
                        <li>Apa itu OOP (Pemrograman Berorientasi Objek) dan mengapa itu penting dalam pengembangan
                            perangkat lunak?berikan contoh implementasi dalam koding</li>
                        <i style="color: tomato">OOP adalah paradigma pemrograman di mana program dibangun menggunakan objek
                            yang saling berinteraksi.</i>
                        <i style="color: tomato">Pada laravel konsep MVC (Model-View-Controller) sudah termasuk OOP, karena
                            saling berkaitan dan saling berinteraksi.</i>
                        <br>
                        <li>Jelaskan konsep utama dalam OOP seperti encapsulation, inheritance, dan polymorphism.berikan
                            contoh implementasi dalam koding</li>
                        <i style="color: tomato">Encapsulation adalah konsep dalam OOP di mana properti (data) dan metode
                            (fungsi) yang berkaitan dengan suatu objek dikapsulasi bersama dalam satu unit. Ini membantu
                            dalam mengatur akses ke properti dan metode, serta melindungi data agar tidak dapat diakses atau
                            dimodifikasi secara langsung dari luar kelas.</i>
                        <i style="color: tomato">Inheritance adalah konsep di mana kelas baru dapat mengambil sifat dan
                            perilaku dari kelas yang sudah ada. Ini memungkinkan penggunaan kembali kode, pengelompokan
                            kelas yang memiliki kesamaan, dan menciptakan hubungan hierarkis antara kelas.</i>
                        <i style="color: tomato">Polymorphism adalah konsep di mana objek dari kelas yang berbeda dapat
                            digunakan secara serupa, dengan cara yang sama. Ini memungkinkan pengembang untuk menulis kode
                            yang lebih fleksibel dan dinamis.</i>
                        <br>
                        <li>Berikan contoh penggunaan OOP encapsulation, inheritance, polimorphism juga menerapkan SOLID
                            principles dalam bahasa pemrograman yang Anda kuasai. berikan contoh implementasi dalam koding.
                        </li>
                        <i style="color: tomato">Pada kasus ini penggunaan <code>protected $table / $guarded</code> serta
                            kodingan untuk mengambil data relasi <code>public function salesProduct()</code> pada model saya
                            merupakan contoh dari Encapsulation.</i>
                        <br>
                        <i style="color: tomato">Pada baris <code>class Sales extends Model</code> merupakan contoh dari
                            penggunaan Inheritance.</i>
                            <br>
                        <i style="color: tomato">Contoh penggunaan polymorph pada laravel biasa digunakan dalam bentuk
                            seperti berikut:</i>
                        <div class="py-3">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Code Polymorph
                            </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <pre>
                                    <code style="font-family: monospace;">
                                        class Comment extends Model
                                        {
                                            public function commentable()
                                            {
                                                return $this->morphTo();
                                            }
                                        }
                                    </code>
                                </pre>
                                <p style="color: tomato">Penggunaan polymorph pada project ini tidak saya gunakan karena saya masih belum terlalu memahami cara kerja dan pengimplementasian polymorph.</p>
                            </div>
                    </ul>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
