@extends('layouts.main')

@section('container')
<div class="mt-5">
   @if (session()->has("addBuku"))
   <div class="row flex justify-content-end">
      <div class="my-2 toast show align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
         aria-atomic="true">
         <div class="d-flex">
            <div class="toast-body">
               {{ session("addBuku") }}.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
               aria-label="Close"></button>
         </div>
      </div>
   </div>
   @endif
   @if (session()->has("editBuku"))
   <div class="row flex justify-content-end">
      <div class="my-2 toast show align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
         aria-atomic="true">
         <div class="d-flex">
            <div class="toast-body">
               {{ session("editBuku") }}.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
               aria-label="Close"></button>
         </div>
      </div>
   </div>
   @endif
   @if (session()->has("hapusBuku"))
   <div class="row flex justify-content-end">
      <div class="my-2 toast show align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
         aria-atomic="true">
         <div class="d-flex">
            <div class="toast-body">
               {{ session("hapusBuku") }}.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
               aria-label="Close"></button>
         </div>
      </div>
   </div>
   @endif
   <div class="my-2">
      <a class="btn btn-outline-primary block" href="{{ route('buku.create') }}">Tambah Buku</a>
   </div>
   <table class="table table-hover">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Pengarang</th>
            <th scope="col">Penerbit</th>
            <th scope="col">Aksi</th>
         </tr>
      </thead>
      <tbody>
         @foreach ($dataBuku as $buku)
         <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->pengarang }}</td>
            <td>{{ $buku->penerbit }}</td>
            <td>
               <a href="{{ route('buku.edit',$buku->id) }}" class="btn btn-warning">Edit Buku</a>
               <form action="{{ route('buku.destroy',$buku->id) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('yakin Hapus?')">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger">Hapus</button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
</div>
@endsection