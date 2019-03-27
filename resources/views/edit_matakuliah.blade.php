@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{url('/matakuliah/update/')}}">
	@csrf
  <div class="form-row">
    <div class="col">
    	<label>Nama Mata Kuliah :</label>
    <input type="hidden" name="id" value="{{$edit->id}}">
    <input type="text" class="form-control" placeholder="Nama Mata Kuliah" value="{{$edit->nama_matakuliah}}" name="matakuliah">
    </div>
  </div>
<br>
<button type="submit" class="btn btn-primary">Edit</button>
</form>
</div>
@endsection