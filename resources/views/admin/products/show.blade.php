@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="cold col-md">
            <br>
            <h2>Show Products</h2>
            <br>
            <form>
                <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ $product->image_url() }}" style="  margin: auto; padding: 60px;" class="img-fluid rounded-start" alt="{{ $product->name }}">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                            <div class="form-group">
                                <label> Nama Produk </label>
                                <h4>{{ $product->name }}</h4>
                            </div>
                            <div class="form-group">
                                <label> Harga </label>
                                <h4>Rp. {{ number_format($product->price ) }}</h4>
                            </div>
                            <div class="form-group">
                                <label> Deskripsi </label>
                                <h5>{!! $product->description !!}</h5>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <a class="btn btn-primary" href="{{ route('admin.products.index') }}"><i class="fas fa-arrow-left"></i> Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
