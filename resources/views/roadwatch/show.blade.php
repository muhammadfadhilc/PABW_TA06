@extends('layouts.app')
@section('title','Detail Laporan')
@section('content')<div class="card"><h1>Laporan #{{ $laporan->id }}</h1>
<p><strong>Jenis:</strong> {{ $laporan->jenis_kerusakan }}</p><p><strong>Lokasi:</strong> {{ $laporan->lokasi }}</p>
<p><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p><p><strong>Status:</strong> {{ $laporan->status }}</p>
@if($laporan->latitude && $laporan->longitude)<p>Koordinat: {{ $laporan->latitude }}, {{ $laporan->longitude }}</p>@endif
@if($laporan->foto_path)<p><a href="{{ route('laporan.photo',$laporan) }}" target="_blank">Buka foto bukti (butuh login)</a></p>@endif
@if(Auth::user()->role==='admin' && in_array($laporan->status,['Menunggu Verifikasi','Terverifikasi']))
<hr><h2>Tindakan Admin Desa</h2><form method="POST" action="{{ route('laporan.status',$laporan) }}">@csrf @method('PATCH')
<select name="status">@foreach(($laporan->status==='Menunggu Verifikasi'?['Terverifikasi','Ditolak']:['Ditugaskan','Diteruskan']) as $s)<option>{{ $s }}</option>@endforeach</select>
<label>Petugas jika memilih Ditugaskan<select name="assigned_to"><option value="">Pilih petugas</option>@foreach($petugas as $p)<option value="{{ $p->id }}">{{ $p->name }}</option>@endforeach</select></label>
<button class="primary" type="submit">Ubah Status</button></form>
@endif
@if(Auth::user()->role==='petugas' && in_array($laporan->status,['Ditugaskan','Diproses']))
<hr><h2>Progres Petugas</h2><form method="POST" action="{{ route('laporan.status',$laporan) }}">@csrf @method('PATCH')
<input type="hidden" name="status" value="{{ $laporan->status==='Ditugaskan'?'Diproses':'Selesai' }}"><button class="primary" type="submit">Ubah menjadi {{ $laporan->status==='Ditugaskan'?'Diproses':'Selesai' }}</button></form>
@endif
<p><a href="{{ route('laporan.index') }}">Kembali</a></p></div>@endsection