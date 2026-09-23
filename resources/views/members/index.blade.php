{{-- File: resources/views/members/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Anggota')

@section('content')
    <h1>Daftar Anggota</h1>

    <div style="margin-bottom: 16px;">
        <a href="{{ route('members.create') }}" style="display: inline-block; margin-right: 12px; padding: 8px 12px; background: #2563eb; color: #fff; text-decoration: none; border-radius: 4px;">Tambah Anggota</a>
    </div>

    <form action="{{ route('members.index') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama anggota" style="padding: 8px; width: 250px; margin-right: 8px;">
        <button type="submit" style="padding: 8px 12px; cursor: pointer;">Cari</button>
        <a href="{{ route('members.index') }}" style="margin-left: 8px;">Reset</a>
    </form>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">ID</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Nama</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">NIM</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Email</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">No. Telepon</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Status</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($members as $member)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $member->id }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $member->nama }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $member->nim }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $member->email }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $member->nomor_telepon }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ ucfirst($member->status) }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('members.show', $member->id) }}">Detail</a> |
                        <a href="{{ route('members.edit', $member->id) }}">Edit</a> |
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus anggota ini?')" style="background: none; border: none; color: #b91c1c; cursor: pointer; padding: 0;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="border: 1px solid #ddd; padding: 8px;">Belum ada data anggota.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $members->appends(request()->query())->links() }}
    </div>
@endsection