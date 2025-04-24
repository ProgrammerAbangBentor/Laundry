@extends('layouts.app')

@section('title', 'Tambah Harga Laundry')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Harga Laundry</h1>
            </div>
            <div class="section-body">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('laundry.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="jenis" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Lama</label>
                                <input type="text" name="lama" class="form-control" required placeholder="Contoh: 1 Hari / 3 Hari">
                            </div>

                            <div class="form-group">
                                <label>Kg</label>
                                <input type="number" name="kg" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>

                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('laundry.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
