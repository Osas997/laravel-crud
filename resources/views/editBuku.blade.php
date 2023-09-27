@extends('layouts.main')

@section('container')
<div class="mt-5">
   <div class="text-center fs-4">Edit Buku</div>
</div>
<div class="my-5">
   <div class="row d-flex justify-content-center">
      <div class="col-6">
         <form action="{{ route('buku.update',$buku->id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
               <label for="judul" class="form-label">Judul Buku</label>
               <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}">
            </div>
            <div class="mb-3">
               <label for="pengarang" class="form-label">Pengarang</label>
               <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}">
            </div>
            <div class="mb-3">
               <label for="penerbit" class="form-label">penerbit</label>
               <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $buku->penerbit }}">
            </div>
            <div class="mb-3">
               <label for="formFile" class="form-label">Gambar</label>
               <input type="hidden" name="gambarLama" value="{{ $buku->gambar }}">
               <input class="form-control" type="file" name="gambar">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
         </form>
      </div>
   </div>
</div>
@endsection