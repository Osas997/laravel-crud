<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::get();
        return view("buku", [
            "dataBuku" => $buku
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("createBuku");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "judul" => "required",
            "pengarang" => "required",
            "penerbit" => "required",
        ]);

        if ($request->file("gambar")) {
            $validate["gambar"] = $request->file("gambar")->store("images");
        }

        Buku::create($validate);
        return redirect("/buku")->with('addBuku', "Buku Berhasil di Tambah");
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view("editBuku", compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validate = $request->validate([
            "judul" => "required",
            "pengarang" => "required",
            "penerbit" => "required",
        ]);

        if ($request->file("gambar")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            $validate["gambar"] = $request->file("gambar")->store("images");
        }

        $buku->update($validate);
        return redirect("/buku")->with('editBuku', "Buku Berhasil di Update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {

        if ($buku->gambar) {
            Storage::delete($buku->gambar);
        }
        // Post::destroy($mypost->id);
        $buku->delete();
        return redirect("/buku")->with('hapusBuku', "Buku berhasil di hapus");
    }
}
