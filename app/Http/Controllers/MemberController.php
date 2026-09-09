<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    private array $members = [
        ['id' => 1, 'nama' => 'Joko Widodo', 'nim' => '2141720001', 'email' => 'jokowi@gmail.com', 'nomor_telepon' => '081234567890', 'alamat' => 'Solo', 'status' => 'aktif'],
        ['id' => 2, 'nama' => 'Prabowo Subianto', 'nim' => '2141720002', 'email' => 'prabowo@gmail.com', 'nomor_telepon' => '081234567891', 'alamat' => 'Jakarta', 'status' => 'aktif'],
        ['id' => 3, 'nama' => 'Ganjar Pranowo', 'nim' => '2141720003', 'email' => 'ganjar@gmail.com', 'nomor_telepon' => '081234567892', 'alamat' => 'Karanganyar', 'status' => 'nonaktif'],
    ];

    public function index()
    {
        $members = $this->members;

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('members.index')
            ->with('success', "Anggota \"{$validated['nama']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function show(string $id)
    {
        $member = collect($this->members)->firstWhere('id', (int) $id);

        abort_if(! $member, 404);

        return view('members.show', compact('member'));
    }

    public function edit(string $id)
    {
        return "MemberController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "MemberController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "MemberController@destroy, id: {$id}";
    }
}