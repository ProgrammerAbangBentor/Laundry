@extends('layouts.app')

@section('title', 'Edit Harga Laundry')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Harga Laundry</h1>
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

                        <form action="{{ route('laundry.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Jenis</label>
                                <input type="text" name="jenis" class="form-control" value="{{ $item->jenis }}" required>
                            </div>

                            <div class="form-group">
                                <label>Lama</label>
                                <input type="text" name="lama" class="form-control" value="{{ $item->lama }}" required>
                            </div>

                            <div class="form-group">
                                <label>Kg</label>
                                <input type="number" name="kg" class="form-control" value="{{ $item->kg }}" required>
                            </div>

                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control" value="{{ $item->harga }}" required>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="aktif" {{ old('status', $item->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ old('status', $item->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>


                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('laundry.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
