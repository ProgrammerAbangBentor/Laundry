@extends('layouts.app')

@section('title', 'Edit Order Laundry')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Order Laundry</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('order.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="user_id">Customer</label>
                                        <select name="user_id" class="form-control" required>
                                            <option value="">-- Pilih Customer --</option>
                                            @foreach($customers as $cust)
                                                <option value="{{ $cust->id }}" {{ $order->user_id == $cust->id ? 'selected' : '' }}>
                                                    {{ $cust->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_transaksi">No Transaksi</label>
                                        <input type="text" name="no_transaksi" class="form-control" value="{{ old('no_transaksi', $order->no_transaksi) }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_laundry_id">Jenis Pakaian</label>
                                        <select name="harga_laundry_id" class="form-control" required id="hargaSelect">
                                            <option value="">-- Pilih Pakaian --</option>
                                            @foreach($pakaian as $item)
                                                <option
                                                    value="{{ $item->id }}"
                                                    data-harga="{{ $item->harga }}"
                                                    data-lama="{{ $item->lama }}"
                                                    {{ $order->harga_laundry_id == $item->id ? 'selected' : '' }}
                                                >
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
                                        <input type="hidden" name="harga" id="hargaHidden" value="{{ $order->harga }}">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Lama (hari)</label>
                                        <input type="text" id="lamaDisplay" class="form-control" readonly>
                                        <input type="hidden" name="lama" id="lamaHidden" value="{{ $order->lama }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="berat_pakaian">Berat Pakaian (Kg)</label>
                                        <input type="number" name="berat_pakaian" step="0.1" class="form-control"
                                            value="{{ old('berat_pakaian', $order->berat_pakaian) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status_pembayaran">Status Pembayaran</label>
                                        <select name="status_pembayaran" class="form-control" required>
                                            <option value="Cash" {{ $order->status_pembayaran == 'Cash' ? 'selected' : '' }}>Cash</option>
                                            <option value="Transfer" {{ $order->status_pembayaran == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="diskon">Diskon (opsional)</label>
                                        <input type="number" name="diskon" class="form-control"
                                            value="{{ old('diskon', $order->diskon) }}">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const select = document.getElementById('hargaSelect');
            const hargaDisplay = document.getElementById('hargaDisplay');
            const lamaDisplay = document.getElementById('lamaDisplay');
            const hargaHidden = document.getElementById('hargaHidden');
            const lamaHidden = document.getElementById('lamaHidden');

            function updateFields() {
                const selected = select.options[select.selectedIndex];
                const harga = selected.getAttribute('data-harga');
                const lama = selected.getAttribute('data-lama');

                hargaDisplay.value = harga ? 'Rp ' + parseInt(harga).toLocaleString('id-ID') : '';
                lamaDisplay.value = lama ?? '';

                hargaHidden.value = harga;
                lamaHidden.value = lama;
            }

            select.addEventListener('change', updateFields);

            // Panggil sekali saat pertama load
            updateFields();
        });
    </script>
@endsection
