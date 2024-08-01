<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCatalogueRequest;
use App\Http\Requests\UpdateCatalogueRequest;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogue = Catalogue::all();
        $data = [
            'catalogue' => $catalogue
        ];
        return view('admin.catalogue.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catalogue.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatalogueRequest $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5120'
        ]);
        // dd($request->nama_produk);

        $file = $request->file('image');
        $fileName = $file->hashName();
        $file->storeAs('public/image-catalogue', $fileName);

        Catalogue::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'image' => $fileName,
        ]);

        session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/admin/catalogue/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Catalogue $catalogue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catalogue $catalogue)
    {
        $getData = Catalogue::where('id', $catalogue->id)->first();
        $data = [
            'catalogue' => $getData 
        ];
        return view('admin.catalogue.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatalogueRequest $request, Catalogue $catalogue)
    {
        if ($request->image) {
            $request->validate([
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png|max:5120'
            ]);

            // hapus file terdahulu
            unlink(public_path('storage/image-catalogue/'.$catalogue->image));

            // tambahkan file baru
            $file = $request->file('image');
            $fileName = $file->hashName();
            $file->storeAs('public/image-catalogue', $fileName);

            Catalogue::updateOrCreate(
                ['id' => $catalogue->id],
                [
                    'nama_produk' => $request->nama_produk,
                    'deskripsi' => $request->deskripsi,
                    'harga' => $request->harga,
                    'image' => $fileName
                ]
            );

        }else{
            $request->validate([
                'nama_produk' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required'
            ]);

            Catalogue::updateOrCreate(
                ['id' => $catalogue->id],
                [
                    'nama_produk' => $request->nama_produk,
                    'deskripsi' => $request->deskripsi,
                    'harga' => $request->harga,
                ]
            );
        }

        session()->flash('success', 'Data berhasil diupdate');
        return redirect('/admin/catalogue/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalogue $catalogue)
    {
        // hapus file terdahulu
        unlink(public_path('storage/image-catalogue/'.$catalogue->image));

        // hapus data
        Catalogue::destroy($catalogue->id);

        session()->flash('success', 'Data berhasil dihapus');
        return redirect('/admin/catalogue/');
    }
}
