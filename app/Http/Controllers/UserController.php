<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;
class UserController extends Controller
{
    public function index()
    {
    	$index = \App\Matakuliah::all();
    	$total_matakuliah = \App\Matakuliah::count();
    	$total_user = \App\User::count();
    	$total_file = \App\File::count();
    	return view('index',compact('index', 'total_matakuliah', 'total_user', 'total_file'));
    }

    public function delete_user($id)
    {
    	$delete = \App\User::find($id);
    	$delete->delete();

    	return redirect('home');
    }

    public function upload()
    {
    	return view('file.upload');
    }

    public function upload_save(Request $r)
    {
    	$upload = new \App\File;
    	$upload->id_matakuliah = $r->input('matakuliah');
        $upload->nama = $r->input('nama');
        $upload->judul = $r->input('judul');

    	if (Input::hasFile('gambar')) {
      	$files = Input::file('gambar');
      	foreach($files as $gambar) {
        $gambar2 = date("YmdHis").uniqid()."."
        .$gambar->getClientOriginalExtension();
        $gambar->move(storage_path('images'), $gambar2);

        $upload->nama_file = $gambar2;
    	$upload->save();
    }   
    }

    	return redirect('/');
    }

    public function upload_delete($id)
    {
        $delete = \App\File::find($id);
        $delete->delete();

        return redirect()->back();
    }

    public function data($id)
    {
        $data = \App\File::all()->where('id_matakuliah', $id);
        return view('data.index')->with('data', $data);
    }

    public function download($id)
    {
        $data = \App\File::where('id', $id)->value('nama_file');
        $filepath = storage_path('images/').$data;
        return Response::download($filepath);
    }
}
