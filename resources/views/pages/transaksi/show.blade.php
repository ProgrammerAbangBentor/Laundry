@extends('layouts.app')

@section('title', 'Detail Order Laundry')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Order Laundry</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_id">Customer</label>
                                    <input type="text" class="form-control" value="{{ $order->customer->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_transaksi">No Transaksi</label>
                                    <input type="text" class="form-control" value="{{ $order->no_transaksi }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_laundry_id">Jenis Pakaian</label>
                                    <input type="text" class="form-control" value="{{ $order->hargaLaundry->jenis_pakaian }} - {{ $order->hargaLaundry->jenis }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" value="Rp {{ number_format($order->harga, 0, ',', '.') }}" readonly>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Lama (hari)</label>
                                    <input type="text" class="form-control" value="{{ $order->lama }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="berat_pakaian">Berat Pakaian (Kg)</label>
                                    <input type="text" class="form-control" value="{{ $order->berat_pakaian }} Kg" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status_pembayaran">Status Pembayaran</label>
                                    <input type="text" class="form-control" value="{{ $order->status_pembayaran }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="diskon">Diskon (opsional)</label>
                                    <input type="text" class="form-control" value="{{ $order->diskon ? $order->diskon . ' %' : 'Tidak ada diskon' }}" readonly>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
