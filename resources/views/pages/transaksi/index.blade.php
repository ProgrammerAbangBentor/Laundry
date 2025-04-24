@extends('layouts.app')

@section('title', 'Data Order Laundry')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Order Laundry</h1>
                <div class="section-header-button">
                    <a href="{{ route('order.create') }}" class="btn btn-primary">Tambah Order</a>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Transaksi</th>
                                        <th>Customer</th>
                                        <th>Pakaian</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Hari</th>
                                        <th>Diskon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->no_transaksi }}</td>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->hargaLaundry->jenis_pakaian }}</td>
                                            <td>{{ $order->berat_pakaian }} Kg</td>
                                            <td>Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                                            <td>{{ $order->status_pembayaran }}</td>
                                            <td>{{ $order->hari }} Hari</td>
                                            <td>{{ $order->diskon ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('order.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{ route('order.show', $order->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                <form action="{{ route('order.destroy', $order->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus order ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 float-right">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
