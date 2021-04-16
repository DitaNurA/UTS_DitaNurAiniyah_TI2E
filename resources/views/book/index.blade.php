@extends('book.layout')
@section('content')
 <div class="row">
 <div class="col-lg-12 margin-tb">
 <div class="pull-left mt-2">
 <h2 align=center>PERPUSTAKAAN SMART-THINK</h2>
 </div>
 <div class="float-right my-2">
 <a class="btn btn-success" href="{{ route('book.create') }}"> Tambah Buku</a>
 </div>
 </div>
 </div>
 
 @if ($message = Session::get('success'))
 <div class="alert alert-success">
 <p>{{ $message }}</p>
 </div>
 @endif
  <table class="table table-bordered">
 <tr>
 <th>ID-Buku</th>
 <th>Judul</th>
 <th>Kategori</th>
 <th>Penerbit</th>
 <th>Pengarang</th>
 <th>Jumlah</th>
 <th>Status</th>
 <th width="250px">Action</th>
 </tr>
 @foreach ($book as $Buku)
 <tr>
 
 <td>{{ $Buku->id_buku}}</td>
 <td>{{ $Buku->judul }}</td>
 <td>{{ $Buku->kategori }}</td>
 <td>{{ $Buku->penerbit }}</td>
 <td>{{ $Buku->pengarang}}</td>
 <td>{{ $Buku->jumlah}}</td>
 <td>{{ $Buku->status}}</td>
 <td>
 <form action="{{ route('book.destroy',$Buku->id_buku) }}" method="POST">
 
 <a class="btn btn-info" href="{{ route('book.show',$Buku->id_buku) }}">Show</a>
 <a class="btn btn-primary" href="{{ route('book.edit',$Buku->id_buku) }}">Edit</a>
 @csrf

 @method('DELETE')
 <button type="submit" class="btn btn-danger">Delete</button>
 </form>
 </td>
 </tr>
 @endforeach
 </table>
@endsection