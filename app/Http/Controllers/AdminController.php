<?php

namespace App\Http\Controllers;

use App\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $result = AdminModel::all();
        return view('view_admin.index', compact('result'));
    }

    public function create()
    {
        return view('view_admin.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender'=>'required',
            'alamat'=>'required'
        ]);
		
        $query = AdminModel::create($validasi);
   
        return redirect('/admin')->with('success', 'Selamat data berhasil ditambah!');
    }
	
	public function show($id)
    {
		$result = AdminModel::find($id);
        return view('view_admin.cetak', ['result' => $result]);
    }
	
	public function edit($id)
    {
		$result = AdminModel::find($id);
        return view('view_admin.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'gender'=>'required',
            'alamat'=>'required'
        ]);
		
        $query = AdminModel::whereId($id)->update($validasi);

        return redirect('/admin')->with('success', 'Data berhasil di update');
    }

    public function destroy($id)
    {
        $query = AdminModel::findOrFail($id);
        $query->delete();

        return redirect('/admin')->with('success', 'Data berhasil dihapus!');
    }
}
