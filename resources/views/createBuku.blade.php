@extends('layouts.main')

@section('container')
<div class="mt-5">
   <div class="text-center fs-4">Tambah Buku</div>
</div>
<div class="my-5">
   <div class="row d-flex justify-content-center">
      <div class="col-6">
         <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
               <label for="judul" class="form-label">Judul Buku</label>
               <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="mb-3">
               <label for="pengarang" class="form-label">Pengarang</label>
               <input type="text" class="form-control" id="pengarang" name="pengarang">
            </div>
            <div class="mb-3">
               <label for="penerbit" class="form-label">penerbit</label>
               <input type="text" class="form-control" id="penerbit" name="penerbit">
            </div>
            <div class="mb-3">
               <label for="formFile" class="form-label">Gambar</label>
               <input class="form-control" type="file" name="gambar">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
         </form>
      </div>
   </div>
</div>
@endsection