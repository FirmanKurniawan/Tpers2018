            @extends('layouts.app')
            @section('content')
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pengupload</th>
                  <th scope="col">Judul</th>
                  <th scope="col">File</th>
                  <th colspan="3">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                $file = \App\File::where('id_matakuliah', 'id');
                $i = 1;
                @endphp
                @foreach ($data as $datas)
                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$datas->nama}}</td>
                  <td>{{$datas->judul}}</td>
                  <td><a href="{{url('download/'.$datas->id)}}">{{$datas->nama_file}}</a></td>
                  <td><a href="{{url('upload/delete/'.$datas->id)}}">Delete</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endsection