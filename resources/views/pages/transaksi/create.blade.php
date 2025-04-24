@extends('layouts.app')

@section('title', 'Tambah Order Laundry')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Order Laundry</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id">Customer</label>
                                        <select name="user_id" class="form-control" required>
                                            <option value="">-- Pilih Customer --</option>
                                            @foreach($customers as $cust)
                                                <option value="{{ $cust->id }}">{{ $cust->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="berat_pakaian">Berat Pakaian (Kg)</label>
                                        <input type="number" name="berat_pakaian" step="0.1" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_laundry_id">Jenis Pakaian</label>
                                        <select name="harga_laundry_id" class="form-control" required>
                                            <option value="">-- Pilih Pakaian --</option>
                                            @foreach($pakaian as $item)
                                                <option value="{{ $item->id }}" data-harga="{{ $item->harga }}" data-lama="{{ $item->lama }}">
                                                    {{ $item->jenis_pakaian }} {{ $item->jenis }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" id="hargaDisplay" class="form-control" readonly>
                                        <!-- Hidden input untuk harga yang akan dikirimkan -->
                                        <input type="hidden" name="harga" id="hargaHidden">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lama (hari)</label>
                                        <input type="text" id="lamaDisplay" class="form-control" readonly>
                                        <!-- Hidden input untuk lama yang akan dikirimkan -->
                                        <input type="hidden" name="lama" id="lamaHidden">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_pembayaran">Status Pembayaran</label>
                                        <select name="status_pembayaran" class="form-control" required>
                                            <option value="Cash">Cash</option>
                                            <option value="Transfer">Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="diskon">Diskon (opsional)</label>
                                        <input type="number" name="diskon" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const select = document.querySelector('select[name="harga_laundry_id"]');
            const hargaDisplay = document.getElementById('hargaDisplay');
            const lamaDisplay = document.getElementById('lamaDisplay');
            const hargaHidden = document.getElementById('hargaHidden');
            const lamaHidden = document.getElementById('lamaHidden');

            select.addEventListener('change', function () {
                const selected = this.options[this.selectedIndex];
                const harga = selected.getAttribute('data-harga');
                const lama = selected.getAttribute('data-lama');

                hargaDisplay.value = harga ? 'Rp ' + parseInt(harga).toLocaleString('id-ID') : '';
                lamaDisplay.value = lama ?? '';

                // Update hidden inputs to send the values
                hargaHidden.value = harga;
                lamaHidden.value = lama;
            });
        });
    </script>
@endsection
