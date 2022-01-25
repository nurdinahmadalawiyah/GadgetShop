@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cold col-md">
            <br>
            <form class="form-inline" style="float: right">
                <div class="form-group mr-1">
                    <a class="btn btn-outline-danger" href="{{ route('admin.products.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
            </form>
            <h2>Tambah Products</h2>
            <br>

            @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label> Nama Produk </label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Produk">
                </div>
                <div class="form-group">
                    <label> Harga </label>
                    <input type="number" name="price" class="form-control" placeholder="Harga">
                </div>
                <div class="form-group">
                    <label> Deskripsi </label>
                    <textarea name="description" class="form-control" id="ckview" rows="3" placeholder="Deskripsi"></textarea>
                </div>
                <div class="form-group">
                    <label> Gambar </label>
                    <input class="form-control" type="file" name="image_url" value="{{ old('image_url') }}" />
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-plus-square"></i> Submit</button>
            </form>
        </div>
    </div>
</div>
<br>
@endsection
