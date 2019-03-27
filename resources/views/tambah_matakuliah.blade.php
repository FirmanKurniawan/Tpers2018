@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{url('/matakuliah/save')}}">
	@csrf
  <div class="form-row">
    <div class="col">
    	<label>Nama Mata Kuliah :</label>
      <input type="text" class="form-control" placeholder="Nama Mata Kuliah" name="matakuliah">
    </div>
  </div>
<br>
<button type="submit" class="btn btn-primary">Tambah</button>
</form>
</div>
@endsection