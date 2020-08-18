<?php

namespace App\Http\Controllers;

use App\ArtikelModel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $result = ArtikelModel::all();
        return view('view_artikel.index', compact('result'));
    }

    public function create()
    {
        return view('view_artikel.create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'keterangan'=> 'required',
            'kategori' => 'required'
        ]);
		
        $query = ArtikelModel::create($validasi);
        return redirect('/artikel')->with('success', 'Selamat data berhasil ditambah!');
    }

	public function edit($id)
    {
        $result = ArtikelModel::find($id);
        return view('view_artikel.edit', compact('result'));
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'judul' => 'required',
            'keterangan'=> 'required',
            'kategori' => 'required',
        ]);
		
        $query = ArtikelModel::whereId($id)->update($validasi);
        return redirect('/artikel')->with('success', 'Data berhasil di update');
    }

    public function destroy($id)
    {
        $query = ArtikelModel::findOrFail($id); $query->delete();
        return redirect('/artikel')->with('success', 'Data berhasil dihapus!');
    }
}
