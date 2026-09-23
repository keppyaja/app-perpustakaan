{{-- File: resources/views/members/show.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Anggota</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 600px; }
        .info { margin-bottom: 12px; }
        .label { font-weight: bold; }
        .back { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Detail Anggota</h1>

    <div class="info"><span class="label">ID:</span> {{ $member->id }}</div>
    <div class="info"><span class="label">Nama:</span> {{ $member->nama }}</div>
    <div class="info"><span class="label">NIM:</span> {{ $member->nim }}</div>
    <div class="info"><span class="label">Email:</span> {{ $member->email }}</div>
    <div class="info"><span class="label">Nomor Telepon:</span> {{ $member->nomor_telepon }}</div>
    <div class="info"><span class="label">Alamat:</span> {{ $member->alamat ?? '-' }}</div>
    <div class="info"><span class="label">Status:</span> {{ ucfirst($member->status) }}</div>

    <div class="back">
        <a href="{{ route('members.index') }}">&larr; Kembali ke daftar anggota</a>
    </div>
</body>
</html>
