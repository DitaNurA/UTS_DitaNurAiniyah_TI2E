<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 $book = Buku::all(); // Mengambil semua isi tabel
 $posts = Buku::orderBy('id_buku', 'desc')->paginate(7);
 return view('book.index', compact('book'));
 with('i', (request()->input('page', 1) - 1) * 5);
 }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
            ]);
            //fungsi eloquent untuk menambah data
            Buku::create($request->all());
            //jika data berhasil ditambahkan, akan kembali ke halaman utama
            return redirect()->route('book.index')
            ->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_buku)
    {
        $Buku = Buku::find($id_buku);
 return view('book.detail', compact('Buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_buku)
    {
        $Buku = Buku::find($id_buku);
 return view('book.edit', compact('Buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_buku)
    {
        //melakukan validasi data
 $request->validate([
    'id_buku' => 'required',
    'judul' => 'required',
    'kategori' => 'required',
    'penerbit' => 'required',
    'pengarang' => 'required',
    'jumlah' => 'required',
    'status' => 'required',
    ]);
   //fungsi eloquent untuk mengupdate data inputan kita
    Buku::find($id_buku)->update($request->all());
   //jika data berhasil diupdate, akan kembali ke halaman utama
    return redirect()->route('book.index')
    ->with('success', 'Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        Buku::find($id_buku)-> delete();
 return redirect()->route('book.index')
 -> with('success', 'Buku Berhasil Dihapus');
    }
}
