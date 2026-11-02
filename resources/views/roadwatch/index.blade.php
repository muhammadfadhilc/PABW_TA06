@extends('layouts.app')
@section('title','Daftar Laporan')
@section('content')<h1>Daftar Laporan Kerusakan Jalan</h1>
<p class="muted">Laporan yang terlihat disesuaikan dengan akun dan peran login.</p>
@if(Auth::user()->role==='warga')<p><a class="button" href="{{ route('laporan.create') }}">+ Buat laporan</a></p>@endif
<div class="card" style="overflow:auto"><table><thead><tr><th>ID</th><th>Jenis</th><th>Lokasi</th><th>Status</th><th>Tanggal</th><th></th></tr></thead><tbody>
@forelse($rows as $r)<tr><td>#{{ $r->id }}</td><td>{{ $r->jenis_kerusakan }}</td><td>{{ $r->lokasi }}</td><td>{{ $r->status }}</td><td>{{ $r->created_at->format('d-m-Y') }}</td><td><a href="{{ route('laporan.show',$r) }}">Detail</a></td></tr>
@empty<tr><td colspan="6">Belum ada laporan.</td></tr>@endforelse</tbody></table><p>{{ $rows->links() }}</p></div>
@endsection