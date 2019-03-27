@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{url('/upload/save')}}" enctype="multipart/form-data">
	@csrf
  <div class="form-row">
    <div class="col-12">
    	<label>Mata Kuliah :</label>
    	@php
    		$matakuliah = \App\Matakuliah::all();
    	@endphp
      <select name="matakuliah">
      	@foreach($matakuliah as $m)
      	<option value="{{$m->id}}">{{$m->nama_matakuliah}}</option>
      	@endforeach
      </select>
      <br>
      <br>
      <label>Judul :</label>
      <input type="text" class="form-control" placeholder="Judul" name="judul">
      <br>
      <label>Nama :</label>
      <input type="text" class="form-control" placeholder="Nama Anda" name="nama">
    </div>
    <div class="col-12">
    	<br>
    	<label>Upload File :</label>
      <input type="file" class="form-control" name="gambar[]">
    </div>
  </div>
<br>
<button type="submit" class="btn btn-primary">Upload</button>
</form>
</div>
@endsection