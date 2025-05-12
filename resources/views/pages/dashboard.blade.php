@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" onclick="window.location.href='{{ url('user') }}'"
                        style="cursor: pointer;">
                        <div class="card-icon bg-success">
                            <i class="far fa-user"></i>
                        </div>

                        <div class="card-wrap">
                            <div class="card-header">
                                <a href="{{ url('user') }}"></a>
                                <h4>Total Data Users</h4>
                                <h4></h4>
                            </div>
                            <div class="card-body" class="mb-0">
                                <?= $users_total > 0 ? $users_total : 'Data belum tersedia' ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" onclick="window.location.href='{{ url('order') }}'"
                        style="cursor: pointer;">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Data Orders</h4>
                            </div>
                            <div class="card-body" class="mb-0">
                                <?= $orders_total > 0 ? $orders_total : 'Data belum tersedia' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" onclick="window.location.href='{{ url('costumer') }}'"
                        style="cursor: pointer;">
                        <div class="card-icon bg-info">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Data Costumer</h4>
                            </div>
                            <div class="card-body" class="mb-0">
                                <?= $costumer_total > 0 ? $costumer_total : 'Data belum tersedia' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Order dan Berat Barang Dipesan Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>Jumlah Order (Pelanggan)</th>
                                        <th>Berat Barang (Kg)</th>
                                        <th>Pendapatan (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item['waktu'] }}</td>
                                            <td>{{ $item['jumlah_order'] }}</td>
                                            <td>{{ $item['jumlah_barang'] }} Kg</td>
                                            <td>Rp {{ number_format($item['jumlah_harga'], 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">
                                <p><strong>🧾 Total Order Hari Ini:</strong> {{ $total_order_today }} pelanggan</p>
                                <p><strong>📦 Berat Barang:</strong> {{ $total_items_today }} Kg</p>
                                <p><strong>💰 Total Pendapatan:</strong> Rp
                                    {{ number_format($total_income_today, 0, ',', '.') }}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


    </div>
    </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
