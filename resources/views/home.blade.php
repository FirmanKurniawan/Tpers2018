@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
  <div class="col-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Mata Kuliah</a>
      <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">User</a>
      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">File</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Mata Kuliah</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i = 1;
                $matakuliah = \App\Matakuliah::all();
                @endphp
                @foreach ($matakuliah as $matakuliahs)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$matakuliahs->nama_matakuliah}}</td>
                  <td><a href="{{url('matakuliah/edit/'.$matakuliahs->id)}}">Edit</a></td>
                  <td><a href="{{url('matakuliah/delete/'.$matakuliahs->id)}}">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{asset('matakuliah')}}"><button type="button" class="btn btn-primary">Tambah</button></a>
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama User</th>
                  <th scope="col">Status</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $user = \App\User::all();
                @endphp
                @foreach ($user as $users)
                <tr>
                  <th scope="row">1</th>
                  <td>{{$users->name}}</td>
                  @if($users->role == 1)
                  <td>Admin</td>
                  @else
                  <td>User</td>
                  @endif
                  <td><a href="{{url('user/delete/'.$users->id)}}">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pengupload</th>
                  <th scope="col">Judul</th>
                  <th scope="col">File</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $file = \App\File::all();
                @endphp
                @foreach ($file as $files)
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Mark</td>
                  <td><a href="{{url('/'.$files->nama_file)}}">{{$files->nama_file}}</a></td>
                  <td><a href="">Edit</a></td>
                  <td><a href="">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
