<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function tambah_matakuliah()
    {
    	return view('tambah_matakuliah');
    }

    public function edit_matakuliah($id)
    {
    	$edit = \App\Matakuliah::find($id);

    	return view('edit_matakuliah', compact('edit'));
    }

    public function save_matakuliah(Request $r)
    {
    	$matakuliah = new \App\Matakuliah;
    	$matakuliah->nama_matakuliah = $r->input('matakuliah');
    	$matakuliah->save();

    	return redirect('home');
    }

    public function delete_matakuliah($id)
    {
    	$delete = \App\Matakuliah::find($id);
    	$delete->delete();

    	return redirect('home');
    }

    public function update_matakuliah(Request $r)
    {
    	$matakuliah = \App\Matakuliah::find($r->input('id'));
    	$matakuliah->nama_matakuliah = $r->input('matakuliah');
    	$matakuliah->save();

    	return redirect('home');
    }
}
