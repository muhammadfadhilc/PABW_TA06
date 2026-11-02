@extends('layouts.app')
@section('title','Buat Laporan')
@section('content')<div class="card" style="max-width:770px"><h1>Laporkan Kerusakan Jalan</h1>
<form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">@csrf
<label>Jenis kerusakan<select name="jenis_kerusakan" required><option value="">Pilih jenis</option>@foreach(['Lubang','Retak','Ambles'] as $a)<option value="{{ $a }}" @selected(old('jenis_kerusakan')===$a)>{{ $a }}</option>@endforeach</select></label>@error('jenis_kerusakan')<p class="error">{{ $message }}</p>@enderror
<label>Lokasi/jalan<input type="text" name="lokasi" value="{{ old('lokasi') }}" required></label>@error('lokasi')<p class="error">{{ $message }}</p>@enderror
<label>Ruas jalan (opsional jika sudah didata)<select name="ruas_jalan_id"><option value="">Belum ditentukan</option>@foreach($ruas as $r)<option value="{{ $r->id }}">{{ $r->nama }}</option>@endforeach</select></label>
<label>Deskripsi<textarea name="deskripsi" required>{{ old('deskripsi') }}</textarea></label>@error('deskripsi')<p class="error">{{ $message }}</p>@enderror
<label>Latitude (opsional)<input type="number" step="0.0000001" name="latitude" value="{{ old('latitude') }}"></label>@error('latitude')<p class="error">{{ $message }}</p>@enderror
<label>Longitude (opsional)<input type="number" step="0.0000001" name="longitude" value="{{ old('longitude') }}"></label>@error('longitude')<p class="error">{{ $message }}</p>@enderror
<label>Foto kondisi jalan (opsional, JPG/PNG maksimal 2 MB)<input type="file" name="foto" accept="image/jpeg,image/png"></label>@error('foto')<p class="error">{{ $message }}</p>@enderror
<button class="primary" type="submit">Kirim Laporan</button>
</form></div>@endsection