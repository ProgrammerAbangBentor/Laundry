@extends('layouts.app')

@section('title', 'Harga Laundry')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Harga Laundry</h1>
                <div class="section-header-button">
                    <a href="{{ route('laundry.create') }}" class="btn btn-primary">Tambah</a>
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
                                        <th>Jenis</th>
                                        <th>Lama</th>
                                        <th>Kg</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->lama }}</td>
                                            <td>{{ $item->kg }} Kg</td>
                                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>{{ ucfirst($item->status) }}</td>
                                            <td>
                                                <a href="{{ route('laundry.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('laundry.destroy', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
