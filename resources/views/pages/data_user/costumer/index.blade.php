@extends('layouts.app')

@section('title', 'Daftar Costumer')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Costumer</h1>
                <div class="section-header-button">
                    <a href="{{ route('costumer.create') }}" class="btn btn-primary">Tambah Costumer</a>
                </div>
            </div>
            <div class="section-body">
                @include('layouts.alert')

                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($costumers as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('costumer.edit', $user->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('costumer.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="float-right">
                    {{ $costumers->links() }}
                </div>
            </div>
        </section>
    </div>
@endsection
